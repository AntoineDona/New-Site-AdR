<?php
session_start();


if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
	echo "Connecté : ";
	// Pour voir plus de données disponibles, voir la documentation
	// sur auth.viarezo.fr
	//echo $_SESSION["user"]["login"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	header("Location: /papybang/index.php");
	
} else {$_SESSION["isConnected"] = false;}

$_SESSION['test']='no boucle';
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>PAPYBANG</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/papybang/img/cassetteIcon.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body onload="onLoad()">
	<?php
	if (isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "logout.php") {
		echo "<script>alert(\"Tu as bien été déconnecté \")</script>";
	}
	?>
	<div id="logobang">
		<img class="logobang_img" src="img/proj4_title.png">
	</div>
	<!-- <div id="tease">
	<p>Rejoins nous pour une dernière soirée, à l'ancienne, parce que c'était mieux avant. 
	J'espère que ce petit site rudimentaire fait remonter des souvenirs de doute et de stress.</p>
	</div> -->
	<div id='sgSpace'>
		<div id="titre_sg" >Le shotgun <br>commence dans:</div>
		<div id="counter">
			<!-- <div class="digit_holder months" id="mois">
				<p class="chiffre">00</p>
				<p class="text">mois(s)</p>
			</div> -->
			<!-- <div class="digit_holder days" id="jours">
				<p class="chiffre">00</p>
				<p class="text">jours</p>
			</div> -->
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
		<a id="co_link" href='redirect.php?redirect=https://adr.cs-campus.fr/papybang'>Se connecter</a>
	</div>
</div>
	<?php include("script.php"); ?>
</body>

</html>
