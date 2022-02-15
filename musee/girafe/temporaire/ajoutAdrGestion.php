<?php
session_start();
include '../../gestion/database.php';
$sqlQuery = 'INSERT INTO girafe(login,surname,pole,prenom) VALUES (:login,:surname,:pole,:prenom) ';
$adrStatement = $pdo->prepare($sqlQuery);
$adrStatement->execute([
    'login'=>$xx,
    'surname'=>$xx,
    'pole'=>$xx,
    'prenom'=>$xx,

]);
?>