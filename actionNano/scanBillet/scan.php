<?php
session_start();
include('../database.php');

if(isset($_SESSION['is_connected']) and !$_SESSION['is_connected']){
    header('Location: index.php');
}
elseif(!isset($_POST['id'])){
    header('Location: index.php');
}

$id=$_POST['id'];

$sqlQuery='UPDATE papybang SET entree=:entree WHERE id=:id';
$scanStatement=$pdo->prepare($sqlQuery);
$scanStatement->execute([
    'entree'=>1,
    'id'=>$id,
]) or die(print_r($pdo->errorInfo()));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCAN NANO</title>
</head>
<body>
    <p>Scan réussi.</p>
    <button onclick="window.open('','_self','').close()">Fermer la page</button>
</body>
</html>