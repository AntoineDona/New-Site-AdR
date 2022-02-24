<?php 
$page='mes girafes';
session_start();
if(!isset($_SESSION['is_connected'])){
    header('Location:/musee/connexion.php');
}
elseif(isset($_SESSION['is_connected']) and !$_SESSION['is_connected']){
    header('Location:/musee/connexion.php');
}
include 'header.php';
include '../included/meta.php';
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
    
    
    ?>
    
    <h1>Dernières girafes</h1>
    <?php if($user['id_last_girafe']==0)://pas de girafe de la journée?>
        
        <p>Tu n'as pas chassé de girafe ce soir.</p>
    <?php elseif($user['id_last_girafe']==-1)://girafe modifiée?>
        
        <p>Attention! Quelqu'un a modifié une girafe et ne l'a pas enregistré. Si personne est entrain de la modifier, réenregistres la.</p>
    <?php elseif($user['id_last_girafe']==-2)://était dans une girafe modifiée et a été enlevé?>
        <p>Tu étais dans une girafe, mais tu a été enlevé...</p>
    <?php else :?>
        <?php 
        foreach($last_girafes as $last_girafe){
            if($user['id_last_girafe']==$last_girafe['id_girafe']){
                $lastGirafeUser=$last_girafe;
            }
        }
        
        $_SESSION['user']=$user;
        $_SESSION['lastGirafeUser']=$lastGirafeUser;
        $chasseurs=unserialize($lastGirafeUser['adr']);
        
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
    
        }?>
    <p>Ta dernière girafe était à <?php echo $lastGirafeUser['date']; ?></br>
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
    <p style='margin-bottom:2em'>La dernière fois que tu as payé ta note est le : <?php echo $user['dateLastPayment']?></p>
    <?php if($_SESSION['username']=='2021goulletba'){
        echo '<a href="temporaire/ajoutAdr.php" style="
        font-size:1rem;
        text-decoration:none;
        border-radius: 10px;
        background-color:#506AD4;
        color:#FFFCE6;
        border:#506AD4;
        padding: 8px 12px;
        ">Ajouter AdR</a>
        ';
    } ?>

    
    </div>



    
</body>
</html>