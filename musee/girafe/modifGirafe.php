<?php 
session_start();
include '../gestion/database.php';
$_SESSION['checkModif']=true;//on a cliqué sur le bouton modif, on passe en mode modif

$girafes=$_SESSION['girafe'];
$user=$_SESSION['user'];
$lastGirafeUser=$_SESSION['lastGirafeUser'];


//on récupère les chasseurs de la girafe qui va être modifiée
$chasseurs=unserialize($lastGirafeUser['adr']);
$_SESSION['chasseursGirafeModif']=$chasseurs; // la liste des chausseurs
$_SESSION['nadrNombre']=$lastGirafeUser['nadr']; // le nombre de non adr
$nbChasseurs=count($chasseurs)+$lastGirafeUser['nadr'];
$prix=strval($lastGirafeUser['prix']).'€';

// on modifie la db girafe des chasseurs
foreach($chasseurs as $chasseur){
    foreach($girafes as $girafe){
        if($girafe['login']==$chasseur){
            if($girafe['nb_girafe_soiree']==$girafe['record_soiree'] and $girafe['biere_soiree']== $girafe['record_biere_soiree']){ // si on a battu le record de girafe et de bière en une soiree
                $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, record_soiree= :record_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,record_biere_soiree=:record_biere_soiree,id_last_girafe=:id_last_girafe WHERE login = :login';
                $insertGirafe=$pdo->prepare($sqlQuery);
                $insertGirafe->execute([
                    'nb_girafe'=>$girafe['nb_girafe']-1,
                    'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']-1,
                    'record_soiree'=>$girafe['record_soiree']-1,
                    'balance'=>$girafe['balance']-$_SESSION['price'][$prix][$nbChasseurs],
                    'total'=>$girafe['total']-$_SESSION['price'][$prix][$nbChasseurs],
                    'login'=>$girafe['login'],
                    'biere_total'=>$girafe['biere_total']-$_SESSION['litre'][$nbChasseurs],
                    'biere_soiree'=>$girafe['biere_soiree']-$_SESSION['litre'][$nbChasseurs],
                    'record_biere_soiree'=>$girafe['biere_soiree']-$_SESSION['litre'][$nbChasseurs],
                    'id_last_girafe'=>-1,// indique que le chasseur a une girafe en cours de modification
                 ]) or die(print_r($pdo->errorInfo()));
            }
            elseif($girafe['nb_girafe_soiree']==$girafe['record_soiree'] and !$girafe['biere_soiree']== $girafe['record_biere_soiree']){
                $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, record_soiree= :record_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree, id_last_girafe=:id_last_girafe WHERE login = :login';
                $insertGirafe=$pdo->prepare($sqlQuery);
                $insertGirafe->execute([
                    'nb_girafe'=>$girafe['nb_girafe']-1,
                    'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']-1,
                    'record_soiree'=>$girafe['record_soiree']-1,
                    'balance'=>$girafe['balance']-$_SESSION['price'][$prix][$nbChasseurs],
                    'total'=>$girafe['total']-$_SESSION['price'][$prix][$nbChasseurs],
                    'login'=>$girafe['login'],
                    'biere_total'=>$girafe['biere_total']-$_SESSION['litre'][$nbChasseurs],
                    'biere_soiree'=>$girafe['biere_soiree']-$_SESSION['litre'][$nbChasseurs],
                    'id_last_girafe'=>-1,
                 ]) or die(print_r($pdo->errorInfo()));
            }
            elseif(!$girafe['nb_girafe_soiree']==$girafe['record_soiree'] and $girafe['biere_soiree']== $girafe['record_biere_soiree']){
                $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,record_biere_soiree=:record_biere_soiree,id_last_girafe=:id_last_girafe WHERE login = :login';
                $insertGirafe=$pdo->prepare($sqlQuery);
                $insertGirafe->execute([
                    'nb_girafe'=>$girafe['nb_girafe']-1,
                    'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']-1,
                    'balance'=>$girafe['balance']-$_SESSION['price'][$prix][$nbChasseurs],
                    'total'=>$girafe['total']-$_SESSION['price'][$prix][$nbChasseurs],
                    'login'=>$girafe['login'],
                    'biere_total'=>$girafe['biere_total']-$_SESSION['litre'][$nbChasseurs],
                    'biere_soiree'=>$girafe['biere_soiree']-$_SESSION['litre'][$nbChasseurs],
                    'record_biere_soiree'=>$girafe['biere_soiree']-$_SESSION['litre'][$nbChasseurs],
                    'id_last_girafe'=>-1,
                 ]) or die(print_r($pdo->errorInfo()));
            }
            else{
                $sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,id_last_girafe=:id_last_girafe WHERE login = :login';
                $insertGirafe=$pdo->prepare($sqlQuery);
                $insertGirafe->execute([
                    'nb_girafe'=>$girafe['nb_girafe']-1,
                    'nb_girafe_soiree'=>$girafe['nb_girafe_soiree']-1,
                    'balance'=>$girafe['balance']-$_SESSION['price'][$prix][$nbChasseurs],
                    'total'=>$girafe['total']-$_SESSION['price'][$prix][$nbChasseurs],
                    'login'=>$girafe['login'],
                    'biere_total'=>$girafe['biere_total']-$_SESSION['litre'][$nbChasseurs],
                    'biere_soiree'=>$girafe['biere_soiree']-$_SESSION['litre'][$nbChasseurs],
                    'id_last_girafe'=>-1,
                ]) or die(print_r($pdo->errorInfo()));
            }
        }
    }

}
$sqlQuery = 'DELETE FROM last_girafe WHERE id_girafe=:id_girafe';
$lastGirafeStatement = $pdo->prepare($sqlQuery);
$lastGirafeStatement->execute([
    'id_girafe'=>$lastGirafeUser['id_girafe'],
]);

include '../gestion/database.php';

?>
<meta http-equiv="Refresh" content="0;url=../girafe/index.php" /> 
