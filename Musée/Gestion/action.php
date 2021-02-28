<?php
session_start();

if (isset($_POST["username"]) and isset($_POST['password'])) //si on a bien submit
{
    if (($_POST["username"] == "test" and $_POST['password'] == "test") or ($_POST["username"] == "do" and $_POST['password'] == "raven")) {
        $_SESSION['is_connected'] = True;
        $_SESSION['incorrect'] = False;
        ?>
        <meta http-equiv="Refresh" content="0;url=non_traite.php" />
        <?php
    } else {
        $_SESSION['incorrect'] = True;
        $_SESSION['is_connected'] = False;
        ?>
        <meta http-equiv="Refresh" content="0;url=connexion.php" />
        <?php
    }
} else { // sinon on vient d'une autre page, on affiche pas mdp incorrect
    $_SESSION['incorrect'] = False;
}

?>
