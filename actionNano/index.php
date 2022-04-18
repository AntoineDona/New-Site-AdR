<?php
// fichiers pour ajouter les vieux qui se sont listés
session_start();

//indiquer ci-dessous le nom de db du nano associer
$_SESSION['nomNano']='bronzenano';

include("auth.php"); 
include("database.php");

$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
$_SESSION["nom"] = $_SESSION["user"]["lastName"];
$_SESSION["email"] = $_SESSION["user"]["email"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <title>SG VIEUX</title>
</head>
<body>
<div id="sg_link_ctnr">
		<?php
		if (!$_SESSION['shotgun']) {
			echo '<a href="action.php" >SHOTGUN</a>';
		} 
		?>
	</div>
</body>
</html>