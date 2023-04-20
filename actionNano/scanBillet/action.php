<?php
session_start();
include('../database.php');

// if(!isset($_COOKIE['nomNano']) and !isset($_COOKIE['is_connected'])){
//     header('Location : index.php');
// }


$sqlQuery2='SELECT COUNT(*) FROM '.$_COOKIE['nomNano'].' WHERE entree=0';
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
        <div class="form_field">
            <?php
            $password=$_POST['password'];
            if($password=='secret'){
                $_SESSION['error']=false;
                header('Location: billetGenerator.php');
            }
            elseif($password!='lesvieuxontunqr'){
                $_SESSION['error']=true;
                header('Location: index.php');
            }
            else{
                $_SESSION['error']=false;
                echo '<p class="message">Tu es connecté(e), tu peux commencer à scanner les billets.</p>';
                setcookie(
                    'is_connected',
                    true,
                    time() + 24*3600
                );
            }
            ?>
        </div>  
        <div class="message">
            <p>Billets scannés : <?php echo $scanned[0][0] ?></p>
            <!-- <p>Billets non scannés : <?php echo $noScanned[0][0] ?></p>! -->
        </div>
    </div>
</body>

</html>