<?php
session_start();
?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>SOLD-OUT</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body class="finito">

<?php
function number_place($pdo){
		$query = $pdo->prepare("SELECT COUNT(*) as c from equinanox");
		$query->execute();
		$result= $query->fetch();
		return $result['c'];
}
if (number_place($pdo)<550){
	if ($_SESSION["isConnected"]){
		header("Location: https://adr.cs-campus.fr/nano/index.php");
	}
	else{
		header("Location: https://adr.cs-campus.fr/nano/connexion.php");
	}
}
if ($_SESSION['shotgun']){
	header("Location: https://adr.cs-campus.fr/nano/index.php");
}
?>
	<div class="fin" style="background-color:rgba(255,255,255,0.9);width:70%;margin:auto;">
	<h1 class="soldout">SOLD-OUT</h1>
	<h1 class="finito">Le monde appartient à ceux qui se lèvent tôt</h1>
	<h2 class="finito"><br>
		<?php
	
	echo 'Salut '.$_SESSION["prenom"].', vérifie si tu as bien ta place en rechargeant !';
	?>
	
	</h2>
	</div>
	<div href="#" onClick="window.location='index.php'" id="reload">&#8635; Recharger</div>

</body>

</html>
