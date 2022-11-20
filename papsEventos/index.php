<?php
session_start();

include("auth.php"); 
include("database.php");
// //
// 	//
	// $_SESSION["isConnected"] = true;
	// // $_SESSION['shotgun']=false; 
	// $_SESSION['login']='2021goulletba';
	// $_SESSION["user"]=array(
	// 	'firstName'=>'Bastien',
	// 	'lastName'=>'de Rugy',
	// 	'email'=>'bastien.goullet-de-rugy@student-cs.fr',
	// 	'promo'=>'2024',
	// );

// 	//
// 	//

function number_place($pdo)
{
	// Checks the number of places still available to shotgun
	$query = $pdo->prepare("SELECT COUNT(*) as c from paps_eventos");
	$query->execute();
	$result = $query->fetch();
	return $result['c'];
}


function has__already_shotgun($email, $pdo)
{
	//  Checks if email already shotgun, return 1 if true and 0 else
	$query = $pdo->prepare("SELECT COUNT(*) as c from paps_eventos where email=?");
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

$_SESSION['total_places'] = 12;
$_SESSION['dateEvent']=' Mercredi 11 Mai de 21h à 00h';
$_SESSION['shotgun'] = has__already_shotgun($_SESSION["email"], $pdo);


if (number_place($pdo) >= $_SESSION['total_places'] and !$_SESSION['shotgun']) {
	if ($_SESSION["isConnected"]) {
		header("Location: /papsEventos/fini.php");
	} else {
		header("Location: /papsEventos/connexion.php");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>PAPS EVENTOS</title>
	<meta name="google-site-verification" content="cEbrs-eyoHMLzEcQwiEu5sHkC8N61J92Z_fElR1KTMQ" />
	<!-- <meta property="og:image" content="https://adr.cs-campus.fr/papsEventos/img/fb_banner.jpg" /> -->
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body onload="onLoad()">
	




</body>
<body class="align" onload="onLoad()">
	<div class="grid">
		<div class="form__field" href="#">
			<div class="button-submit">
				<?php
				if (!$_SESSION['shotgun']) {
					echo '<a href="action.php" >SHOTGUN</a>';
				} 
				else {
					echo '<div><a href=# onClick="verif();">DEPAPS</a></div>';
				}
				?>
			</div>
		</div>
		<?php
			if (!$_SESSION['shotgun']) {
				echo "
				<div class='message' style='margin-top:20px'>
					<div id='titre_sg' ></div>
					<div id='counter'>
						<div class='digit_holder days' id='jours'>
							<p class='chiffre'>00</p>
						</div>
						<div class='digit_holder hours' id='heures'>
							<p class='chiffre'>00</p>
						</div>
						<div class='digit_holder minutes' id='minutes'>
							<p class='chiffre'>00</p>
						</div>
						<div class='digit_holder seconds' id='secondes'>
							<p class='chiffre'>00</p>
						</div> 
				</div>
				<p id='message'> Salut " . $_SESSION["prenom"] . ", tu vas pouvoir shotgun!</p>";
			} 
			else {
				echo "<p class='message'> Bravo " . $_SESSION["prenom"] . "! <br> Tu as réussi à shotgun ta place. <br> Rendez-vous le ".$_SESSION['dateEvent']." pour l'event.</p>";
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