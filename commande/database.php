<?php
//config SQL
$DBhost  = "localhost";
$DBowner = "root";
$DBpw    = "Morangis91";
$DBName  = "adr";

$DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;

// $pdo = new PDO($DBconnect, $DBowner, $DBpw);
// $bdd = new PDO('mysql:host=localhost;dbname=adr;charset=utf8', 'root', 'Morangis91');

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');

?>
