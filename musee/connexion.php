<?php $page = 'connexion' ?>
<?php
session_start();

//si on arrive pour la première fois sur la page sans être connecté -> tout se passe noraml
//si on va sur lapage alors qu'on est déjà connecté, on redirige vers menu.php
//PAS BESOIN DE REDIRIGER VERS INDEX AUTOMATIQUEMENT, SINON BOUCLE

if (isset($_SESSION['is_connected']) and $_SESSION['is_connected']) {
    ?>
        <meta http-equiv="Refresh" content="0;url=girafe/index.php" />
    <?php
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <?php include "included/meta.php" ?>
    <title>Connexion</title>
</head>

<body>
    <?php include "included/header.php" ?>
    <main>
        <section class="hero connexion">
            <div class="login-box">
                <form action="gestion/index.php" method="post">
                    <h3>Connexion</h3>
                    <p>Espace réservé aux gestionnaires</p>
                    <div class="textbox" style="z-index: 100;">
                        <!-- <i class="fas fa-user"></i> -->
                        <input type="text" name="username" placeholder="&#xF007; Nom d'utilisateur" style="font-family:Arial, FontAwesome">
                    </div>

                    <div class="textbox" style="z-index: 100;">
                        <!-- <i class="fas fa-lock"></i> -->
                        <input type="password" name="password" placeholder="&#xF023; Mot de passe" style="font-family:Arial, FontAwesome">
                    </div>
                    <div id="oubli" style="z-index: 100;">
                        <a href="https://api.whatsapp.com/send?phone=+33607764074" target="_blank">mot de passe oublié?</a>
                    </div>
                    <?php if (isset($_SESSION['incorrect']) and $_SESSION['incorrect']) {
                        echo '<div class="incorrect" style="z-index: 100;">Nom d\'utilisateur ou mot de passe incorrect</div>';
                    }
                    ?>
                    <input type="submit" class="btn" value="Se Connecter">
                </form>
            </div>
        </section>
    </main>
    <?php include "included/footer.php" ?>
</body>

</html>