<?php
//config SQL
$DBhost  = "localhost";
$DBowner = "root";
$DBpw    = "root";
// $DBpw    = $_ENV["db_password"];
$DBName  = "adr";

$DBconnect = "mysql:port=3306;dbname=".$DBName.";host=".$DBhost;


$pdo = new PDO('mysql:localhost;port=3306;dbname=adr', 'root', 'root', [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES   => false
]);
// $pdo = new PDO($DBconnect, $DBowner, $DBpw);
// $bdd = new PDO('mysql:host=localhost;dbname=adr;charset=utf8', 'root', 'Morangis91');

// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');
// $bdd = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');


?>
