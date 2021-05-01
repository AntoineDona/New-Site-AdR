<?php include("database.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="app.js"></script>
    <title>Document</title>
</head>

<body>
    <form method="POST" action="validation_menu_adr.php" class="form_menu">

        <?php

        // On récupère tout le contenu de la table
        /*
On prend dans l'ordre des catégories: SELECT * FROM categories_menu ORDER BY order
On parcourt les articles du menu de cette catégorie: SELECT * FROm menu WHERE type_id=$id


*/

        $categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
        while ($categorie = $categories->fetch()) {
            if ($categorie['id'] != 1) //si id!=1 il y a des articles, on affiche la catégorie
            {
                echo '<h3> ' . $categorie["categorie"] . ': </h3>';
            }

            $articles_correspondant = $bdd->prepare('SELECT * FROM menu where type_id = ? ORDER BY article');
            $articles_correspondant->execute(array($categorie["id"]));

            if ($categorie['id'] == 2) {
                while ($donnees = $articles_correspondant->fetch()) //on affiche les cases à cocher 
                {
        ?>
                    <input value="checked" type="checkbox" class="article" name=<?php echo $donnees["id"]; ?> id=<?php echo $donnees["type_id"]; ?> <?php if ($donnees['stock'] == 'oui') {
                                                                                                                                                        echo "checked=\"checked\"";
                                                                                                                                                    } ?>>
                    <label for="article"><?php echo $donnees["article"] . ' ;  Sold out?'; ?></label>
                    <input value="checked" type="checkbox" class="article" name=<?php echo 'soldout' . $donnees["id"] //case de soldout
                                                                                ?> <?php if ($donnees['soldout'] == 'oui') {
                                                                                echo "checked=\"checked\"";
                                                                            } ?>>
                    <br>
                <?php
                }
            } else {
                while ($donnees = $articles_correspondant->fetch()) //on affiche les cases à cocher
                {
                ?>
                    <input value="checked" type="checkbox" class="article" name=<?php echo $donnees["id"];?> id=<?php echo $donnees["type_id"];?> <?php if ($donnees['stock'] == 'oui') {
                                                                                                                    echo "checked=\"checked\"";
                                                                                                                } /*Si déjà cochée, on affiche qu'elle est déjà cochée */ ?>>
                    <label for="article"><?php echo $donnees["article"]; ?></label>
                    <br>
        <?php
                }
            }
            echo '<br>';
        }
        ?>

        <?php /*
$reponse = $bdd->query('SELECT * FROM menu');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

<input value="checked" type="checkbox" class="article" name=<?php echo $donnees["id"]?> <?php if ($donnees['stock']=='oui'){echo "checked=\"checked\"";}?>>
<label for="article"><?php echo $donnees["article"];?></label>
<br>


<?php
} */
        ?>
        <input style="background-color:grey" class="btn btn-secondary" type="submit" name="Valider">


    </form>
</body>

</html>