<?php include("database.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("../included/meta.php"); ?>
    <link rel="stylesheet" href="style.css">
    <title>Menu</title>
</head>

<body>
    <?php include("../included/header.php"); ?>
    <main>
        <section class="accueil_commande">
            <div class="container">
                <h1 id="presentation">Commande d'articles</h1>
                <img id="logo" src="img/logo_musee_b.png">
            </div>
        </section>
        <article class="reservation">
            <h3 class="reservation">L'AdR pense à toi!</h1>
                <h6>Pour toi qui est confiné, tu as la possibilité de commander des articles au musée et venir chercher ta commande au musée!</h6>
                <h3 style="color:darkred;">Nous proposons même une livraison chez toi en ce moment pour 1 euro par tranche de 7 euros! Donc si tu souhaites te faire livrer, coche la case "oui" tout en bas!</h6>
                    <br>

                    <!-- <h3 style="color:darkred;">BURGER SOLDOUT!!!</h3>
			<img src="burger.jpeg" style="width:90%;">
		 -->
                    <h3 style="color:darkred;">MENU DE LA SEMAINE</h3>
                    <img class="menu_semaine" src="img/Menu semaine du 15 février.jpeg">
                    <br>
                    <!-- <h3>Le Menu de la semaine est disponible <a href="img/menu_semaine_07-02.jpeg">ici</a></h3>
			<br> -->
                    <h3>Shotgun ton ptit dej de mercredi <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5SRkpY1j8ZPyYA4yZc49CV-DTJkEvtZl_NXAO-UfCDsYSWQ/viewform?fbclid=IwAR29XkQz6zAQIRIEcJKBRJJa4jghX_aQmxrAIXTkjLMUGwXa-nyam-iuT2E">ici</a></h3>
                    <br>

                    <h3>Voici la carte des articles actuellement disponibles à la commande :</h3>
                    <h6 style="color:darkred;">(S'il est marqué aucun, c'est que pour l'instant tu ne peux pas commander... reviens plus tard!)</h6>

                    <div class="heading-underline"></div>
        </article>
        <div class="carte">
            <h1>Ceci est la carte</h1>
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
                                            <?php echo $article['article']; ?>
                                        </div>
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
                                <?php
                            }
                                ?>
                                </ul>
                            </div>
                    <?php
                    }
                }
                    ?>

                    <div class="categorie">
                        <h3>test</h3>
                        <ul>
                            <li>
                                <div class="article">Burger frites</div>
                                <div class="price">5.00€</div>
                            </li>
                            <li>
                                <div class="article">Kebab frites</div>
                                <div class="price">5.00€</div>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </main>
    <?php include("../included/footer.php"); ?>
</body>

</html>