<?php
session_start();
?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>SOLD-OUT</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/images/favicon/favicon-96x96.png">
	<link rel="stylesheet" href="styles.css">
</head>

<?php
function number_place($pdo)
{
	$query = $pdo->prepare("SELECT COUNT(*) as c from nanolympique");
	$query->execute();
	$result = $query->fetch();
	return $result['c'];
}
if (number_place($pdo) < 0) {
	if ($_SESSION["isConnected"]) {
		header("Location: https://adr.cs-campus.fr/nanolympique/index.php");
	} else {
		header("Location: https://adr.cs-campus.fr/nanolympique/connexion.php");
	}
}
if ($_SESSION['shotgun']) {
	header("Location: https://adr.cs-campus.fr/nanolympique/index.php");
}
?>

<body>
	<div class="fin">
		<h1 class="soldout">SOLD-OUT</h1>
		<h1 class="finito">Le monde appartient à ceux qui se lèvent tôt! Et à ceux qui ont la fibre...</h1>
		<h2 class="finito"><br>
			<?php

			echo 'Salut ' . $_SESSION["prenom"] . ', vérifie si tu as bien ta place en rechargeant !';
			?>

		</h2>
	</div>
	<div href="#" onClick="window.location='index.php'" id="reload">&#8635; Recharger</div>

</body>

</html>