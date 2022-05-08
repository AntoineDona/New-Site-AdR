<?php session_start();
include("auth.php"); //on check qu'il soit bien connecté (sinon chibrage avec les variables de session)
include('database.php') ?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>PAPS EVENTOS</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

	<?php

	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from paps_eventos");
		$query->execute();
		$result = $query->fetch();
		return $result['c'];
	}


	function depaps($email, $pdo)
	{
		$sql = 'DELETE from paps_eventos WHERE email=:email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$res = $stmt->execute();
		$_SESSION['shotgun'] = false;
		header("Location: /papsEventos/index.php");
	}

	$_SESSION['sg_time'] = date("Y-m-d H:i:s");
	$_SESSION['total_places'] = 5;

	date_default_timezone_set('Europe/Paris');
	$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');

	$shotgun_date = mktime(12, 59, 59, 05, 9, 2022);
	$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

	if ($current_date_sec >= $shotgun_date_sec) {
		if (!$_SESSION['shotgun']) {
			if (number_place($pdo) < $_SESSION['total_places']) {
				echo '<p>oui</p>';
				$query = $pdo->prepare("INSERT into paps_eventos (prenom,nom, email, heure) VALUES (?,?,?,?)");
				$query->execute(array($_SESSION["prenom"], $_SESSION["nom"], $_SESSION["email"], $_SESSION['sg_time']));
				$_SESSION['shotgun'] = true;
				header("refresh:5; url=/papsEventos/index.php");
			} else {
				header("refresh:5; url=/papsEventos/fini.php");
			}
		} else {
			depaps($_SESSION["email"], $pdo);
		}
	} else if ($_SESSION['shotgun']) {
		depaps($_SESSION["email"], $pdo);
	} else {
		header("Location: /papsEventos/");
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