<?php $page = 'commander' ?>
<?php include("included/database.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Le Musée. Passez ici vos commandes et retrouvez le menu du jour! "/>
    <?php include "included/meta.php" ?>
    <title>Commander au Musée</title>
</head>
<script>
    function display_input(x) {
        $telephone = document.getElementById("telephone")
        $adresse = document.getElementById("adresse")
        $table = document.getElementById("table")
        $horaire = document.getElementById("horaire")
        $nom = document.getElementById("nom")
        $type_cmd = document.getElementById("type_cmd")
        $boisson = document.getElementById("boisson")
        <?php if (isset($_GET['nt'])) { // si depuis qr code?>
            $table.style.display = "none"
            $adresse.style.display = "none"
            $horaire.style.display = "none"
            $telephone.style.display = "none"
            $type_cmd.style.display = "none"
            $boisson.style.display = "flex"
            document.getElementById("terrasse").checked = true
            setRequired("table", true)
            setRequired("boisson",true)
            setRequired("adresse", false)
            setRequired("horaire", false)
            setRequired("telephone", false)
            console.log("boucle")
        <?php ;
        } else { ?>
            if (x == 0) { // en terasse sans QR code
                $table.style.display = "flex"
                $adresse.style.display = "none"
                $horaire.style.display = "none"
                $telephone.style.display = "none";
                $boisson.style.display = "flex"
                setRequired("table", true)
                setRequired("boisson",true)
                setRequired("adresse", false)
                setRequired("horaire", false)
                setRequired("telephone", false)
                console.log("boucle")
            } else {
                if (x == 1) { // à emporter
                    $table.style.display = "none"
                    $adresse.style.display = "none"
                    $horaire.style.display = "flex"
                    $telephone.style.display = "flex"
                    $boisson.style.display = "none"
                    setRequired("table", false)
                    setRequired("adresse", false)
                    setRequired("horaire", true)
                    setHoraire("12:00", "21:00")
                    setRequired("boisson",false)
                } else { // sinon livraison
                    $table.style.display = "none"
                    $adresse.style.display = "flex"
                    $horaire.style.display = "flex"
                    $telephone.style.display = "flex"
                    $boisson.style.display = "none"
                    setRequired("table", false)
                    setRequired("adresse", true)
                    setRequired("horaire", true)
                    setHoraire("18:00", "21:00")
                    setRequired("boisson",false)
                }

            }
            console.log("ok")
        <?php ;
        } ?>
    }

    function setRequired(val, bool) {
        input = document.getElementById(val).getElementsByTagName('input');
        for (i = 0; i < input.length; i++) {
            input[i].required = bool;
        }
    }

    function setHoraire(min, max) {
        input = document.getElementById("horaire").getElementsByTagName('input');
        for (i = 0; i < input.length; i++) {
            input[i].max = max;
            input[i].min = min;
        }
    }


    $radiobuttons = document.querySelectorAll('input[name="question"]');
    for (const radiobutton of $radiobuttons) {
        log("test")
        if (radiobutton.checked) {
            $button_id = radiobutton.id;
            if (button_id == "terrasse") {
                display_input(0)
            } else {
                if (button_id == "emporter") {
                    display_input(1)
                    console.log("zbeubzbeub")
                } else {
                    display_input(2)
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
            <h1 style="font-size: 4rem;">⚠️Réouverture de la terasse du Musée⚠️</h1>
            <p>
            <h3>Le Musée ouvre sa terrasse à partir du 19 Mai! 😍
                <br>Cependant pour que cela soit possible, un protocole sanitaire stricte devra être respecté 😷
                <br>Vous pouvez consulter l'ensemble des règle en suivant <a href="/musee/img/Reouverture du Musee.jpg">ce lien</a>
                <br>ou bien visionner la video ci-dessous pour plus d'informations:
            </h3>
            <video controls width="80%" style="margin-top: 1rem;" preload="metadata">
                <source src="/musee/AdRline.mp4" type="video/mp4">

                Sorry, your browser doesn't support embedded videos.
                Here is <a href="/musee/AdRline.mp4">a link to download the video</a>
            </video>
            </p>
            <!-- <p style="margin-top: 2rem;">
            <h3>
                Nous avons très hâte de vous retrouver le 19!
                <br>L'Association ❤️🖤
            </h3>
            </p> -->
        </section>
        <section class="carte infos">
            <h1 class="reservation">L'AdR pense à toi!</h1>
            <h3>Pour toi qui est confiné, tu as la possibilité de commander des articles et venir chercher ta commande au Musée!</h3>
            <h3 style="color:darkred;"> ⚠️Attention: en raison de la réouverture de la terrasse, nous arrêtons les livraisons le midi et le soir ⚠️ <br> Un grand MERCI à Huma et plus récemment Capèse pour leur aide précieuse! &lt;3 </h6>
                <br>

                <!-- <h3 style="color:darkred;">BURGER SOLDOUT!!!</h3>
			<img src="burger.jpeg" style="width:90%;">
		 -->
                <h2 style="color:darkred;">MENU DE LA SEMAINE</h2><br>
                <a href="img/Menu semaine du 31 mai.jpg"><img class="menu_semaine" src="img/Menu semaine du 31 mai.jpg"></a>
                <br>
                <!-- <h3>Le Menu de la semaine est disponible <a href="img/menu_semaine_07-02.jpeg">ici</a></h3>
			<br> -->
                <!-- <h2>Réserve ton p'tit dej de Mardi <a href=" https://docs.google.com/forms/d/e/1FAIpQLSdIl2pjrZ99A-Os2xXWpXKGB8F2PuGrlvXk5AEv-xbsJmFIXQ/viewform?usp=sf_link">ici</a> ! -->
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
                                <h3><?php echo $categorie["categorie"];
                                    if ($categorie["id"] == 15) { ?><span class="price" style="margin-left: auto;
                                    font-size: 2rem; "> ( 25cl ou 50cl )</span>
                                    <?php } ?></h3>
                                <ul>
                                    <?php
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
                                    if ($categorie["id"] == 15) {
                                    ?>
                                        <li>
                                            <div class="article">
                                                Consigne<br>
                                            </div>
                                            <div class="ligne"></div>
                                            <div class="price">
                                                1€
                                            </div>
                                        </li>
                                    <?php
                                    }

                                    ?>
                                </ul>
                            </div>
                        <?php
                        } else {
                        ?>
            </div>
            <div class="none" style="display: block;">
                <h2 style="margin-bottom: 1rem;">Le Musée n'est pas encore ouvert. <br> Horaires d'ouverture:</h2>
                <div style="text-align: center">
                    Du Lundi au Jeudi de 12h à 14h et de 17h à 21h <br>et le Vendredi de 12h à 14h
                </div>
            </div>
<?php
                        }
                    }
                }
?>
        </div>
        <h2 style="font-size: 3rem; margin: 1rem 0;">Vous trouverez la liste des allergènes <a href="/musee/img/allergenes.jpg">ici</a></h2>
        </section>
        <section class="commande">
            <h1>Formulaire de commande <?php if (isset($_GET['nt'])) {
                                            echo " - Table " . $_GET['nt'];
                                        } ?></h1>
            <form method="POST" action="reponse.php">
                <!--onsubmit="this.submit(); this.reset(); return false;"-->
                <article class="form" id="type_cmd">
                    <div class="left">
                        <label for="adresse"> Type de commande : </label>
                    </div>
                    <div class="right">
                        <div class="type_commande">
                            <div class="choix">
                                <input type="radio" name="question" value="En terrasse" id="terrasse" onclick="display_input(0)" required /> <label for="non">En terrasse</label>
                            </div>
                            <div class="choix">
                                <input type="radio" name="question" value="A emporter" id="emporter" onclick="display_input(1)" required /> <label for="oui">A emporter</label>
                            </div>
                            <div class="choix" style="display: none;">
                                <input type="radio" name="question" value="A livrer" id="livraison" onclick="display_input(2)" /> <label for="non">Livraison</label>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="form" style="margin-top: 3rem;" id="nom">
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
                            <input class="input" placeholder="n°" type="number" name="num_table" id="num_table" required />
                        </div>
                    </div>
                </article>
                <article class="form" id="adresse" style="display: none">
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
                        <label for="horaire"> Horaire de collecte </label>
                    </div>
                    <div class="right">
                        <div class="boite_form" style=" padding-left:0px;">
                            <span class="icon" style="margin-right: auto;"><i class="fas fa-clock"></i></span>
                            <input class="input" type="time" name="horaire_livraison" required />
                        </div>
                    </div>
                </article>
                <article class="form" id="boisson">
                    <div class="left">
                        <label for="adresse"> Boisson ou nourriture? : </label>
                    </div>
                    <div class="right">
                        <div class="type_food">
                            <div class="choix">
                                <input type="radio" name="food" value="Nourriture" id="Nourriture" required /> <label for="non">Nourriture</label>
                            </div>
                            <div class="choix">
                                <input type="radio" name="food" value="Boisson" id="Boisson" required /> <label for="oui">Boisson</label>
                            </div>
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
<script>
    <?php if (isset($_GET['nt'])) { ?>
        console.log('çamarche');
        display_input(0);
        document.getElementById("num_table").setAttribute('value', <?php echo $_GET["nt"] ?>);
        document.getElementById("terrasse").checked = true;
    <?php } ?>
</script>

</html>