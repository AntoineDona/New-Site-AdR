<?php
session_start();
include '../../gestion/database.php';
$sqlQuery = 'INSERT INTO girafe(login,surname,pole,prenom) VALUES (:login,:surname,:pole,:prenom) ';
$adrStatement = $pdo->prepare($sqlQuery);
$adrStatement->execute([
    'login'=>$_POST['loginVR'],
    'surname'=>$_POST['surnom'],
    'pole'=>$_POST['type-pole'],
    'prenom'=>$_POST['prenom'],

]);
header('Location:../temporaire/validMessage.php')
?>