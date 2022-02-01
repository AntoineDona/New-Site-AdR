<?php
session_start();
$liste_nom=array();
foreach ($_SESSION['girafe'] as $girafe) {
    $liste_nom[]=$girafe['prénom'];
}

#test de vérification si tout le formulaire a bien été rempli
$test=false;
$liste_chasseur=array();
foreach($liste_nom as $prenom){if(in_array($prenom,array_keys($_POST))){
    $test=true;
    $liste_chasseur[]=$prenom;
}}
    

if(!$test){
    $_SESSION['incorrect_grf']=true;
    $_SESSION['message']='Veillez rajouter un AdR.';
    ?>
    <meta http-equiv="Refresh" content="0;url=../girafe/index.php" /> 

<?php 
}
elseif(!$test and $_POST['counter_nadr']){
    $_SESSION['incorrect_grf']=true;
    $_SESSION['message']='Veillez rajouter un AdR.';
    ?>
    <meta http-equiv="Refresh" content="0;url=../girafe/index.php" /> 

<?php 
}
else{
    $_SESSION['incorrect_grf']=false;
    include '../gestion/database.php';
    $prix=$_POST['type-grf'];
    $nbChasseurs=count($_POST)-1;
    $prix_pp=floatval(substr(strval(floatval($prix)/$nbChasseurs),0,4)); 
    $litre_pp=floatval(substr(strval(3/$nbChasseurs),0,4));
    foreach($liste_chasseur as $chasseur){
        $sqlQuery='';
        $insertGirafe=$pdo->prepare($sqlQuery);
        $insertGirafe=execute()
    }


    ?>
    <meta http-equiv="Refresh" content="0;url=../girafe/mes_girafes.php" /> 
    <?php

}



?>

