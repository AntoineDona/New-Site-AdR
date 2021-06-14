<?php
//config SQL
$DBhost  = "localhost";
$DBowner = "root";
$DBpw    = "Morangis91";
$DBName  = "adr";
$DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;
$pdo = new PDO($DBconnect, $DBowner, $DBpw);
?>
