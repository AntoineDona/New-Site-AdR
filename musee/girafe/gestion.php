<?php
session_start();
$nbChasseurs=count($_POST);
$liste_nom=array();
foreach ($_SESSION['girafe'] as $girafe) {
    $liste_nom[]=$girafe['prénom'];
}

#test de vérification si tout le formulaire a bien été rempli
$test=false;
foreach($liste_nom as $prenom) {
    if(in_array($prenom,array_keys($_POST)){
        $test=true;
    }
}
if(!($test and isset($_POST['type_grf']))){
    $_SESSION['incorrect_grf']=true;
    $_SESSION['add_grf']=false;
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



?>

