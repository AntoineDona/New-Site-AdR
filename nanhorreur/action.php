<?php session_start();
include("auth.php"); //on check qu'il soit bien connecté (sinon chibrage avec les variables de session)
include('database.php') ?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>NAN'HORREUR</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/nanhorreur/img/iconPumpk.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

	<?php

	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from nanhorreur");
		$query->execute();
		$result = $query->fetch();
		return $result['c'];
	}

	function is_cotisant($email, $pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from cotisants where email=?");
		$query->execute(array($email));
		$result = $query->fetch();
		if ($result['c'] == 0) {
			return false;
		} else {
			return true;
		}
	}

	function depaps($email, $pdo)
	{
		$sql = 'DELETE from nanhorreur WHERE email=:email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$res = $stmt->execute();
		$_SESSION['shotgun'] = false;
		header("Location: /nanhorreur/index.php");
	}

	$_SESSION['sg_time'] = date("Y-m-d H:i:s");
	$_SESSION['is_cotisant'] = is_cotisant($_SESSION['email'], $pdo);
	$_SESSION['total_places'] = 450;

	date_default_timezone_set('Europe/Paris');
	$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');

	$shotgun_date = mktime(13, 04, 59, 11, 08, 2022);
	$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

	$end_date = mktime(03, 00, 0, 11, 10, 2022);
	$end_date_sec = (((date('d', $end_date) - 1) * 24 + date('H', $end_date)) * 60 + date('i', $end_date)) * 60 + date('s', $end_date);
	if ($current_date_sec >= $shotgun_date_sec) {
		if ($_SESSION["is_cotisant"] == false) {
			$_SESSION['prev_page'] = "action.php";
			header("Location: /nanhorreur/index.php");
		} else {
			if (!$_SESSION['shotgun']) {
				if (number_place($pdo) < $_SESSION['total_places']) {
					$query = $pdo->prepare("INSERT into nanhorreur (prenom,nom, email, heure) VALUES (?,?,?,?)");
					$query->execute(array($_SESSION["prenom"], $_SESSION["nom"], $_SESSION["email"], $_SESSION['sg_time']));
					$_SESSION['shotgun'] = true;
					header("refresh:5; url=/nanhorreur/index.php");
				} else {
					header("refresh:5; url=/nanhorreur/fini.php");
				}
			} else {
				depaps($_SESSION["email"], $pdo);
			}
		}
	} else if ($_SESSION['shotgun']) {
		depaps($_SESSION["email"], $pdo);
	} else {
		header("Location: /nanhorreur/");
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