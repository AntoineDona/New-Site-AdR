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
        <section class="commande">
            <h1>Formulaire de commande</h1>
            <form method="POST" action="reponse.php">
                <!--onsubmit="this.submit(); this.reset(); return false;"-->
                <article class="form">
                    <div class="left">
                        <label for="pseudo">Ton nom :</label>
                    </div>
                    <div class="right">
                        <div class="boite_form">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <input class="input" type="text" name="nom" id="nom" required />
                        </div>
                    </div>
                </article>

                <article class="form">
                    <div class="left">
                        <label for="numero"> Ton numéro de téléphone :</label>
                    </div>
                    <div class="right">
                        <div class="boite_form">
                            <span class="icon"><i class="fas fa-phone"></i></span>
                            <input class="input" placeholder="+33" type="text" name="numero" required />
                        </div>
                    </div>
                </article>

                <article class="form">
                    <div class="left">
                        <label for="adresse"> Souhaites-tu être livré ? <br> (seulement de 18h à 21h!)</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="question" value="oui" id="oui" /> <label for="oui">OUI</label>
                        <input type="radio" name="question" value="non" id="non" /> <label for="non">NON</label>
                    </div>
                </article>

                <article class="form">
                    <div class="left">
                        <label for="adresse"> Ton adresse <br> (Si tu ne veux être livré):</label><br>
                    </div>
                    <div class="right">
                        <div class="boite_form">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <input class="input" type="text" name="adresse" />
                        </div>
                    </div>
                </article>

                <article class="form">
                    <div class="left">
                        <label for="horaire"> Horaire de collecte / livraison</label>
                    </div>
                    <div class="right">
                        <div class="boite_form" style=" padding-left:0px;">
                            <span class="icon" style="margin-right: auto;"><i class="fas fa-clock"></i></span>
                            <input class="input" type="time" name="horaire_livraison" required />
                        </div>
                    </div>
                </article>
                <article class="form_commande">
                    <label for="commande"> Ta commande :</label><br>
                    <textarea id="texte-com" class="input" name="commande" rows="5"></textarea>
                </article>

                <article class="envoyer">
                    <input id="submit" class="btn" type="submit" name="Envoyer">
                    <!-- <input style="background-color:grey" class="btn btn-secondary" type="button" name="Valider" onclick="submit_form();"> -->
                </article>
            </form>
        </section>
    </main>
    <?php include "included/footer.php" ?>
</body>

</html>