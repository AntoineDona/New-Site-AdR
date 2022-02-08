<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
header( 'content-type: text/html; charset=utf-8' );
session_start();
include '../gestion/database.php';
$liste_nom=array();
$_SESSION['checkModif']=false;//on a cliqué sur le bouton envoyer, la modif est enregistré et on sort du mode modif
$_SESSION['nadrNombre']=0;

$girafes=$_SESSION['girafe'];
foreach ($_SESSION['girafe'] as $girafe) {
    $liste_login[]=$girafe['login'];
}

//test de verification si tout le formulaire a bien ete rempli
$test=false;
$liste_chasseur=array();
foreach($liste_login as $login){if(in_array($login,array_keys($_POST))){
    $test=true; //on a bien rentre au moins un AdR
    $liste_chasseur[]=$login;
}}
    

if(!$test){// pas d'AdR rentre
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
    $nbChasseurs=count($_POST)-2+$_POST['counter_nadr'];//on ne compte pas le $_POST['type_grf']


    // ajout de la girafe dans la db avec les adr, les non adr et la date  
    date_default_timezone_set('Europe/Paris');
    $date=date('d.m H:i');
    $sqlQuery='INSERT INTO last_girafe(prix,nadr,adr,date) VALUES (:prix,:nadr,:adr,:date)';
    $insertLast_girafe=$pdo->prepare($sqlQuery);
    $insertLast_girafe->execute([
        'prix'=>$_SESSION['price'][$prix][1],
        'nadr'=>$_POST['counter_nadr'],
        'adr'=>serialize($liste_chasseur),
        'date'=>$date,
    ]) or die(print_r($pdo->errorInfo()));
    
    // on met à jour la variable de session
    $sqlQuery = 'SELECT * FROM last_girafe';
    $last_girafeStatement = $pdo->prepare($sqlQuery);
    $last_girafeStatement->execute();
    $last_girafes = $last_girafeStatement->fetchAll();
    $_SESSION['last_girafe']=$last_girafes;

    //on passe à la modification de la db girafe avec une modification sur les bons adrs
    foreach($liste_chasseur as $chasseur){
        foreach($girafes as $girafe){//on cherche le chasseur pour modifier ses donnees
            if ($girafe['login']==$chasseur){
                if($girafe['nb_girafe_soiree']==$girafe['record_soiree'] and $girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs]>= $girafe['record_biere_soiree']){ // si on a battu le record de girafe et de bière en une soiree
                    $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, record_soiree= :record_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,record_biere_soiree=:record_biere_soiree,id_last_girafe=:id_last_girafe WHERE login = :login';
                    $insertGirafe=$pdo->prepare($sqlQuery);
                    $insertGirafe->execute([
                        'nb_girafe'=>$girafe['nb_girafe']+1,
                        'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']+1,
                        'record_soiree'=>$girafe['record_soiree']+1,
                        'balance'=>$girafe['balance']+$_SESSION['price'][$prix][$nbChasseurs],
                        'total'=>$girafe['total']+$_SESSION['price'][$prix][$nbChasseurs],
                        'login'=>$girafe['login'],
                        'biere_total'=>$girafe['biere_total']+$_SESSION['litre'][$nbChasseurs],
                        'biere_soiree'=>$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs],
                        'record_biere_soiree'=>$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs],
                        'id_last_girafe'=>end($last_girafes)['id_girafe'],
                     ]) or die(print_r($pdo->errorInfo()));
                }
                elseif($girafe['nb_girafe_soiree']==$girafe['record_soiree'] and !$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs]>= $girafe['record_biere_soiree']){
                    $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, record_soiree= :record_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree, id_last_girafe=:id_last_girafe WHERE login = :login';
                    $insertGirafe=$pdo->prepare($sqlQuery);
                    $insertGirafe->execute([
                        'nb_girafe'=>$girafe['nb_girafe']+1,
                        'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']+1,
                        'record_soiree'=>$girafe['record_soiree']+1,
                        'balance'=>$girafe['balance']+$_SESSION['price'][$prix][$nbChasseurs],
                        'total'=>$girafe['total']+$_SESSION['price'][$prix][$nbChasseurs],
                        'login'=>$girafe['login'],
                        'biere_total'=>$girafe['biere_total']+$_SESSION['litre'][$nbChasseurs],
                        'biere_soiree'=>$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs],
                        'id_last_girafe'=>end($last_girafes)['id_girafe'],
                     ]) or die(print_r($pdo->errorInfo()));
                }
                elseif(!$girafe['nb_girafe_soiree']==$girafe['record_soiree'] and $girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs]>= $girafe['record_biere_soiree']){
                    $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,record_biere_soiree=:record_biere_soiree,id_last_girafe=:id_last_girafe WHERE login = :login';
                    $insertGirafe=$pdo->prepare($sqlQuery);
                    $insertGirafe->execute([
                        'nb_girafe'=>$girafe['nb_girafe']+1,
                        'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']+1,
                        'balance'=>$girafe['balance']+$_SESSION['price'][$prix][$nbChasseurs],
                        'total'=>$girafe['total']+$_SESSION['price'][$prix][$nbChasseurs],
                        'login'=>$girafe['login'],
                        'biere_total'=>$girafe['biere_total']+$_SESSION['litre'][$nbChasseurs],
                        'biere_soiree'=>$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs],
                        'record_biere_soiree'=>$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs],
                        'id_last_girafe'=>end($last_girafes)['id_girafe'],
                     ]) or die(print_r($pdo->errorInfo()));
                }
                else{
                    $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,id_last_girafe=:id_last_girafe WHERE login = :login';
                    $insertGirafe=$pdo->prepare($sqlQuery);
                    $insertGirafe->execute([
                        'nb_girafe'=>$girafe['nb_girafe']+1,
                        'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']+1,
                        'balance'=>$girafe['balance']+$_SESSION['price'][$prix][$nbChasseurs],
                        'total'=>$girafe['total']+$_SESSION['price'][$prix][$nbChasseurs],
                        'login'=>$girafe['login'],
                        'biere_total'=>$girafe['biere_total']+$_SESSION['litre'][$nbChasseurs],
                        'biere_soiree'=>$girafe['biere_soiree']+$_SESSION['litre'][$nbChasseurs],
                        'id_last_girafe'=>end($last_girafes)['id_girafe'],
                    ]) or die(print_r($pdo->errorInfo()));
                }
                }

        
    }



}


?>
<meta http-equiv="Refresh" content="0;url=../girafe/mes_girafes.php" /> 
<?php
}
?>
