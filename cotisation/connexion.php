<?php
session_start();


if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
	echo "Connecté : ";
	// Pour voir plus de données disponibles, voir la documentation
	// sur auth.viarezo.fr
	//echo $_SESSION["user"]["login"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	header("Location: /indiananones/index.php");
	
} else {$_SESSION["isConnected"] = false;}
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>INDIANANONES</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/cotisation/img/icon.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
	<?php
	if (isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "logout.php") {
		echo "<p>Tu as bien été déconnecté</p>";
	}
	?>

	<a href='redirect.php?redirect=https://adr.cs-campus.fr/cotisation'>SE CONNECTER</a>

	<?php include("script.php"); ?>
</body>

</html>