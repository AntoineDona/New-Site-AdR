<?php $page = 'commander' ?>
<?php include("included/database.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "included/meta.php" ?>
    <title>Commander au Musée</title>
</head>

<body>
    <?php include "included/header.php" ?>
    <main>
        <section class='hero commander'>
            <h1>Commander</h1>
        </section>
        <section class="smallapropos  ptitdej">
            <div class="cadre">
                <h2>Le Petit Dej livré chez toi!</h2>
                <div class="separateur"></div>
                <p>Cette semaine, le pôle Ptit Dej t'as préparé un petit déjeuné de folie!! <br>
            Au menu: Jus d'orange, vienoiserie, Salade de fruite et boisson chaude! <br>
            Et en plus de celà tu est livré directement chez toi par HumaCS ! <br> 
            Tu peux dès à présent le réserver</p>
                <a href="apropos.php"><button>Réserver</button></a>
            </div>
            <div class="illustration_container ptitdej"></div>
        </section>
        <section class="carte">
            <h1>Carte du jour</h1>
            <div class="contenu">
                <?php
                // On récupère tout le contenu de la table menu
                /* 
                On parcourt les catégories par ordre
                on compte le nombre d'articles correspondant
                Si le nombre est nul -> on ne echo pas le nom de la catégorie
                Si non nul -> on note le nom de la catégorie et on affiche tous les articles
                */

                $categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
                while ($categorie = $categories->fetch()) {
                    $nbr_articles = $bdd->prepare('SELECT count(*) FROM menu WHERE type_id=? AND stock="oui" ');
                    $nbr_articles->execute(array($categorie["id"]));
                    if (!($nbr_articles->fetchColumn() > 0)) // si nombre d'articles de la catégorie=0
                    {
                    } else //si au moins un article de la catégorie
                    {
                        $articles = $bdd->prepare('SELECT * FROM menu WHERE type_id=? AND stock="oui"');
                        $articles->execute(array($categorie["id"]));
                        if ($categorie['id'] != 1) //si id!=1 il y a des articles, on affiche la catégorie
                        {
                ?>
                            <div class="categorie">
                                <h3><?php echo $categorie["categorie"]; ?></h3>
                                <ul>
                                <?php
                            }
                            // On affiche chaque article coché de la catégorie
                            while ($article = $articles->fetch()) {
                                ?>
                                    <li>
                                        <div class="article">
                                            <?php echo $article['article']; ?><br>
                                        </div>
                                        <div class="ligne"></div>
                                        <div class="price">
                                            <?php
                                            if ($article['soldout'] == "oui") {
                                                echo '<span class="soldout">(SOLDOUT!)</span>';
                                            } else {
                                                echo $article['prix'] . '€';
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <span class="ingredients">
                                                <?php echo $article['infos']; ?>
                                    </span>
                                <?php
                            }
                                ?>
                                </ul>
                            </div>
                    <?php
                    }
                }
                    ?>
            </div>
        </section>
    </main>
    <?php include "included/footer.php" ?>
</body>

</html>