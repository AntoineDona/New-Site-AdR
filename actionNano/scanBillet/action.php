<?php
session_start();
include('../database.php');
$sqlQuery2='SELECT COUNT(*) FROM papybang WHERE entree=0';
$noScannedStatement=$pdo->prepare($sqlQuery2);
$noScannedStatement->execute();
$noScanned = $noScannedStatement->fetchAll();

$sqlQuery3='SELECT COUNT(*) FROM papybang WHERE entree=1';
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
        <div class="form_field">
            <?php
            $password=$_POST['password'];
            if($password!='1969'){
                header('Location: index.php');
                $_SESSION['error']=true;
            }
            else{
                $_SESSION['is_connected']=true;
                echo '<p class="message">Tu es connecté(e), tu peux commencer à scanner les billets.</p>';
            }
            ?>
        </div>  
        <div class="message">
            <p>Billets scannés : <?php echo $scanned[0][0] ?></p>
            <p>Billets non scannés : <?php echo $noScanned[0][0] ?></p>
        </div>
    </div>
</body>

</html>