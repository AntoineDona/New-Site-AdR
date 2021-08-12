<?php
session_start();
?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>NON COTISANT</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body class="finito">
	
	<?php 
		function is_cotiz($mail,$pdo){
		$query = $pdo->prepare("SELECT COUNT(*) as c from cotisants_p2022 where EMAIL=? and COTISANT='oui'");
		$query->execute(array($mail));
		$result= $query->fetch();
		return $result['c'];
	}
	$_SESSION["email"] = $_SESSION["user"]["email"];
	$cotiz = is_cotiz($_SESSION["email"],$pdo);
	
	if ($_SESSION["promo"]==2022){
			if ($cotiz==0){
				$_SESSION["cotisant"] = false;
			}
			else{
				$_SESSION["cotisant"] = true;
				echo "trop cool tu as cotisé";
				// header("Location: https://adr.cs-campus.fr/nanolympique/index.php");
			}
		}
		else{
			$_SESSION["cotisant"] = true;
			echo "bah toi t'es en 2A";
			// header("Location: https://adr.cs-campus.fr/nanolympique/index.php");
		}
	
	?>



	<h1 class="soldout">NON COTISANT</h1>
	<h1 class="finito">T'es vraiment pas cotisant cette fois...</h1>
	<?php echo "<script>alert(\"Tu n'es pas noté.e comme cotisant.e chez nous... si tu es sûr.e d'avoir cotisé demande nous !\")</script>"; ?>
	<img src="sydney.jpeg" class="sydney">
	

</body>

</html>
