<?php
//config SQL
$DBhost  = "localhost";
$DBowner = "root";
$DBpw    = $_ENV["db_password"];
// $DBpw    = "root";
$DBName  = "musee";

$DBconnect = "mysql:port=3306;dbname=".$DBName.";host=".$DBhost;


$pdo = new PDO('mysql:'.$DBhost.';port=3306;dbname='.$DBName.'', $DBowner, $DBpw,array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8, NAMES utf8",
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES   => false,
));
// $pdo->exec("SET CHARACTER SET utf8, NAMES utf8");

$sqlQuery = 'SELECT * FROM girafe';
$girafeStatement = $pdo->prepare($sqlQuery);
$girafeStatement->execute();
$girafes = $girafeStatement->fetchAll();
$_SESSION['girafe']=$girafes;

$sqlQuery = 'SELECT * FROM last_girafe';
$last_girafeStatement = $pdo->prepare($sqlQuery);
$last_girafeStatement->execute();
$last_girafes = $last_girafeStatement->fetchAll();
$_SESSION['last_girafe']=$last_girafes;

// $pdo = new PDO($DBconnect, $DBowner, $DBpw);
// $bdd = new PDO('mysql:host=localhost;dbname=adr;charset=utf8', 'root', 'Morangis91');

// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');
// $bdd = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');


?>
