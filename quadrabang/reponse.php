<?php include("database.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Confirmation de réservation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles.css">
  
</head>
<body class="bigbang">

	<img class="img_quadra" src="img/QUADRATEXTE_1.png">

	<?php 

	
    if ( isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['aller']) && isset($_POST['retour']) )
    {
    	
	$nom = $_POST['nom'];
	$mail = $_POST['email'];
	$aller = $_POST['aller'];
	$retour = $_POST['retour'];
	
	//
	//	Rajouter une sécurité : Vérifier encore une fois qu'il reste de la place dans la navette choisie
	//	Vérifier que aller et retour sont pas n'importe quoi
    	$query=$pdo->prepare("INSERT into quadra_navettes (nom, mail, aller, retour) VALUES (?,?,?,?)");
    	$query->execute(array($nom,$mail,$aller,$retour));
	//$array=$query->fetchAll();
	//$array[0]["mail"];
	    
	    
    	?>
    <article class="traitement">
    <h1 class="traitement"> <br><br><br>Salut <?php echo $nom;?>, <br>Merci d'avoir reservé ta place, nous avons ton nom dans nos listes. </h1>
    
    <p class="traitement" style="color:white;">Voici un récapitulatif :<br />Nom: <?php echo $nom;?><br/>Aller: <?php echo $aller;?><br />Retour: <?php echo $retour;?></p>
    
	    
	</article>
    <?php

    }
    else
    {
    	echo '<p>ERREUR !!!</p>';
    }
    ?>
	
	<?php
 $to = "aina.rabesandratana@supelec.fr";
 $sub = "Test Mail";
 $msg = "Hello.\nHow are you?";
 $msg = wordwrap($msg, 70);
 $headers = "From: Admin";
 mail($to,$sub,$msg,$headers);
?>

<?php

$to  = $mail; // notez la virgule

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


    

	<?php include("footer.php"); ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
