

<?php
session_start();
// $DBhost  = "localhost";
// $DBowner = "root";
// $DBpw    = "";
// $DBName  = "adr";
// $DBconnect = "mysql:dbname=".$DBName.";host=".$DBhost;


// try
// {
//     $pdo = new PDO($DBconnect, $DBowner, $DBpw);
// 	// $db = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'root', 'root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// }
// catch (Exception $e)
// {
//         die('Erreur : ' . $e->getMessage());
// }

include 'database.php'; 

$sqlQuery = 'SELECT * FROM girafe';
$girafeStatement = $pdo->prepare($sqlQuery);
$girafeStatement->execute();
$girafes = $girafeStatement->fetchAll();

$_SESSION['girafe']=$girafes;
function check_user($girfs,$username){
    $test=false;
    foreach ($girfs as $girf){
        if($username==$girf['login']){
            $test=true;
        }
    }
    return $test;
}


if (isset($_POST["username"]) and isset($_POST['password'])) //si on a bien submit, cad on vient de la page de connexion
{
    // if ($_POST["username"] == "do" and $_POST['password'] == "raven") {
    //     $_SESSION['is_connected'] = True;
    //     $_SESSION['incorrect'] = False;
    if (check_user($girafes,$_POST['username']) and $_POST['password'] == "p") {
        $_SESSION['is_connected'] = True;
        $_SESSION['incorrect'] = False;
?>
        <meta http-equiv="Refresh" content="0;url=../girafe/index.php" />
    <?php
    } else {
        $_SESSION['incorrect'] = True;
        $_SESSION['is_connected'] = False;
    ?>
        <meta http-equiv="Refresh" content="0;url=../connexion.php" />
    <?php
    }
} else { // sinon on vient d'une autre page, on affiche pas mdp incorrect et on redirige vers la connexion
    $_SESSION['incorrect'] = False;
    if (isset($_SESSION['is_connected']) and $_SESSION['is_connected']) {
    ?>
        <meta http-equiv="Refresh" content="0;url=../girafe/index.php" />
    <?php
    } else {
    ?>
        <meta http-equiv="Refresh" content="0;url=../connexion.php" />
<?php
    }
}
?>