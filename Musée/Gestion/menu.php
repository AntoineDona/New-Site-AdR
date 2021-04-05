<?php include "secure.php" ?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Menu</title>
</head>
<body>
    <?php include "header_gestion.php"?>
    <main>
        <!-- 
        on affiche tout le menu à chaque fois, mais avec les cases en plus! attention à gérer les priorités

     -->
        <div class="carte">
            <form method="POST" action="validation_menu_adr.php" class="form_menu">
                <h1>Carte du jour</h1>
                <div class="reset">
                    <?php
                    $articles = $bdd->query('SELECT * FROM menu WHERE type_id=1');
                    while ($article = $articles->fetch()) {
                    ?>
                        <input value="checked" type="checkbox" class="reset_button" name=31 id="reset_button" <?php if ($article['stock'] == 'oui') {
                                                                                                                    echo "checked=\"checked\"";
                                                                                                                } ?>>
                        <label for="reset_button"> Décocher tout (Aucun article en vente) </label>
                </div>
                <div class="contenu">
                    <?php
                    }
                    // On récupère tout le contenu de la table menu
                    /* 
                On parcourt les catégories par ordre
                on compte le nombre d'articles correspondant
                Si le nombre est nul -> on ne echo pas le nom de la catégorie
                Si non nul -> on note le nom de la catégorie et on affiche tous les articles
                */

                    $categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
                    while ($categorie = $categories->fetch()) {
                        //Au moins un article de la catégorie: c'est toujours le cas ici!! On selectionne les articles de la catégorie :
                        $articles = $bdd->prepare('SELECT * FROM menu WHERE type_id=?');
                        $articles->execute(array($categorie["id"]));
                        if ($categorie['id'] != 1) //On saute le aucun, servira de boutton reset en haut. Si coché, modifier la page comande.php
                        {
                    ?>
                        <div class="categorie">
                            <!-- si on clique sur ce boutton, on appelle selectAll('categorie_1') qui sélectionne toutes les cases de la catégorie-->
                            <h3>
                                <input value="checked" type="checkbox" class="categorie_checkbox" name=<?php echo 'categorie_' . $categorie["id"]; ?> id=<?php echo 'categorie_' . $categorie["id"]; ?> onclick="selectAll('<?php echo 'categorie_' . $categorie['id']; ?>')">
                                <label for="categorie" class="categorie_label"><?php echo $categorie["categorie"]; ?></label>
                            </h3>
                            <ul>
                                <?php

                                if ($categorie['id'] == 2) { //si on est dans les plats du jour, option soldout accessible
                                    while ($article = $articles->fetch()) //on affiche les cases à cocher 
                                    {
                                ?>
                                        <li>
                                            <div class="article">
                                                <input value="checked" type="checkbox" class=<?php echo 'categorie_' . $article["type_id"]; ?> name=<?php echo $article["id"]; ?> id=<?php echo 'categorie_' . $article["type_id"]; ?> <?php if ($article['stock'] == 'oui') {
                                                                                                                                                                                                                                            echo "checked=\"checked\"";
                                                                                                                                                                                                                                        } ?> onclick="uncheckAll('<?php echo 'categorie_' . $article['type_id']; ?>')">
                                                <label for="article"><?php echo $article["article"]; ?></label>
                                                <br>
                                                <span class="ingredients">
                                                    <?php echo $article['infos']; ?>
                                                </span>
                                            </div>

                                            <div class="soldout_select">
                                                <input value="checked" type="checkbox" class="article" name=<?php echo 'soldout' . $article["id"]; ?> id=<?php echo 'categorie_' . $article["type_id"]; ?> <?php if ($article['soldout'] == 'oui') {
                                                                                                                                                                                                                echo "checked=\"checked\"";
                                                                                                                                                                                                            } ?>>
                                                <label class="soldout_label" for=<?php echo 'soldout' . $article["id"]; ?>>Sold out? </label>
                                            </div>
                                        </li>
                                        <br>
                                    <?php
                                    }
                                }
                                //Sinon on est dans les catégories normales, sans soldout
                                else {
                                    //dans ce cas on affiche simplement tous les articles 
                                    while ($article = $articles->fetch()) //on affiche les cases à cocher 
                                    {
                                    ?>
                                        <li>
                                            <div class="article">
                                                <input value="checked" type="checkbox" class=<?php echo 'categorie_' . $article["type_id"]; ?> name=<?php echo $article["id"]; ?> id=<?php echo $article["id"]; ?> <?php if ($article['stock'] == 'oui') {
                                                                                                                                                                                                                        echo "checked=\"checked\"";
                                                                                                                                                                                                                    } ?> onclick="uncheckAll('<?php echo 'categorie_' . $article['type_id']; ?>')">
                                                <label for="article"><?php echo $article["article"]; ?></label>
                                                <br>
                                                <span class="ingredients">
                                                    <?php echo $article['infos']; ?>
                                                </span>
                                            </div>
                                            <!-- <div class="price">
                                    <?php echo $article['prix'] . '€'; ?>
                                </div> -->
                                        </li>
                                        <br>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                <?php
                        }
                    }
                ?>
                </div>
                <input id="submit" class="btn_valider" type="submit" value="Valider">
            </form>
        </div>
        <script src="app.js"></script>

    </main>
</body>

</html>