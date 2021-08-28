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
 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

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

	$query = $pdo->prepare("SELECT * from representants_fp where email=?");
	$query->execute(array($email));
	$result= $query->fetch();
	return $result['taille'];
}

$_SESSION["fsize"] = family_size($_SESSION["email"],$pdo);

// function isCotisant($mail,$pdo){
// 	$query = $pdo->prepare("SELECT * from parrains WHERE EMAIL=?");
// 	$query->execute(array($mail));
// 	$result= $query->fetch();
// 	if ($result["COTISANT"] == 'oui'){
// 		return true;
// 	}
// 	else{
// 		return false;
// 	}
// }


$_SESSION["promo"]=$_SESSION["user"]["promo"];
?>
	

 
<?php 
date_default_timezone_set('Europe/Paris');
$current_date_sec = (((date('d')-1)*24 + date('H'))*60 + date('i'))*60 + date('s');

$shotgun_date = mktime(22, 0, 0, 8, 26, 2021);
$shotgun_date_sec = (((date('d', $shotgun_date)-1)*24 + date('H', $shotgun_date))*60 + date('i', $shotgun_date))*60 + date('s', $shotgun_date);

$end_date = mktime(22, 00, 0, 8, 29, 2021);
$end_date_sec = (((date('d', $end_date)-1)*24 + date('H', $end_date))*60 + date('i', $end_date))*60 + date('s', $end_date);
if ($current_date_sec >= $shotgun_date_sec && $current_date_sec <= $end_date_sec) {
	if ($_SESSION["is_representant"] == false) {
		$_SESSION['prev_page']="action.php";
		header("Location: /nanolympique/index.php");
	} else {
		if (!$_SESSION['shotgun']) {
			if (number_place($pdo) + family_size($_SESSION["email"],$pdo)< 500) {
				$query=$pdo->prepare("INSERT into nanolympique (prenom,nom, email, heure, taille) VALUES (?,?,?,?,?)");
				$query->execute(array($_SESSION["prenom"],$_SESSION["nom"],$_SESSION["email"],$_SESSION['sg_time'],family_size($_SESSION["email"],$pdo)));
				//$_SESSION['shotgun'] = true;
				echo "email:" . $_SESSION["email"];
echo "famsize:" . family_size($_SESSION["email"],$pdo);
				header("refresh:5; Location: /nanolympique/index.php");
            } else {
				header("Location: /nanolympique/fini.php");
            }
     	} else {
			$sql ='DELETE from nanolympique WHERE email=:email';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':email', $_SESSION["email"]);
			$res = $stmt->execute();
			$_SESSION['shotgun'] = false;
			header("Location: /nanolympique/index.php");
      	}
	}
} else {
	header("Location: /nanolympique/");
}
 ?>


</body>
</html>
