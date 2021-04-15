<?php include("../included/database.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Validation de changement de menu</title>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="style_com.css">
  <link rel="stylesheet" type="text/css" title="mobile" href="../mobile.css" /> -->
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style3.css">
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <!-- <meta http-equiv="refresh" content="1.5;url=menu_adr.php" /> -->
    <!--on redirige au bout de 3 secondes vers le menu-->
</head>

<body>

    <?php
    $reponse = $bdd->query('SELECT * FROM menu');

    while ($donnees = $reponse->fetch()) {
        if (isset($_POST['soldout' . $donnees["id"]])) { /* on parcoure les cases cochées du soldout */
            $req = $bdd->prepare('UPDATE menu SET soldout=\'oui\' WHERE id=:id');
            $req->execute(array(
                'id' => $donnees['id'],
            ));
        } else {
            $req = $bdd->prepare('UPDATE menu SET soldout=\'non\' WHERE id=:id');
            $req->execute(array(
                'id' => $donnees['id'],
            ));
        }

        if (isset($_POST[$donnees["id"]])) { /* on parcoure les cases cochées */
            $req = $bdd->prepare('UPDATE menu SET stock=\'oui\' WHERE id=:id');
            $req->execute(array(
                'id' => $donnees['id'],
            ));
        } else { /* reste les cases pas cochées, on dit que stock='non' et soldout='non' Quand on affiche la page de commande, il ne seront pas affiché */
            $req = $bdd->prepare('UPDATE menu SET stock=\'non\' WHERE id=:id');
            $req->execute(array(
                'id' => $donnees['id'],
            ));
        }
        // Si on est sur dessert du jour et qu'on l'a modifié, ie on a cliqué sur le bouton
        if (($donnees["article"] == "Dessert du jour") and isset($_POST['modif_dessert'])) {
            $req = $bdd->prepare('UPDATE menu SET infos=:infos WHERE id=:id');
            $req->execute(array(
                'id' => $donnees['id'],
                'infos' => $_POST['dessert'],
            ));
        }
    }
    ?>


    <div class="header" style="margin-bottom:2rem;">
        <a href="traite.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-top:0.5rem;">Commandes traitées</a>
        <a href="non_traite.php" role="button" class="btn btn-light btn-lg btn-block">Commandes non-traitées</a>
        <a href="menu.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-top:0.5rem;">Mise à jour menu</a>
    </div>

    <div style="background-color:white;" class="jumbotron text-center">
        <div class="narrow">

            <i style="color:#2FAF2C;position:relative;top:1rem;" class="fas fa-check-circle fa-6x"></i>
            <h3 style="margin-top:2rem;">
                Le menu a bien été actualisé.
            </h3>

        </div>
    </div>

    <div id="contact" class="offset">

        <?php include("footer.php"); ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>