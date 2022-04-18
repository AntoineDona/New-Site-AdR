<?php
session_start();


if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
	echo "Connecté : ";
	// Pour voir plus de données disponibles, voir la documentation
	// sur auth.viarezo.fr
	//echo $_SESSION["user"]["login"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	header("Location: /actionNano/index.php");
	
} else {$_SESSION["isConnected"] = false;}
?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>SG VIEUX</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body class="align">
	<div class="grid">
		<div class="form__field" href="#">
			<a class="button-submit" href='redirect.php?redirect=https://adr.cs-campus.fr/actionNano'>Se connecter</a>
		</div>
	</div>
</body>
	
</html>