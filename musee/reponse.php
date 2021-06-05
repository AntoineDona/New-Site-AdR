<?php include("included/database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include "included/meta.php" ?>
	<title>Confirmation de commande</title>

	<meta http-equiv="refresh" content="10;url=commander.php" />

</head>

<body>
	<?php include "included/header.php" ?>


	<?php
	function insert_in_array($name, $article, &$array)
	{ // fonction qui insère dans le array de commande les articles ainsi que la quantité, si bien définis
		if (isset($_POST[$name]) && $_POST[$name] != 0) {
			$array[$article] = $_POST[$name];
		}
	}

	function update_database($array, $type_food, $price)
	{
		echo "maseltof";
		global $bdd, $req;
		$serialized_array = serialize($array);
		$nom = htmlspecialchars($_POST['nom']);
		$numero = htmlspecialchars($_POST['numero']);
		$commentaire = htmlspecialchars($_POST['commentaire']);
		$Datetime = date("Y-m-d H:i:s");
		$traite = 'non';
		$adresse = htmlspecialchars($_POST['adresse']);
		$type_commande = $_POST['question'];
		if (isset($_POST['pay'])) {
			$pay = $_POST['pay'];
		} else {
			$pay = "en caisse";
		}
		if (isset($_POST['horaire_livraison'])) {
			$horaire = $_POST['horaire_livraison'] . ':00';
		} else {
			$horaire = date("H:i:s");
		}

		if (isset($_POST['num_table'])) {
			$table = $_POST['num_table'];
		}

		$req = $bdd->prepare('INSERT INTO commande(nom, numero, traite, commande,Datetime,adresse,horaire,type_commande,num_table,type_food,prix,paiement,commentaire) VALUES(:nom, :numero, :traite, :commande,:Datetime,:adresse,:horaire,:type_commande,:num_table,:type_food,:prix,:paiement,:commentaire)');
		$req->execute(array(
			'nom' => $nom,
			'numero' => $numero,
			'traite' => $traite,
			'commande' => $serialized_array,
			'Datetime' => $Datetime,
			'adresse' => $adresse,
			'horaire' => $horaire,
			'type_commande' => $type_commande,
			'type_food' => $type_food,
			'num_table' => $table,
			'paiement' => $pay,
			'prix' => $price,
			'commentaire' => $commentaire,
		));
	}

	$food = array();
	$drink = array();
	$type_commande = $_POST['question'];
	$nom = htmlspecialchars($_POST['nom']);
	$food_price = 0;
	$drink_price = 0;

	$categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
	while ($categorie = $categories->fetch()) {
		//Au moins un article de la catégorie: c'est toujours le cas ici!! On selectionne les articles de la catégorie :
		$articles = $bdd->prepare('SELECT * FROM menu WHERE type_id=? order by article');
		$articles->execute(array($categorie["id"]));
		if ($categorie['id'] != 1) //On saute le aucun
		{
			while ($article = $articles->fetch()) //on parours les articles
			{
				$name = str_replace(' ', '_', $article["article"]); //on remplace les espaces par _ car php converti automatiquement dans POST les espaces
				if ($categorie['id'] == 15) { // pour les pressions, 2 id possibles avec demi ou pinte
					$name1 = "Demi_de_" . $name;
					$demi = "Demi de " . $article["article"];
					$name2 = "Pinte_de_" . $name;
					$pinte = "Pinte de " . $article["article"];
					if ($_POST['question'] == "En terrasse") {
						insert_in_array($name1, $demi, $drink);
						insert_in_array($name2, $pinte, $drink);
						$drink_price += $_POST[$name1] * ($article["prix"] + 1);
						$drink_price += $_POST[$name2] * ($article["prix 2"] + 1);
					} else {
						insert_in_array($name1, $demi, $food);
						insert_in_array($name2, $pinte, $food);
						$food_price += $_POST[$name1] * ($article["prix"] + 1);
						$food_price += $_POST[$name2] * ($article["prix 2"] + 1);
					}
					echo serialize($drink);
				} else {
					if ($categorie['id'] == 14 or $categorie['id'] == 8 and $_POST['question'] == "En terrasse") {
						insert_in_array($name, $article["article"], $drink);
						if ($categorie['id'] == 14) {
							$drink_price += $_POST[$name] * ($article["prix"] + 0.2);
						} else {
							$drink_price += $_POST[$name] * $article["prix"];
						}
					} else {
						insert_in_array($name, $article["article"], $food);
						if ($categorie['id'] == 14) {
							$food_price += $_POST[$name] * ($article["prix"] + 0.2);
						} else {
							$food_price += $_POST[$name] * $article["prix"];
						}
					}
					// if (isset($_POST[$name]) && $_POST[$name]!=0){
					// 	echo "test";
					// 	$array[$article['article']] = $_POST[$name];
				}
			}
		}
	}




	//Une fois les tableaux complets, on les insère dans la base de donnée, s'il ne sont pas vides, et on a une condition globale modifiable
	if (true) { //condition globale modifiable. Si non vérifiée -> pas de modification de la base de donnée. par ex: horaire!
		echo empty($drink);
		if (!empty($drink)) { // si la commande boisson n'est vide, on ajoute le prix total et on update la bdd
			update_database($drink, "Boisson", $drink_price);
			echo "maseltof";
		}
		if (!empty($food)) { //si la commande bouffe n'est pas vide, on ajoute le prix total et on update la bdd
			update_database($food, "Nourriture", $food_price);
		}

	?>

		<div class="carte" style="margin-top:10rem;">
			<i style="color:#2FAF2C;" class="fas fa-check-circle fa-6x"></i>
			<h3 style="color:#2FAF2C"> <br>Salut <?php echo $nom; ?>,
				<br>Ta commande a bien été passée.
				<?php if ($type_commande == 'A livrer') {
					echo "Huma va te livrer à l'horaire que tu as choisi, tu pourras payer à ce moment par Lydia!";
				} else {
					if ($type_commande == 'A emporter') {
						echo "Tu pourras passer la récupérer à l'horaire choisi";
					} else {
						echo "Les AdR sont en train de la traiter et vont te servir directement à table!";
					}
				}
				?>
				<br>
				<h3>Redirection vers la page de commande dans <span id="countdown">10</span> secondes</h3>

		</div>
		<script type="text/javascript">
			// Total seconds to wait
			var seconds = 10;

			function countdown() {
				seconds = seconds - 1;
				if (seconds < 0) {
					// Chnage your redirection link here
					window.location = "commander.php";
				} else {
					// Update remaining seconds
					document.getElementById("countdown").innerHTML = seconds;
					// Count down using javascript
					window.setTimeout("countdown()", 1000);
				}
			}
			// Run countdown function
			countdown();
		</script>
	<?php

	} else {
		echo '<p>ERREUR: Il y a eu un problème au moment du saisi de ta commande. Tu peux réessayer. Si le problème persiste, contacte nous directement sur Facebook ou au 0607764074 (VP Geek)</p>';
	}
	?>

	<?php /*
 $to = "aina.rabesandratana@supelec.fr";
 $sub = "Test Mail";
 $msg = "Hello.\nHow are you?";
 $msg = wordwrap($msg, 70);
 $headers = "From: Admin";
 mail($to,$sub,$msg,$headers);
?> -->

<?php
// notez la virgule

     // Sujet
     /*$subject = 'NAVETTE QUADRABANG';
     // message
     $message = '
     <html>
      <head>
       <title>Navette pour le QUADRABANG</title>
      </head>
      <body>
       <h1> Merci d\'avoir reservé ta navette !</h1>
       <p>Voici un récapitulatif de ta commande à montrer en montant dans la navette:<br>
		Aller: <p>'.$aller.'<p> à l\'horaire indiqué sur le site<br>
		Retour: </p>'.$retour.'<p> à l\'horaire indiqué sur le site</p>
      
      </body>
     </html>
     ';
     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';
     // En-têtes additionnels
     $headers[] = 'To: '.$nom.' <'.$mail.'>';
     $headers[] = 'From: AdR Centralesupelec <aina.rabesandratana@supelec.fr>';
     // Envoi
     $success=mail($to, $subject, $message, implode("\r\n", $headers));*/
	/* if (!$success){
		print_r(error_get_last()['message']);
		echo "Salut !!!!";
	}
     echo "Salut !!!!!!";
     echo error_get_last()['message']; */


	/*
$mail = new PHPMailer();
$body = "An mail test";
$mail->AddAddress('marco.boucas@student-cs.fr',"Marco Boucas");
$mail->Subject = "test Mail";
$mail->MsgHTML($body);
if (!$mail->Send()){
	echo "Mailer error".$mail->ErrorInfo;
} */
	?>

	</div>
	</div>


	<div id="contact" class="offset">

		<?php include("footer.php"); ?>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		// if ( window.history.replaceState ) {
		//   window.history.replaceState( null, null, window.location.href );
		// }
	</script>
</body>

</html>