<?php
    session_start();
	
	if ($_SESSION["isConnected"]) { 
		echo "Connecté : ";
		// Pour voir plus de données disponibles, voir la documentation
		// sur auth.viarezo.fr
		//echo $_SESSION["user"]["login"];
		$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
		$_SESSION["nom"] = $_SESSION["user"]["lastName"]; 
	    echo $prenom." ".$nom;
		header("Location: https://adr.cs-campus.fr/nanolympique/index.php?nom=".$nom."&prenom=".$prenom);
	} 			
?>

<!DOCTYPE html><html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title>NANOLYMPIQUE</title><link rel="icon" type="image/png" href="img/adr_ico.png" />
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<?php include("script.php"); ?>

<body onload="onLoad()">

	<div id="holder">
	<div class="olympics">
			<div class="ring blue" id="mois">
				<p class="chiffre">00</p>
				<p>mois(s)</p>
			</div>
			<div class="ring yellow" id="jours">
				<p class="chiffre">00</p>
				<p>jour(s)</p>
			</div>
			<div class="ring black" id="heures">
				<p class="chiffre">00</p>
				<p>heure(s)</p>
			</div>
			<div class="ring green" id="minutes">
				<p class="chiffre">00</p>
				<p>minute(s)</p>
			</div>
			<div class="ring red" id="secondes">
				<p class="chiffre">00</p>
				<p>seconde(s)</p>
			</div>
		</div>
		<div id="connexion_link" href="#">
			<a class= 'shotgun' href='redirect.php?redirect=https://adr.cs-campus.fr/nanolympique/index.php'>Se connecter</a>
		</div>
	</div>

<div class="connexion">
<?php
	if (isset($_SESSION["isConnected"])){
		if (!$_SESSION["isConnected"]){
			echo "<p class= 'connexion'>Tu n'es pas encore connecté, pour shotgun une place au Nanolympique il faut te connecter :</p> ";
			// Se connecter
			echo "<a class= 'connexion' href='redirect.php?redirect=https://adr.cs-campus.fr/nanolympique/index.php'>Se connecter</a>";
		}
	}
?>
</div>

</body>
</html>
