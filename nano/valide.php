<?php
session_start();
?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Validation</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
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
	
	$sql ='UPDATE equinanox SET entree="oui" WHERE prenom= :prenom AND nom= :nom ';
	      $stmt = $pdo->prepare($sql);
	      $stmt->bindValue(':prenom', $_GET["prenom"]);
	      $stmt->bindValue(':nom', $_GET["nom"]);
	      $res = $stmt->execute();
	

?>

	<h1 class="soldout">Bon Nano<br>
		<?php
			echo 'Merci '.$_GET["prenom"].' '.$_GET["nom"];
		?>
	</h1>
		
	
	</h2>
	
	<div href="#" onClick="window.location='interfacev2.php'" id="reload">&#8635; Retour</div>

</body>

</html>
