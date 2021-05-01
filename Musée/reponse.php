<?php include("included/database.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Confirmation de commande</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style_com.css">
    <link rel="stylesheet" type="text/css" title="mobile" href="../mobile.css" />
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="stylesheet" href="gestion/style_nav.css">
	<meta http-equiv="refresh" content="3;url=commander.php" /> <!--on redirige au bout de 3 secondes -->
	
</head>
<body>

	<div class="text-center caption">
	<h1 id="presentation">Confirmation</h1>
	<img id="logo" src="img/logo_musee_b.png">
	</div>
    
	<?php 
	if ( isset($_POST['nom']) && isset($_POST['numero']) && isset($_POST['commande']) )
	{
		$nom = htmlspecialchars($_POST['nom']);
		$numero = htmlspecialchars($_POST['numero']);
		$commande = htmlspecialchars($_POST['commande']);
		$Datetime=date("Y-m-d H:i:s");
		$livre='non';
		$adresse=htmlspecialchars($_POST['adresse']);
		$horaire = $_POST['horaire_livraison'].':00';
		$livraison=$_POST['question'];
		
		$req = $bdd->prepare('INSERT INTO commande(nom, numero, livre, commande,Datetime,adresse,horaire,livraison) VALUES(:nom, :numero, :livre, :commande,:Datetime,:adresse,:horaire,:livraison)');
		$req->execute(array(
			'nom' => $nom,
			'numero' => $numero,
			'livre' => $livre,
			'commande' => $commande,
			'Datetime'=>$Datetime,
			'adresse'=>$adresse,
			'horaire'=>$horaire,
			'livraison'=>$livraison
			));
	    
	    
    	?>
    <article class="traitement">
    <div id="reponse" style="background-color:white;" class="jumbotron text-center">
	<div class="narrow">
    <i style="color:#2FAF2C;position:relative;top:1rem;" class="fas fa-check-circle fa-6x"></i>
    <h4 style="position:relative;top:-3rem; color:#2FAF2C" > <br>Salut <?php echo $nom;?>, <br>Ta commande a bien été passée. Huma va te livrer à l'horaire que tu as choisi, tu pourras payer à ce moment par Lydia!</h1>
    <p>Tu seras redirigé vers la page de commande dans 5 secondes</p>
	    
	</article>
    <?php

    }
    else
    {
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
