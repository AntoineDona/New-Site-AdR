<?php
session_start();

    if (!(isset($_SESSION['is_connected'])and$_SESSION['is_connected'])){ // si on est pas connecté et qu'on essaie d'accéder qd même
        ?>
            <meta http-equiv="Refresh" content="0;url=connexion.php" /> <!-- on se fait rediriger  vers la page de connexion-->
        <?php
    }   
?>
<!-- Page à inclure dans menu, non traite, en cours et traitée, PAS DANS CONNEXION. Seulement dans les pages qu'on veut protéger-->