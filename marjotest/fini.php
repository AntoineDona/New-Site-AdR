<?php
session_start();
include("database.php"); 
?>

<!DOCTYPE html>
<html>

<head>
	<title>INDIANANONES</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/marjotest/img/icon.png">
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/6ede126102.js" crossorigin="anonymous"></script>
</head>

<?php
function number_place($pdo)
{
	$query = $pdo->prepare("SELECT COUNT(*) as c from indiananones");
	$query->execute();
	$result = $query->fetch();
	return $result['c'];
}
if (number_place($pdo) < $_SESSION["total_places"]) {
	if ($_SESSION["isConnected"]) {
		header("Location: /marjotest/index.php");
	} else {
		header("Location: /marjotest/connexion.php");
	}
}
if ($_SESSION['shotgun']) {
	header("Location: /marjotest/index.php");
}
?>

<body>
	<div class="soldout_ctnr">
		<h1 id="soldout_title">SOLD-OUT</h1>
		<p> Désolé <?php echo $_SESSION["prenom"]; ?>, <br />
			le monde appartient à ceux qui se lèvent tôt... <br />
			Vérifie si tu as shotgun en cliquant sur recharger :
		</p>
		<div class="btns_ctnr">
			<div href="#" onClick="window.location='index.php'" id="reload">Recharger <i class="fa-solid fa-arrow-rotate-left fa-spin fa-spin-reverse"></i></div>
			<div href="#" onClick="window.location='logout.php'" id="reload">Se déconnecter <i class="fa-solid fa-right-from-bracket fa-fade"></i></div>
		</div>
	</div>

</body>

</html>