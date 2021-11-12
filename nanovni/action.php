<?php session_start();
include("auth.php"); //on check qu'il soit bien connecté (sinon chibrage avec les variables de session)
include('database.php') ?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>NANOVNI</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/nanovni/img/ufo.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

	<?php

	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT SUM(taille) as s from nanovni");
		$query->execute();
		$result = $query->fetch();
		return $result['s'];
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
		$sql = 'DELETE from nanovni WHERE email=:email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$res = $stmt->execute();
		$_SESSION['shotgun'] = false;
		// header("Location: /nanovni/index.php");
	}

	$_SESSION['sg_time'] = date("Y-m-d H:i:s");
	$_SESSION['is_cotisant'] = is_cotisant($_SESSION['email'], $pdo);

	date_default_timezone_set('Europe/Paris');
	$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');

	$shotgun_date = mktime(19, 0, 0, 11, 1, 2021);
	$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

	$end_date = mktime(22, 00, 0, 11, 29, 2021);
	$end_date_sec = (((date('d', $end_date) - 1) * 24 + date('H', $end_date)) * 60 + date('i', $end_date)) * 60 + date('s', $end_date);
	echo "<p>On est en 0</p>";
	if ($current_date_sec >= $shotgun_date_sec && $current_date_sec <= $end_date_sec) {
		echo "<p>On est en 1</p>";
		if ($_SESSION["is_cotisant"] == false) {
			echo "<p>On est en 2</p>";
			$_SESSION['prev_page'] = "action.php";
			// header("Location: /nanovni/index.php");
		} else {
			echo "<p>On est en 3</p>";
			if (!$_SESSION['shotgun']) {
				echo "<p>On est en 4</p>";
				if (number_place($pdo) < $_SESSION['total_places']) {
					echo "<p>On est en 5</p>";
					$query = $pdo->prepare("INSERT into nanovni (prenom,nom, email, heure) VALUES (?,?,?,?)");
					$query->execute(array($_SESSION["prenom"], $_SESSION["nom"], $_SESSION["email"], $_SESSION['sg_time']));
					//$_SESSION['shotgun'] = true;
					// header("refresh:5; url=/nanovni/index.php");
				} else {
					echo "<p>On est en 6</p>";
					header("refresh:5; url=/nanovni/fini.php");
				}
			}
			echo "<p>On est en 7</p>";
			depaps($_SESSION["email"], $pdo);
		}
	} else if ($_SESSION['shotgun']) {
		echo "<p>On est en 8</p>";
		depaps($_SESSION["email"], $pdo);
	} else {
		echo "<p>On est en 9</p>";
		header("Location: /nanovni/");
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