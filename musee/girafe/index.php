<?php 
session_start();
$page='ajout girafe';
$girafes=$_SESSION['girafe'];
if(!isset($_SESSION['is_connected'])){
    header('Location:/musee/connexion.php');
}
elseif(isset($_SESSION['is_connected']) and !$_SESSION['is_connected']){
    header('Location:/musee/connexion.php');
}
include '../gestion/database.php';
include '../included/meta.php';

// définition des prix en fonction de la girafe et du nombre de chasseur
$price=array(
    '17'=>array(0),
    '22'=>array(0)
);
for($i=1;$i<15;$i++){
    $price['17€'][$i]=floatval(substr(strval(17/$i),0,4));
    $price['22€'][$i]=floatval(substr(strval(22/$i),0,4));
}
// définition des litres de bières du nombre de chasseur
$litre=array(0);
for($i=1;$i<15;$i++){
    $litre[$i]=floatval(substr(strval(3/$i),0,4));
}
$_SESSION['price']=$price;
$_SESSION['litre']=$litre;

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style_girafe.css">
    <title>Ajouter une girafe</title>
</head>
<body>
    <?php include 'header.php';?> 
    <div class ="recentrer" >
    <form method="post" action="gestion_ajout_girafe.php" >
        <h1 style='font-size:3em;'>Choisis les caractéristiques de la girafe</h1>
        <!-- bouton de nombre de chasseur -->
        <p >Nombre de personne non AdR : <br/></p>
            <input type="number" name="counter_nadr" required="required" value=<?php echo $_SESSION['nadrNombre'] ?> min='0' id='button-nadr' >
        <p>
            Sélectionnez les chasseurs :<br /></p>
            <!-- autre facon de le faire : https://developer.mozilla.org/fr/docs/Web/HTML/Attributes/multiple -->
            <div id='check-div'><?php
            foreach($girafes as $girafe){
                if($girafe['login']==$_SESSION['username']){
                    $user=$girafe;
                }
            }
            function checked($checkmodif,$login,$usr){
                if(isset($_SESSION['chasseursGirafeModif'])){
                    if($checkmodif and in_array($login,$_SESSION['chasseursGirafeModif']) and $usr['id_last_girafe']==-1){
                        return 'checked';
                    }
                }
            }
            foreach($girafes as $girafe){
                echo '<div class="check-label-div"><input type="checkbox" name="'.$girafe['login'].'" id="'.$girafe['login'].'" class="check-with-label" '.checked($_SESSION['checkModif'],$girafe['login'],$user).' /> <label for="'.$girafe['prenom'].'" class="label-for-check" >'.$girafe['prenom'].'</label><br /></div>';
            }
            ?>
        </div>
        <p>Ne pas dépasser <strong>10 chasseurs</strong></p>  
        <label for="type-grf" style="font-size:2rem">Quelle est votre girafe ?</label>
        <input type="text" multiple name="type-grf" id="type-grf" list="2-types-grf" required size="64">

        <datalist id="2-types-grf">
        <option value="17€">Girafe de kro</option>
        <option value="22€">Girafe haut de gamme</option>
        </datalist>

        </br><input type="submit" value="Partager la girafe">
    </form>
    <!-- <form action="temporaire/reset_db.php"><input type="submit" value="reset"></form> -->
    <?php 
    if(isset($_SESSION['incorrect_grf']) and $_SESSION['incorrect_grf']){
        echo '<p style="color:red">'.$_SESSION['message'].'</p>';
    }
    ?>
    </div>
    
    
</body>
</html>