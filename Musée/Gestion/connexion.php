<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../included/meta.php" ?>
        <title>Connexion</title>
</head>

<body>
    <?php include "../included/header.php" ?>
    <main>
        <section class="hero connexion">
            <div class="login-box">
                <form action="action.php" method="post">
                    <h3>Connexion</h3>
                    <p>(Espace réservé gestionnaires du Musée)</p>
                    <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Nom d'utilisateur">
                    </div>

                    <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Mot de passe">
                    </div>
                    <?php if ($_SESSION['incorrect']) {
                        echo '<div class="incorrect">Nom d\'utilisateur ou mot de passe incorrect</div>';
                    }
                    ?>
                    <div id="oubli">

                        <a href="https://api.whatsapp.com/send?phone=+33607764074" target="_blank">mot de passe oublié?</a>
                    </div>
                    <input type="submit" class="btn" value="Se Connecter">
                </form>
            </div>
        </section>
    </main>
    <?php include "../included/footer.php" ?>
</body>

</html>