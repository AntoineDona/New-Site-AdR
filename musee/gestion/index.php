

<?php
session_start();


include 'database.php'; 


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
    $_SESSION['username']=$_POST['username'];
    $_SESSION['nadrNombre']=0;
    $_SESSION['checkModif']=false;//lorsque l'on vient de connecter, on défini la variable de session pour les modif de girafes
    
    if (check_user($girafes,$_POST['username']) and $_POST['password'] == "girafekiller") {
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