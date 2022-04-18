<?php
// fichier pour ajouter les vieux lors d'un nano
session_start();

//indiquer le nom de la db du nano et celui du dossier associer
$_SESSION['nomNano']='bronzenano';

include("auth.php"); 
include("database.php");

// //
// // 	//
// 	$_SESSION["isConnected"] = true;
// 	$_SESSION["is_cotisant"]=true;
// 	// $_SESSION['shotgun']=false;
// 	$_SESSION['login']='2021goulletba';
// 	$_SESSION["user"]=array(
// 		'firstName'=>'Bastien',
// 		'lastName'=>'de Rugy',
// 		'email'=>'bastien.goullet-de-rugy@student-cs.fr',
// 		'promo'=>'2024',
// 	);

// 	//
// 	//



function has__already_shotgun($email, $pdo)
{
	//  Checks if email already shotgun, return 1 if true and 0 else
	$query = $pdo->prepare("SELECT COUNT(*) as c from bronzenano where email=?");
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

$_SESSION['shotgun'] = has__already_shotgun($_SESSION["email"], $pdo);
$_SESSION["is_cotisant"] = is_cotisant($_SESSION["email"], $pdo);


?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>SG VIEUX</title>
	<meta name="google-site-verification" content="cEbrs-eyoHMLzEcQwiEu5sHkC8N61J92Z_fElR1KTMQ" />
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body class="align">
	<div class='grid'>
        <div class="form__field">
            <?php
            if (!$_SESSION['shotgun']) {
                echo '<a class="button-submit" href="action.php" >SHOTGUN</a>';
            } 
            else {
                header('Location:../'.$_SESSION['nomNano']);
            }
            ?>
        </div>
	</div>

	<?php
	
	
	?>


</body>

</html>