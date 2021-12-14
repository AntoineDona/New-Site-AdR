<?php
session_start();
$_SESSION['redirect_url'] = "https://adr.cs-campus.fr/nanolympique";

if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
	echo "Connecté : ";
	// Pour voir plus de données disponibles, voir la documentation
	// sur auth.viarezo.fr
	//echo $_SESSION["user"]["login"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	$prenom = $_SESSION["prenom"];
	$nom = $_SESSION["nom"];
	echo $prenom . " " . $nom;
	header("Location: https://adr.cs-campus.fr/nanolympique/index.php?nom=" . $nom . "&prenom=" . $prenom);
	
} else {
	$_SESSION["isConnected"] = false;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>NANOLYMPIQUE</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/images/favicon/favicon-96x96.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<?php include("script.php"); ?>

<body onload="onLoad()">
	<?php
	if (isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "logout.php") {
		echo "<script>alert(\"Tu as bien été déconnecté \")</script>";
	}
	?>
	<div id="titre_sg">Le shotgun commence dans:</div>
	<div id="holder">
		<div class="olympics">
			<div class="ring blue" id="mois">
				<p class="chiffre">00</p>
				<p class="text">mois(s)</p>
			</div>
			<div class="ring yellow" id="jours">
				<p class="chiffre">00</p>
				<p class="text">jour(s)</p>
			</div>
			<div class="ring black" id="heures">
				<p class="chiffre">00</p>
				<p class="text">heure(s)</p>
			</div>
			<div class="ring green" id="minutes">
				<p class="chiffre">00</p>
				<p class="text">minute(s)</p>
			</div>
			<div class="ring red" id="secondes">
				<p class="chiffre">00</p>
				<p class="text">seconde(s)</p>
			</div>
		</div>
	</div>
	<div id="co_msg_ctnr">
		<?php
		if (isset($_SESSION["isConnected"])) {
			if (!$_SESSION["isConnected"]) {
				echo "<p id='co_msg'>Tu n'es pas encore connecté, pour shotgun une place au Nanolympique il faut te connecter :</p> ";
			}
		}
		?>
	</div>
	<div id="co_link_ctnr" href="#">
		<a id="co_link" href='../auth/redirect.php?redirect=https://adr.cs-campus.fr/nanolympique'>Se connecter</a>
	</div>
</body>

</html>