<?php
//config SQL
// $DBhost  = "localhost";
// $DBowner = "root";
// $DBpw    = $_ENV["db_password"];
// $DBName  = "adr";
// $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;

// $pdo = new PDO($DBconnect, $DBowner, $DBpw);
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');

?>
