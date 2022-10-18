<?php
session_start();
include('../database.php');

if(isset($_COOKIE['is_connected']) and !$_COOKIE['is_connected']){
    header('Location: index.php');
}
elseif(!isset($_POST['id'])){
    header('Location: index.php');
}


$id=$_POST['id'];

$sqlQuery='UPDATE '.$_COOKIE['nomNano'].' SET entree=:entree WHERE id=:id';
$scanStatement=$pdo->prepare($sqlQuery);
$scanStatement->execute([
    'entree'=>1,
    'id'=>$id,
]) or die(print_r($pdo->errorInfo()));

$sqlQuery2='SELECT COUNT(*) FROM '.$_COOKIE['nomNano'].' WHERE entree=NULL';
$noScannedStatement=$pdo->prepare($sqlQuery2);
$noScannedStatement->execute();
$noScanned = $noScannedStatement->fetchAll();

$sqlQuery3='SELECT COUNT(*) FROM '.$_COOKIE['nomNano'].' WHERE entree=1';
$scannedStatement=$pdo->prepare($sqlQuery3);
$scannedStatement->execute();
$scanned = $scannedStatement->fetchAll();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <title>SCAN NANO</title>
</head>
<body class='align'>
    <div class="grid">
        <p class='message' style='background:#4DAF7C'>Scan réussi.</p>
        <!-- <button onclick="window.open('','_self','').close()">Fermer la page</button> -->
        <div class="message">
            <p class='message'>Billets scannés : <?php echo $scanned[0][0] ?></p>
            <p>Billets non scannés : <?php echo $noScanned[0][0] ?></p>
        </div>
    </div>
</body>
</html>