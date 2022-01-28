<?php
session_start();
session_unset();
foreach ($_POST as $key => $value) {
	$_SESSION[$key] = htmlspecialchars($value);
}

$_SESSION['verificateur'] = True;
function display_cmd($array)

{
	echo "<table>";
	foreach ($array as $key => $value) {
		if ($value > 0) {

			echo "<tr>";
			echo "<td style='padding-left:3rem;'>";
			echo $key;
			echo "</td>";
			echo "<td> x";
			echo $value;
			echo "</td>";
			echo "</tr>";
			
		}
	}
	echo "</table>";
}


include("included/database.php");
?>
<!-- <div style ="text-align:left; margin: 0 0.5rem; display: flex; flex-flow: column wrap; align-content: start;"> ' . $key . " x" . $value . " </div>"; -->

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include "included/meta.php" ?>
	<title>Récapitulatif de la commande</title>
</head>

<body>
	<?php include "included/header.php" ?>
	<!-- <table style="color: white;">
		<?php
		// foreach ($_SESSION as $key => $value) {
		// 	echo "<tr>";
		// 	echo "<td>";
		// 	echo $key;
		// 	echo "</td>";
		// 	echo "<td>";
		// 	echo $value;
		// 	echo "</td>";
		// 	echo "</tr>";
		// }
		?>
	</table> -->

	<?php
	function insert_in_array($name, $article, &$array)
	{ // fonction qui insère dans le array de commande les articles ainsi que la quantité, si bien définis
		if (isset($_POST[$name]) && $_POST[$name] != 0) {
			$array[$article] = $_POST[$name];
		}
	}

	$food = array();
	$drink = array();
	$type_commande = $_POST['question'];
	$nom = htmlspecialchars($_POST['nom']);
	$food_price = 0;
	$drink_price = 0;
	$beercount = 0;

	$categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
	while ($categorie = $categories->fetch()) {
		//Au moins un article de la catégorie: c'est toujours le cas ici; On selectionne les articles de la catégorie :
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
						if (isset($_POST[$name1])) {
							insert_in_array($name1, $demi, $drink); //on ajoute dans l'array des boissons
							$drink_price += $_POST[$name1] * ($article["prix"] + 1);
							$beercount += $_POST[$name1]; // on compte les bières dans name 1
						}
						if (isset($_POST[$name2])) {
							insert_in_array($name2, $pinte, $drink);
							$drink_price += $_POST[$name2] * ($article["prix 2"] + 1);
							$beercount += $_POST[$name2]; // on compte les bières dans name 2
						}
					} else {
						insert_in_array($name1, $demi, $food);
						insert_in_array($name2, $pinte, $food);
						$food_price += $_POST[$name1] * ($article["prix"] + 1);
						$food_price += $_POST[$name2] * ($article["prix 2"] + 1);
					}
				} else {
					if (isset($_POST[$name])) {
						if ($categorie['id'] == 14 or $categorie['id'] == 8 and $_POST['question'] == "En terrasse") {
							insert_in_array($name, $article["article"], $drink);
							if ($categorie['id'] == 14) {
								$drink_price += $_POST[$name] * ($article["prix"] + 0.2);
								$beercount += $_POST[$name];
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
	}
	$_SESSION['beercount'] = $beercount;

	?>
	<div class="carte" style="margin-top:10rem; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
		<h1 style="font-family:'Champagne', sans-serif;">Ta commande:</h1>
		<div style="display: flex; flex-direction:column; font-size: 2rem; border: 2px solid black; width:35rem; margin:auto; padding:1rem 1rem; margin-bottom:1rem;">
			<?php
			if (!empty($food) && !empty($drink)) { // si il y a nourriture + boisson dans la commande
				echo "<h2 style='text-decoration:underline; margin-bottom:1rem;'> Nourriture: </h2>";
				display_cmd($food); // on affiche la nourriture
				echo "<h2 style='text-decoration:underline; margin-top: 2rem; margin-bottom:1rem;'> Boissons: </h2>";
				display_cmd($drink); // on affiche les boissons
			} else if (!empty($food)) { // sinon, si drink est vide, mais pas food
				echo "<h2 style='text-decoration:underline; margin-bottom:1rem;'> Nourriture: </h2>";
				display_cmd($food);
			} else if (!empty($drink)) {
				echo "<h2 style='text-decoration:underline; margin-bottom:1rem;'> Boissons: </h2>";
				display_cmd($drink);
			} else {
				echo "<h2 style='text-decoration:underline; margin-bottom:1rem;'> Ta commande est vide! </h2>";
				echo "<p>Tu dois réactualise la page de commande. Si le problème persiste, concacte nous sur Facebook</p>";
			}
			?>
		</div>

		<div class="commentaire" style="margin-bottom: 2rem;;">
			<?php
			if (!empty(htmlspecialchars($_POST['commentaire']))) {
				echo "<p style='font-size:2rem;'> <strong>Commentaire:</strong> " . htmlspecialchars($_POST['commentaire']) . "</p>";
			}
			?>
		</div>

		<div class="buttons">
			<button type="button" class="btn btn-danger" onclick="location.href='commander.php'">Annuler</button>
			<button type="button" class="btn btn-success" onclick="location.href='reponse.php'">Confirmer</button>

		</div>
	</div>


	<div id="contact" class="offset">

		<?php include("footer.php"); ?>

	</div>

</body>

<style>
	html {
		font-size: 10px;
		background-image: url(/musee/img/field.jpg);
	}

	button {
		margin-top: 0.5rem;
		max-width: 30vw;
	}
</style>

</html>