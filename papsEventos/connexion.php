<?php
session_start();


if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
	echo "Connecté : ";
	// Pour voir plus de données disponibles, voir la documentation
	// sur auth.viarezo.fr
	//echo $_SESSION["user"]["login"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	header("Location: /papsEventos/index.php");
	
} else {$_SESSION["isConnected"] = false;}
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>PAPS EVENTOS</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body class="align" onload="onLoad()">
	<div class="grid">
		<div class="form__field" href="#">
			<a class="button-submit" href='redirect.php?redirect=https://adr.cs-campus.fr/papsEventos'>Se connecter</a>
		</div>
		<div class="message" style='margin-top:20px'>
			<div id="titre_sg" >Le shotgun commence dans:</div>
			<div id="counter">
				<div class="digit_holder days" id="jours">
					<p class="chiffre">00</p>
				</div>
				<div class="digit_holder hours" id="heures">
					<p class="chiffre">00</p>
				</div>
				<div class="digit_holder minutes" id="minutes">
					<p class="chiffre">00</p>
				</div>
				<div class="digit_holder seconds" id="secondes">
					<p class="chiffre">00</p>
				</div> 
			</div>
		</div>
	</div>
	<?php include("script.php"); ?>
</body>	

</html>
