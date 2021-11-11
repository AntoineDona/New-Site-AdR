<?php
session_start();
include("auth.php"); 
include("database.php");


function number_place($pdo)
{
	// Checks the number of places still available to shotgun
	$query = $pdo->prepare("SELECT SUM(taille) as s from nanovni");
	$query->execute();
	$result = $query->fetch();
	return $result['s'];
}


function has__already_shotgun($email, $pdo)
{
	//  Checks if email already shotgun, return 1 if true and 0 else
	$query = $pdo->prepare("SELECT COUNT(*) as c from nanovni where email=?");
	$query->execute(array($email));
	$result = $query->fetch();
	if ($result['c'] == 0) {
		return false;
	} else {
		return true;
	}
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

$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
$_SESSION["nom"] = $_SESSION["user"]["lastName"];
$_SESSION["email"] = $_SESSION["user"]["email"];
$_SESSION["email"] = "antoine.donascimento@student-cs.fr";

$_SESSION['total_places'] = 400;
$_SESSION['shotgun'] = has__already_shotgun($_SESSION["email"], $pdo);
$_SESSION["is_cotisant"] = is_cotisant($_SESSION["email"], $pdo);


if ($_SESSION["email"] == '???') {
	header("Location: https://adr.cs-campus.fr/latinano/troll.php");
}

// if (isset($_SESSION["preshotgun"]) && $_SESSION["preshotgun"]) {
// 	// Si dans la liste de préshotgun -> shotgun direct, en vrai pas super utile...
// 	$url = "https://adr.cs-campus.fr/nanovni/action.php";
// 	header("Location: ".$url);
//   }

if (number_place($pdo) >= $_SESSION['total_places'] and !$_SESSION['shotgun']) {
	if ($_SESSION["isConnected"]) {
		header("Location: https://adr.cs-campus.fr/latinano/fini.php");
	} else {
		header("Location: https://adr.cs-campus.fr/latinano/connexion.php");
	}
}

if (!$_SESSION["is_cotisant"] && isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "action.php") {
	// Pour ceux qui ont cliqué sur shotgun et qui ne sont pas cotisants
	echo "<script>alert(\"Tu n'es pas cotisant desolé... \")</script>";
	$_SESSION['prev_page'] = "index.php";
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>NANOVNI</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/nanovni/img/ufo.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body onload="onLoad()">
	<div class="planet-wrapper">
		<div class="planet">
		</div>
		<div class="moon-wrapper">
			<div class="moon">
			</div>
		</div>
	</div>
	<div id="titre_sg"></div>
	<div id="counter">
		<!-- <div class="digit_holder months" id="mois">
			<p class="chiffre">00</p>
			<p class="text">mois(s)</p>
		</div> -->
		<div class="digit_holder days" id="jours">
			<p class="chiffre">00</p>
			<p class="text">jours</p>
		</div>
		<div class="digit_holder hours" id="heures">
			<p class="chiffre">00</p>
			<p class="text">heures</p>
		</div>
		<div class="digit_holder minutes" id="minutes">
			<p class="chiffre">00</p>
			<p class="text">minutes</p>
		</div>
		<div class="digit_holder seconds" id="secondes">
			<p class="chiffre">00</p>
			<p class="text">secondes</p>
		</div>
	</div>
	</div>
	<p id="footer">Pas besoin de recharger la page au moment du shotgun!</p>

	<?php

	if (!$_SESSION['shotgun']) {
		if (!$_SESSION["is_cotisant"]) {
			echo "<p id='danger_msg_ctnr'>ATTENTION !! <br/> Tu n'est pas cotisant, tu NE POURREZ PAS SHOTGUN!!</p>";
		} else {
			echo "<p id='ok_msg_ctnr'> Salut " . $_SESSION["prenom"] . "! <br> Tu es bien cotisant, tu vas pouvoir Shotgun! </p>";
		}
	} else {
		echo "<p id='ok_msg_ctnr'> Bravo " . $_SESSION["prenom"] . "! <br> Tu as réussi à shotgun ta place au Nanovni. </p>";
	}
	?>
	<div id="sg_link_ctnr" href="#">
		<?php
		if (!$_SESSION['shotgun']) {
			echo '<a id="sg_link" href=# onClick="shotgun();">SHOTGUN</a>';
		} else {
			echo '<a id="sg_link" href=# onClick="verif();">DEPAPS</a>';
		}
		?>
	</div>
	<?php include("script.php"); ?>
	<script type="text/javascript">
		function shotgun() {
			window.location = 'action.php';
		}

		function verif() {
			if (confirm("ATTENTION: En cliquant sur OK, tu annules ta place et la remets en jeu.")) {
				window.location = 'action.php';
			}
		}
	</script>

</body>

</html>