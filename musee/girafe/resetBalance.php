<?php 
session_start();
include '../gestion/database.php';


date_default_timezone_set('Europe/Paris');
$date=date('d.m');

$sqlQuery = 'UPDATE girafe SET balance=:balance,dateLastPayment=:dateLastPayment WHERE login = :login';
$balanceStatement = $pdo->prepare($sqlQuery);
$balanceStatement->execute([
    'balance'=>0,
    'login'=>$_SESSION['username'],
    'dateLastPayment'=>$date
]);
include '../gestion/database.php';

?>
<meta http-equiv="Refresh" content="0;url=../girafe/mes_girafes.php" /> 
