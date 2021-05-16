<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Validation de commande traitée</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style_com.css">
    <link rel="stylesheet" type="text/css" title="mobile" href="../mobile.css" /> -->
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="stylesheet" href="style_nav.css">
    <meta http-equiv="refresh" content="1.5;url=en_cours.php" />
    <!--on redirige au bout de 3 secondes vers les commandes non traitées -->
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style3.css">
</head>

<body>

    <div class="header" style="margin-bottom:2rem;">
        <a href="traite.php" role="button" class="btn btn-light btn-lg btn-block" style=" margin-top: .5rem;margin-left:1rem;margin-right:1rem;">Commandes traitées</a>
        <a href="en_cours.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Commandes en cours</a>
        <a href="non_traite.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Commandes non-traitées</a>
        <a href="menu_adr.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Mise à jour menu</a>
    </div>

    <?php
    $id = $_GET["id"];

    $req = $bdd->prepare('UPDATE commande SET traite=\'oui\' WHERE id = :id');
    $req->execute(array(
        'id' => $id
    ));

    ?>



    <div class="jumbotron text-center" style="margin-top:2rem;background-color:white;font-size:2rem;width:90%;margin-left:auto;margin-right:auto;">
        <i style="color:#2FAF2C;position:relative;top:1rem;margin-bottom:1rem;" class="fas fa-check-circle fa-3x"></i>
        <p>
            La commande a bien été placée dans la catégorie "Commande traitée".
        </p>
    </div>







    <div id="contact" class="offset">

        <?php include("footer.php"); ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <body>

</html>