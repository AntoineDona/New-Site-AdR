<?php
session_start();


if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
	echo "Connecté : ";
	// Pour voir plus de données disponibles, voir la documentation
	// sur auth.viarezo.fr
	//echo $_SESSION["user"]["login"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	header("Location: /giganano/index.php");
	
} else {$_SESSION["isConnected"] = false;}
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>GIGANANO</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/giganano/img/math.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<script type="text/javascript" src="script.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<body onload="onLoad()" id='gradient'>
	<?php
	if (isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "logout.php") {
		echo "<script>alert(\"Tu as bien été déconnecté \")</script>";
	}
	?>
	<div id="titreGiga" style="margin-top:30vh;">
		<p id="titreGiga1">le</p>
		<p id="titreGiga2">1</p>
	</div>
	<div id="titre_sg"  >Le shotgun commence dans:</div>
	<div id="counter">
		<!-- <div class="digit_holder months" id="mois">
			<p class="chiffre">00</p>
			<p class="text">mois(s)</p>
		</div> -->
		<div class="digit_holder days" id="jours">
			<p class="chiffre">00</p>
			<p class="text">jours</p>
		</div>
		<div class="digit_holder hours" id="heures">
			<p class="chiffre">00</p>
			<p class="text">heures</p>
		</div>
		<div class="digit_holder minutes" id="minutes">
			<p class="chiffre">00</p>
			<p class="text">minutes</p>
		</div>
		<div class="digit_holder seconds" id="secondes">
			<p class="chiffre">00</p>
			<p class="text">secondes</p>
		</div>
	</div>
		<!-- <?php
		if (isset($_SESSION["isConnected"])) {
			if (!$_SESSION["isConnected"]) {
				echo "<p id='co_msg_ctnr'>Tu n'es pas encore connecté</p> ";
			}
		}
		?> -->
	<div id="co_link_ctnr" href="#">
		<a id="co_link" href='redirect.php?redirect=https://adr.cs-campus.fr/giganano'>Se connecter</a>
	</div>
	<?php include("script.php"); ?>
</body>

</html>