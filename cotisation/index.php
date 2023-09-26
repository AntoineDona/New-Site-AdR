<?php
session_start();

include("auth.php"); 
include("database.php");
//  //
	//
	//$_SESSION["isConnected"] = true;
	//$_SESSION["is_cotisant"]=true;
	//$_SESSION['shotgun']=false;
	//$_SESSION['login']='2021goulletba';
	//$_SESSION["user"]=array(
	//'firstName'=>'Bastien',
	//'lastName'=>'de Rugy',
	//'email'=>'bastien.goullet-de-rugy@student-cs.fr',
	//'promo'=>'2024',
	//);

	//
// 	//


function is_cotisant($email, $pdo)
{
	$query = $pdo->prepare("SELECT COUNT(*) as c from cotisants_23_24 where email=?");
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

$_SESSION["is_cotisant"] = is_cotisant($_SESSION["email"], $pdo);

?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>COTISATION</title>
	<meta name="google-site-verification" content="cEbrs-eyoHMLzEcQwiEu5sHkC8N61J92Z_fElR1KTMQ" />
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/cotisation/img/icon.png">
	<link rel="stylesheet" type="text/css" href="styles.css"/>
	<script src="https://kit.fontawesome.com/6ede126102.js" crossorigin="anonymous"></script>
</head>

<div id="sg_link_ctnr">

	<?php
	if ($_SESSION["is_cotisant"]) {
			echo "<p>Salut ". $_SESSION["prenom"] .", tu n'est pas cotisant·e, tu ne peux pas shotgun...
				<br />Contacte nous pour y remédier !</p>";
		} else {
			echo "<p> Salut " . $_SESSION["prenom"] . ", tu es bien cotisant·e, tu peux shotgun !</p>";
		}
	?>

	<?php include("script.php"); 
	if (!$_SESSION["is_cotisant"] && isset($_SESSION['prev_page']) && $_SESSION['prev_page'] == "action.php") {
		// Pour ceux qui ont cliqué sur shotgun et qui ne sont pas cotisants
		echo "<script>alert(\"Bien tenté mais tu n'est pas cotisant !\")</script>";
		$_SESSION['prev_page'] = "index.php";
	}
	?>
	<script type="text/javascript">
		function shotgun() {
			window.location = 'action.php';
		}

		function verif() {
			if (confirm("ATTENTION : En cliquant sur OK, tu annules ta place et la remets en jeu.")) {
				window.location = 'action.php';
			}
		}
	</script>

</body>

</html>