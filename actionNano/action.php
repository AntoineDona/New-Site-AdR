<?php
session_start();
include("auth.php"); 
include("database.php");
$_SESSION['sg_time'] = date("Y-m-d H:i:s");

$query = $pdo->prepare("INSERT INTO ".$_SESSION['nomNano']."(prenom,nom,email,heure) VALUES (:prenom,:nom,:email,:heure)");
$query->execute([
	'prenom'=>$_SESSION["prenom"], 
	'nom'=>$_SESSION["nom"], 
	'email'=>$_SESSION["email"],
	'heure'=>$_SESSION['sg_time'],
]);
$_SESSION['shotgun'] = true;
header('Location:../'.$_SESSION['nomNano']);

?>