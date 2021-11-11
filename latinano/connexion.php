<?php
session_start();

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
	header("Location: https://adr.cs-campus.fr/latinano/index.php?nom=" . $nom . "&prenom=" . $prenom);
} else {
	$_SESSION["isConnected"] = false;
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>LATINANO</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/images/favicon/favicon-96x96.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<?php include("script.php"); ?>

<body onload="onLoad()">
	<?php
	if (isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "logout.php") {
		echo "<script>alert(\"Tu as bien été déconnecté \")</script>";
	}
	?>
	<div id="titre_sg">Le shotgun commence dans:</div>
	<div id="counter">
		<div class="digit_holder days" id="jours">
			<p class="chiffre">00</p>
			<p>jour(s)</p>
		</div>
		<div class="digit_holder hours" id="heures">
			<p class="chiffre">00</p>
			<p>heure(s)</p>
		</div>
		<div class="digit_holder minutes" id="minutes">
			<p class="chiffre">00</p>
			<p>minute(s)</p>
		</div>
		<div class="digit_holder seconds" id="secondes">
			<p class="chiffre">00</p>
			<p>seconde(s)</p>
		</div>
	</div>
	<div id="co_msg_ctnr">
		<?php
		if (isset($_SESSION["isConnected"])) {
			if (!$_SESSION["isConnected"]) {
				echo "<p id='co_msg'>Tu n'es pas encore connecté, pour shotgun une place au Latinano il faut te connecter :</p> ";
			}
		}
		?>
	</div>
	<div id="co_link_ctnr" href="#">
		<a id="co_link" href='redirect.php?redirect=https://adr.cs-campus.fr/latinano'>Se connecter</a>
	</div>
</body>

</html>