<?php session_start(); ?>
<?php include('database.php') ?>

<!DOCTYPE html><html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<title>EQUINANOXE</title><link rel="icon" type="image/png" href="img/adr_ico.png" />
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<?php

function number_place($pdo){
	$query = $pdo->prepare("SELECT COUNT(*) as c from equinanox");
	$query->execute();
	$result= $query->fetch();
	return $result['c'];
}

function isCotisant($mail,$pdo){
	$query = $pdo->prepare("SELECT * from cotisants_p2022 WHERE EMAIL=?");
	$query->execute(array($mail));
	$result= $query->fetch();
	if ($result["COTISANT"] == 'oui'){
		return true;
	}
	else{
		return false;
	}
}


$_SESSION["promo"]=$_SESSION["user"]["promo"];
?>
	

 
<?php 
date_default_timezone_set('Europe/Paris');
$current_date_sec = (((date('d')-1)*24 + date('H'))*60 + date('i'))*60 + date('s');
$shotgun_date = mktime(21, 0, 0, 9, 28, 2020);
$shotgun_date_sec = (((date('d', $shotgun_date)-1)*24 + date('H', $shotgun_date))*60 + date('i', $shotgun_date))*60 + date('s', $shotgun_date);
$end_date = mktime(23, 50, 0, 9,29, 2020);
$end_date_sec = (((date('d', $end_date)-1)*24 + date('H', $end_date))*60 + date('i', $end_date))*60 + date('s', $end_date);
if ($current_date_sec >= $shotgun_date_sec && $current_date_sec <= $end_date_sec) {
	if ($_SESSION["cotisant"] == false) {
		header("Location: https://adr.cs-campus.fr/nano/non_cotisant.php");
	} else {
		if (!$_SESSION['shotgun']) {
			if (number_place($pdo) < 550) {
				$query=$pdo->prepare("INSERT into equinanox (prenom,nom,heure) VALUES (?,?,?)");
				$query->execute(array($_SESSION["prenom"],$_SESSION["nom"],date("H:i:s")));
				$_SESSION['shotgun'] = true;
				header("Location: https://adr.cs-campus.fr/nano/index.php");
            } else {
				header("Location: https://adr.cs-campus.fr/nano/fini.php");
            }
     	} else {
			$sql ='DELETE from equinanox WHERE prenom=:prenom AND nom= :nom';
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':nom', $_SESSION["nom"]);
			$stmt->bindValue(':prenom', $_SESSION["prenom"]);
			$res = $stmt->execute();
			$_SESSION['shotgun'] = false;
			header("Location: https://adr.cs-campus.fr/nano/");
      	}
	}
} else {
	header("Location: https://adr.cs-campus.fr/nano/");
}
 ?>


</body>
</html>
