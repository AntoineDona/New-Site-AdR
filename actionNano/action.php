<?php
session_start();
include("auth.php"); 
include("database.php");

function depaps($email, $pdo)
	{
		$sql = 'DELETE from bronzenano WHERE email=:email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$res = $stmt->execute();
		$_SESSION['shotgun'] = false;
		header("Location: /actionNano/index.php");
	}

if (!$_SESSION['shotgun']) {

    $query = $pdo->prepare("INSERT into ? (prenom,nom, email, heure) VALUES (?,?,?,?)");
    $query->execute(array($_SESSION['nomNano'],$_SESSION["prenom"], $_SESSION["nom"], $_SESSION["email"], $_SESSION['sg_time']));
    $_SESSION['shotgun'] = true;
    header("refresh:5; url=/actionNano/index.php");
} 
else {
    depaps($_SESSION["email"], $pdo);
}

?>