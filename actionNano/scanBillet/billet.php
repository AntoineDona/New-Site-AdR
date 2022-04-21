<?php
session_start();
include('../database.php');
if(!isset($_COOKIE['is_connected']) or !isset($_GET['id']) or (isset($_COOKIE['is_connected']) and !$_COOKIE['is_connected'])){
    header('Location: /actionNano/scanBillet/index.php');
    setcookie(
        'is_connected',
        false,
        time()+24*3600
    );
}

function decodeId($id){
    $tabL=array(
        '7I'=>'0',
        '2X'=>'1',
        '7A'=>'2',
        'ZB'=>'3',
        'JI'=>'4',
        'K0'=>'5',
        'H3'=>'6',
        'GM'=>'7',
        'W6'=>'8',
        '12'=>'9',
    );
    $code='';
    for($i=0;$i<strlen($id);$i++){
        if($i%2==1){
            $key=$id[$i-1].$id[$i];
            $code=$code.$tabL[$key];
        }
    }
    return $code;
}

$id=intval(decodeId($_GET['id']));

//on récupère les données de la personne
$sqlQuery = 'SELECT * FROM '.$_COOKIE['nomNano'].' WHERE id=:id';
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
                        <!-- <input type="submit" value='SCAN' class='scan-button' ></input> -->
                        <button type="submit" name="scanButton" class="button-submit">SCAN</button>
                    </div>
                </form>
            <?php else:?>
                <p class='message'>La place a déjà été scanné.</p>
            <?php endif;?>
        <?php endif;?>
    </div>
</body>
</html>