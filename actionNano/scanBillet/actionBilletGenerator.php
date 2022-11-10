<?php
session_start();
include('../database.php');

$_SESSION['genereQR']=true;
$_SESSION['sg_time'] = date("Y-m-d H:i:s");


$query = $pdo->prepare("SELECT COUNT(*) as i from ".$_COOKIE['nomNano']." where id=?");
$query->execute(array($_SESSION['number']));
$result = $query->fetch();
if ($result['i'] > 0) {
    $test=true;
    while($test){
        $_SESSION['number']++;
        $query = $pdo->prepare("SELECT COUNT(*) as i from ".$_COOKIE['nomNano']." where id=?");
        $query->execute(array($_SESSION['number']));
        $result = $query->fetch();
        if($result['i'] == 0){
            $test=false;
        }
    }
} 

$query = $pdo->prepare("INSERT into ".$_COOKIE['nomNano']." (id,prenom,nom, email, heure,form) VALUES (?,?,?,?,?,?)");
$query->execute(array($_SESSION['number'],'Marcus','le bonobo','oui@monfion.fr', $_SESSION['sg_time'],1));

header('Location:billetGenerator.php');
?>
