
<?php session_start(); ?>
<?php include('database.php') ?>

<!DOCTYPE html><html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title>NANOLYMPIQUE</title><link rel="icon" type="image/png" href="img/adr_ico.png" />
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php



$_SESSION['sg_time'] = date("Y-m-d H:i:s");

function number_place($pdo){
	$query = $pdo->prepare("SELECT SUM(family-size) as s from nanolympique");
	$query->execute();
	$result= $query->fetch();
	return $result['s'];
}

function is_rpz($email, $pdo)
{
	$query = $pdo->prepare("SELECT COUNT(*) as c from representants_fp where email=?"); //changer en representants_fp
	$query->execute(array($email));
	$result = $query->fetch();
	if ($result['c']==0){
		return false;
	}
	else{
		return true;
	}
}

function family_size($email, $pdo){

	$query = $pdo->prepare("SELECT family-size from representants_fp where email=?");
	$query->execute(array($email));
	$result= $query->fetch();
	return $result['family-size'];
}

$_SESSION["promo"]=$_SESSION["user"]["promo"];

echo "email:" . $_SESSION["email"];
echo "famsize:" . family_size($_SESSION["email"],$pdo);
?>


</body>
</html>