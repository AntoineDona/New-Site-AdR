<?php session_start();
include("auth.php"); //on check qu'il soit bien connecté (sinon chibrage avec les variables de session)
include('database.php') ?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>PAPYBANG</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/papybang/img/cassetteIcon.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

	<?php

	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from papybang");
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
		$sql = 'DELETE from papybang WHERE email=:email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$res = $stmt->execute();
		$_SESSION['shotgun'] = false;
		header("Location: /papybang/index.php");
	}
	##les fonctionnalités qui suivent sont exclusivent au papybang##
	function isOld($login){
		$year=intval(substr($login, 0, 4));
		if($login=='2021goulletba'){
			return True;
		}
		elseif($year>=2020){
			return False;
		}
		else{
			return true;
		}
	}
	// function isYoung($login){
	// 	$year=intval(substr($login, 0, 4));
	// 	if($login=='2021goulletba'){
	// 		return false;
	// 	}
	// 	elseif($year>=2020){
	// 		return True;
	// 	}
	// 	else{
	// 		return False;
	// 	}
	// }
	$shotgun_date_young = mktime(12, 59, 59, 03, 30, 2022);
	$shotgun_date_young_sec = (((date('d', $shotgun_date_young) - 1) * 24 + date('H', $shotgun_date_young)) * 60 + date('i', $shotgun_date_young)) * 60 + date('s', $shotgun_date_young);


	##
	$_SESSION['sg_time'] = date("Y-m-d H:i:s");
	$_SESSION['is_cotisant'] = is_cotisant($_SESSION['email'], $pdo);
	$_SESSION['total_places'] = 750;

	date_default_timezone_set('Europe/Paris');
	$current_date_sec = (((date('d') - 1 ) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');

	$shotgun_date = mktime(12, 59, 59, 03, 28, 2022);
	$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

	$end_date = mktime(03, 00, 00, 04, 02, 2022);
	$end_date_sec = (((date('d', $end_date) - 1) * 24 + date('H', $end_date)) * 60 + date('i', $end_date)) * 60 + date('s', $end_date);
	
				if (!$_SESSION['shotgun']) {
					if (number_place($pdo) < $_SESSION['total_places']) {
						if(intval($_SESSION['user']['promo'])<2023){
							$query = $pdo->prepare("INSERT into papybang (prenom,nom, email, heure, promo) VALUES (?,?,?,?,?)");
							$query->execute(array($_SESSION["prenom"], $_SESSION["nom"], $_SESSION["email"], $_SESSION['sg_time'],$_SESSION['user']['promo']));
							$_SESSION['shotgun'] = true;
							header("refresh:5; url=/papybang/index.php");
						}
					} 
					else {
						header("refresh:5; url=/papybang/fini.php");
					}
				} 
				else {
					depaps($_SESSION["email"], $pdo);
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
