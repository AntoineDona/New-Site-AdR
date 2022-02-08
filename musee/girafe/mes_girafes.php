<?php 
$page='mes girafes';
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style_girafe.css">
    <title>Mes girafes</title>
</head>
<body >
    <div class="recentrer">
    <?php include '../gestion/database.php';
    $girafes=$_SESSION['girafe'];
    $last_girafes=$_SESSION['last_girafe'];
    foreach($girafes as $girafe){
        if($girafe['login']==$_SESSION['username']){
            $user=$girafe;
        }
    }
    if($user['id_last_girafe']==-1){

    }
    else{
    foreach($last_girafes as $last_girafe){
        if($user['id_last_girafe']==$last_girafe['id_girafe']){
            $lastGirafeUser=$last_girafe;
        }
    }
    
    $_SESSION['user']=$user;
    $_SESSION['lastGirafeUser']=$lastGirafeUser;
    $chasseurs=unserialize($lastGirafeUser['adr']);
    }
    function loginToName($login,$grfs){
        $bool=true;
        $i=0;
        while($bool){
            if($grfs[$i]['login']==$login){
                $bool=false;
                return $grfs[$i]['prenom'];
            }
            $i++;
        }

    }
    ?>
    
    <h1>Dernières girafes</h1>
    <?php if($user['id_last_girafe']==0):?>
        <p>Tu n'as pas chassé de girafe ce soir.</p>
    <?php elseif($user['id_last_girafe']==-1):?>
    <p>Attention! Tu as modifié une girafe et tu n'as pas enregistré. Si personne est entrain de la modifier, réenregistre la.</p>
    <?php else :?>
    <p>Ta dernière girafe était le <?php echo $lastGirafeUser['date']; ?></br>
        Tu as chassé avec : 
        <?php foreach($chasseurs as $chasseur){
            echo loginToName($chasseur,$girafes) ?>, 
        <?php } echo $lastGirafeUser['nadr'] ?> non adr.</br>
        C'était une girafe 
        <?php if($lastGirafeUser['prix']==17) :?> de Kro à 17€
        <?php else:?> haut de gamme à 22€
        <?php endif;?></br>
        <?php if($lastGirafeUser['nadr']>0):?>
        N'oublies pas de faire payer 
        <?php echo $_SESSION['price'][strval($lastGirafeUser['prix'].'€')][$lastGirafeUser['nadr']+count($chasseurs)] ?>€ aux non adr!</br>
        <?php endif;?> 
    </p>

    <form action="modifGirafe.php">
        <input type="submit" value='modifier la girafe'>
    </form>
    <?php endif;?>

    <h1>A payer au musée</h1>
    <p>Tu dois au musée : <?php echo $user['balance']; ?> €</p>
    <script>
        function show_alert() {
            alert("Es-tu sûr que tu a payé ta note?");
        }
    </script>
    <form action="resetBalance.php" method='post' onSubmit="return confirm('Es-tu sûr de reset ta note?') " >
        <input type="submit" value="J'ai payé ma note">
    </form>

    </div>


    
</body>
</html>