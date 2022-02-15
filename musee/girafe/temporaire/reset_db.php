<!-- 
faire attentoin a ce fichier, il réanitialise toutes les données, à éviter

<?php
session_start();
$girafes=$_SESSION['girafe'];
include '../../gestion/database.php';

//réinitialiser la database    
foreach($girafes as $girafe){
$sqlQuery='UPDATE girafe SET nb_girafe = :nb_girafe, nb_girafe_soiree = :nb_girafe_soiree, record_soiree= :record_soiree, balance = :balance, total=:total,biere_total=:biere_total,biere_soiree=:biere_soiree,record_biere_soiree=:record_biere_soiree, id_last_girafe=:id_last_girafe WHERE login = :login';
$insertGirafe=$pdo->prepare($sqlQuery);
$insertGirafe->execute([
    'nb_girafe'=>0,
    'nb_girafe_soiree'=>0,
    'record_soiree'=>0,
    'balance'=>0,
    'total'=>0,
    'login'=>$girafe['login'],
    'biere_total'=>0,
    'biere_soiree'=>0,
    'record_biere_soiree'=>0,
    'id_last_girafe'=>0,
    ]) or die(print_r($pdo->errorInfo()));}
?>
    <meta http-equiv="Refresh" content="0;url=../../girafe/index.php" /> 
 -->
