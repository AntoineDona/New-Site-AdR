<?php
session_start();
include("database.php"); 
?>

<!DOCTYPE html>
<html>

<head>
	<title>SOLD-OUT</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/img/math.png">
	<link rel="stylesheet" href="styles.css">
	<script type="text/javascript" src="script.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<!-- <?php
function number_place($pdo)
{
	$query = $pdo->prepare("SELECT COUNT(*) as c from giganano");
	$query->execute();
	$result = $query->fetch();
	return $result['c'];
}
if (number_place($pdo) < $_SESSION["total_places"]) {
	if ($_SESSION["isConnected"]) {
		header("Location: /giganano/index.php");
	} else {
		header("Location: /giganano/connexion.php");
	}
}
if ($_SESSION['shotgun']) {
	header("Location: /giganano/index.php");
}
?> -->

<body id="gradient">
	<div class="soldout_ctnr">
		<h1 id="soldout_title">SOLD-OUT</h1>
		<p> Désolé <?php echo $_SESSION["prenom"]; ?>! <br />
			Le monde appartient à ceux qui se lèvent tôt... <br />
			Vérifie si tu as shotgun en cliquant sur recharger:
		</p>
		<div class="btns_ctnr">
			<div href="#" onClick="window.location='index.php'" id="reload">&#8635; Recharger</div>
			<div href="#" onClick="window.location='logout.php'" id="reload">Se Déconnecter</div>
		</div>
	</div>

</body>

</html>