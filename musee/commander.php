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
<script>
    function diplay_input(x) {
        $telephone = document.getElementById("telephone")
        $adresse = document.getElementById("adresse")
        $table = document.getElementById("table")
        $horaire = document.getElementById("horaire")
        if (x == 0) {
            $table.style.display = "flex"
            $adresse.style.display = "none"
            $horaire.style.display = "none"
            $telephone.style.display = "none";
            setRequired("table", true)
            setRequired("adresse", false)
            setRequired("horaire", false)
            setRequired("telephone", false)
            console.log("boucle")
        } else {
            if (x == 1) {
                $table.style.display = "none"
                $adresse.style.display = "none"
                $horaire.style.display = "flex"
                $telephone.style.display = "flex"
                setRequired("table", false)
                setRequired("adresse", false)
                setRequired("horaire", true)
            } else {
                $table.style.display = "none"
                $adresse.style.display = "flex"
                $horaire.style.display = "flex"
                $telephone.style.display = "flex"
                setRequired("table", false)
                setRequired("adresse", true)
                setRequired("horaire", true)
            }

        }
        console.log("ok")
    }

    function setRequired(val, bool) {
        input = document.getElementById(val).getElementsByTagName('input');
        for (i = 0; i < input.length; i++) {
            input[i].required = bool;
        }
    }

    $radiobuttons = document.querySelectorAll('input[name="question"]');
    for (const radiobutton of $radiobuttons) {
        log("test")
        if (radiobutton.checked) {
            $button_id = radiobutton.id;
            if (button_id == "terrasse") {
                diplay_input(0)
            }
            else{
                if(button_id == "emporter"){
                    diplay_input(1)
                    console.log("zbeubzbeub")
                }
                else{
                    diplay_input(2)
                }
            }
            break;
        }
    }
</script>

<body>
    <?php include "included/header.php" ?>
    <main>
        <section class='hero commander'>
            <h1>Commander</h1>
        </section>
        <!-- <section class="smallapropos  ptitdej">
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
        </section> -->
        <section class="carte infos covid">
            <h1 style="font-size: 3rem;">⚠️Réouverture de la terasse du Musée⚠️</h1>
            <p>
            <h3>Le Musée va pourvoir réouvrir sa terrasse à partir du 19 Mai! 😍
                <br>Cependant pour que cela soit possible, un protocole sanitaire stricte devra être respecté 😷
                <br>Vous trouverez bientot dans cette section le détail des règles à respecter pour que le Musée puisse garder ses portes ouvertes.
            </h3>
            </p>
            <p style="margin-top: 2rem;">
            <h3>
                Nous avons très hâte de vous retrouver le 19!
                <br>L'Association ❤️🖤
            </h3>
            </p>
        </section>
        <section class="carte infos">
            <h1 class="reservation">L'AdR pense à toi!</h1>
            <h3>Pour toi qui est confiné, tu as la possibilité de commander des articles au musée et venir chercher ta commande au musée!</h3>
            <h3 style="color:darkred;">Nous proposons même une livraison chez toi tous les midi de 12h à 13h30 et le soir de 18h à 21h pour 1€ par tranche de 7€! </br> Donc si tu souhaites te faire livrer, coche la case "oui" tout en bas!</h6>
                <br>

                <!-- <h3 style="color:darkred;">BURGER SOLDOUT!!!</h3>
			<img src="burger.jpeg" style="width:90%;">
		 -->
                <h2 style="color:darkred;">MENU DE LA SEMAINE</h2><br>
                <a href="img/Menu semaine du 10 mai.jpg"><img class="menu_semaine" src="img/Menu semaine du 10 mai.jpg"></a>
                <br>
                <!-- <h3>Le Menu de la semaine est disponible <a href="img/menu_semaine_07-02.jpeg">ici</a></h3>
			<br> -->
                <h2>Réserve ton p'tit dej spé pour mardi 🍳🥑 <a href=" https://docs.google.com/forms/d/e/1FAIpQLSdHfQHfEO-HeR4kXwFsZz5YFnXZUVxgYq-yCr-pynV9veIiXQ/viewform">ici</a> !
                    <br> Au menu: toast avocat œuf et bananes au chocolat🍌🍫
                </h2>
                <br>
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
                        $articles = $bdd->prepare('SELECT * FROM menu WHERE type_id=? AND stock="oui" order by article');
                        $articles->execute(array($categorie["id"]));
                        if ($categorie['id'] != 1) //si id!=1 il y a des articles, on affiche la catégorie
                        {
                ?>
                            <div class="categorie">
                                <h3><?php echo $categorie["categorie"]; ?></h3>
                                <ul>
                                    <?php
                                    if($categorie["id"]==14){ ?>
                                        <div class="price">
                                            25cl | 50cl
                                        </div>
                                    <?php
                                    } //Pour les pressions
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
                        } else {
                        ?>
                            <div class="none"> Aucun article n'est disponible pour l'instant...</div>
                <?php
                        }
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
                        <label for="adresse"> Type de commande : </label>
                    </div>
                    <div class="right">
                        <div class="type_commande">
                            <div class="choix">
                                <input type="radio" name="question" value="En terrasse" id="terrasse" onclick="diplay_input(0)" required /> <label for="non">En terrasse</label>
                            </div>
                            <div class="choix">
                                <input type="radio" name="question" value="A emporter" id="emporter" onclick="diplay_input(1)" required /> <label for="oui">A emporter</label>
                            </div>
                            <div class="choix">
                                <input type="radio" name="question" value="A livrer" id="livraison" onclick="diplay_input(2)" required /> <label for="non">Livraison</label>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="form" style="margin-top: 3rem;">
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

                <article class="form" id="telephone">
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

                <article class="form" id="table">
                    <div class="left">
                        <label for="adresse"> Numéro de table <br> (Si en terrasse)</label>
                    </div>
                    <div class="right">
                        <div class="boite_form">
                            <span class="icon"><i class="fas fa-utensils"></i></i></span>
                            <input class="input" placeholder="n°" type="text" name="num_table" required />
                        </div>
                    </div>
                </article>
                <article class="form" id="adresse">
                    <div class="left">
                        <label for="adresse"> Ton adresse : <br> (Si tu veux être livré)</label><br>
                    </div>
                    <div class="right">
                        <div class="boite_form">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <input class="input" type="text" name="adresse" />
                        </div>
                    </div>
                </article>

                <article class="form" id="horaire">
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