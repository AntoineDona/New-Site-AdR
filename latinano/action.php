<?php session_start(); ?>
<?php include('database.php') ?>

<!DOCTYPE html>
<html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>LATINANO</title>
	<link rel="icon" type="image/png" href="img/adr_ico.png" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<?php
	$_SESSION['sg_time'] = date("Y-m-d H:i:s");

	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT SUM(taille) as s from latinano");
		$query->execute();
		$result = $query->fetch();
		return $result['s'];
	}

	function is_rpz($email, $pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from representants_fp where email=?"); //changer en representants_fp
		$query->execute(array($email));
		$result = $query->fetch();
		if ($result['c'] == 0) {
			return false;
		} else {
			return true;
		}
	}

	function infos($email, $pdo)
	{

		$query = $pdo->prepare("SELECT * from representants_fp where email=?");
		$query->execute(array($email));
		$result = $query->fetch();
		return $result;
	}
	$_SESSION["infos"] = infos($_SESSION["email"], $pdo);


	$_SESSION["prenom"] = $_SESSION["infos"]["prenom"];
	$_SESSION["nom"] = $_SESSION["infos"]["nom"];
	$_SESSION["fsize"] = $_SESSION["infos"]["taille"];
	$_SESSION["fname"] = $_SESSION["infos"]["famille"];
	$_SESSION["preshotgun"] = $_SESSION["infos"]["preshotgun"];

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


	$_SESSION["promo"] = $_SESSION["user"]["promo"];
	?>


	<?php
	date_default_timezone_set('Europe/Paris');
	$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');

	$shotgun_date = mktime(21, 0, 0, 9, 7, 2021);
	$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

	$end_date = mktime(22, 00, 0, 9, 8, 2021);
	$end_date_sec = (((date('d', $end_date) - 1) * 24 + date('H', $end_date)) * 60 + date('i', $end_date)) * 60 + date('s', $end_date);
	if (($current_date_sec >= $shotgun_date_sec && $current_date_sec <= $end_date_sec) || $_SESSION["preshotgun"]) {
		if ($_SESSION["is_representant"] == false) {
			$_SESSION['prev_page'] = "action.php";
			header("Location: /latinano/index.php");
		} else {
			if (!$_SESSION['shotgun']) {
				if (number_place($pdo) + $_SESSION["fsize"] < 880) {
					$query = $pdo->prepare("INSERT into latinano (prenom, nom, email, heure, taille, famille) VALUES (?,?,?,?,?,?)");
					$query->execute(array($_SESSION["prenom"], $_SESSION["nom"], $_SESSION["email"], $_SESSION['sg_time'], $_SESSION["fsize"], $_SESSION["fname"]));
					//$_SESSION['shotgun'] = true;
					header("refresh:5; url=/latinano/index.php");
				} else {
					header("refresh:5; url=/latinano/fini.php");
				}
			} else {
				$sql = 'DELETE from latinano WHERE email=:email';
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(':email', $_SESSION["email"]);
				$res = $stmt->execute();
				$_SESSION['shotgun'] = false;
				header("Location: /latinano/index.php");
			}
		}
	} else if ($_SESSION['shotgun']) {
		$sql = 'DELETE from latinano WHERE email=:email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $_SESSION["email"]);
		$res = $stmt->execute();
		$_SESSION['shotgun'] = false;
		header("Location: /latinano/index.php");
	} else {
		header("Location: /latinano/index.php");
	}
	?>
	<div class="loading-animation-box">
		<div>
			<div class="lds-ripple">
				<div></div>
				<div></div>
			</div>
		</div>
	</div>

</body>

</html>