<?php 
session_start();
include '../gestion/database.php';

$sqlQuery = 'UPDATE girafe SET balance=:balance WHERE login = :login';
$balanceStatement = $pdo->prepare($sqlQuery);
$balanceStatement->execute([
    'balance'=>0,
    'login'=>$_SESSION['username']
]);
include '../gestion/database.php';

?>
<meta http-equiv="Refresh" content="0;url=../girafe/mes_girafes.php" /> 
