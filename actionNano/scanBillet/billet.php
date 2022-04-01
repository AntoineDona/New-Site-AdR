<?php
session_start();
include('../database.php');
if(!isset($_SESSION['is_connected']) or !isset($_GET['id']) or (isset($_SESSION['is_connected']) and !$_SESSION['is_connected'])){
    header('Location: /actionNano/scanBillet/index.php');
    $_SESSION['is_connected']=false;
}


$id=intval($_GET['id']);

//on récupère les données de la personne
$sqlQuery = 'SELECT * FROM papybang WHERE id=:id';
$pdoStatement = $pdo->prepare($sqlQuery);
$pdoStatement->execute([
    'id'=>$id
]);
$users = $pdoStatement->fetchAll();
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
        <!-- test si la place existe bien -->
        <?php if($users==array()):?>
            <p class='message'>La place n'est plus valide, demander à la personne de récuperer son QR code sur la page du sg.</p>
        
        <?php else:?>
            <?php $user=$users[0];?>
            <!-- test si la place n'a pas encore été scanné -->
            <?php if($user['entree']==0): ?>
                <p class='message'><?php echo $user['prenom'].' '.$user['nom']; ?></p>
                <form action="scan.php" method='post' class='form login'>
                    <input type="hidden" name="id" value=<?php echo $id; ?> >
                    <div class="form__field">
                        <input type="submit" value='SCAN' class='scan-button' style='padding:1rem;' ></input>
                    </div>
                </form>
            <?php else:?>
                <p class='message'>La place a déjà été scanné.</p>
            <?php endif;?>
        <?php endif;?>
    </div>
</body>
</html>