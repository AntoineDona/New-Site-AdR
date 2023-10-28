<?php
require ('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
//config SQL
$DBhost  = "localhost";
$DBowner = "root";
$DBpw    = $_ENV["db_password"];
$DBName  = "adr";
$DBconnect = "mysql:dbname=" . $DBName . ";host=" . $DBhost;

$pdo = new PDO($DBconnect, $DBowner, $DBpw);
// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root');

$reponse = $pdo->query("SELECT * from cotisants");

while ($donnees = $reponse->fetch()) {  
        $promo = substr($donnees['Login'], 0, 4) + 3;
        // echo $donnees['Login'];
        echo $donnees["Login"] . " => ". $promo . "<br>";
        $req = $pdo->prepare('UPDATE cotisants SET promo = :promo WHERE Login = :login');
        $req->execute(array(
            'promo' => $promo,
            'login' => $donnees["Login"]
        ));
}


// $reponse_2 = $pdo->query("SELECT * FROM `cotisants_p2022` as a RIGHT JOIN `cotisants_p2022_p2023` as b ON a.email = b.email ORDER BY a.promo ");

// while ($donnees = $reponse_2->fetch()) {
//     $req = $pdo->prepare('UPDATE cotisants_p2022_p2023 SET promo = 2022 WHERE NOM = :nom');
//         $req->execute(array(
//             'nom' => $donnees["NOM"]
//         ));
//     if ($donnees["a.promo"] == NULL && $donnees["b.email"] != "" && $donnees["a.email"] != ""){
//         echo "zizi";
//         $req = $pdo->prepare('UPDATE cotisants_p2022_p2023 SET promo = 2023 WHERE NOM = :nom');
//         $req->execute(array(
//             'nom' => $donnees["NOM"]
//         ));
//     }
// }