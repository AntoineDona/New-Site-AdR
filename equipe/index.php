<?php
function display_buttons($nbr_annees)
{
    $id = 0;
    $annee = 2020;
    while ($id < $nbr_annees) {
        echo "<button onclick='showPanel(" . $id . ")'>" . $annee . "</button> \n";
        $id++;
        $annee = $annee - 1;
    };
}
?>
<?php $page = 'Equipe' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../included/meta.php" ?>
    <title>Notre Equipe - AdR CentraleSupélec (AdRCS)</title>
</head>

<body>
    <?php include "../included/messenger.php" ?>
    <script>
        function openImg() {
            window.open(this.getElementsByTagName('img')[0].src, '_self')
        }
    </script>
    <?php include "../included/header.php" ?>
    <main id="swup" class="transition-fade">
        <section class="hero adr2k22" style='background-image:/equipe/img_poles/groupe2k22_v2.jpg'>
            <div class="container">
            <h1 class="headline"> Notre équipe </h1>
            <!-- <img src="/equipe/img_poles/groupe2k22_v2.jpg" alt="l'équipe" style="margin:0;"> -->
                
            </div>
        </section>
        <section class="poles">
            <div class="container y2021" id="equipe">

                <!-- <h1 class="equipe"><strong>!</strong>! Voici l'AdR 2k21 !<strong>!</strong></h1> -->

                <div class="pole buro">
                    <h2 id="buro">⚙ Le Buro ⚙ </h2>
                    <img class="prez" src="img_poles/bureau-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Le bureau : c’est 4 personnes et tout autant de melons. les chevilles gonflées, ils tirent cette bande de chibrons contre vents et marées. Jamais derrière le bar mais prêts pour la bagarre.
                    </p>
                </div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="ptitdej">🥐 VP P'tit Dej 🥐</strong></h2>
                    <img class="prez" src="img_poles/ptit-dej-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Levés dès 7h30, les VP P'tit Dej seront là tous les matins sans faute ni retard pour vous proposer viennoiseries, jus, cafés, cookies, mais surtout leur formule à 2 euros jusqu'à 9h ! 🥐🌛 Venez vous rassasier au son d'une douce musique pour bien commencer votre journée ! 🧸
                    </p>
                </div>


                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="khafet">🍕 VP Khâfet 🍕</strong></h2>
                    <img class="prez" src="img_poles/Khafet-2k22.jpg">
                    <p>
                    Bienvenue à la Khafiestaaa !! 🎉 Retrouvez notre équipe toute la semaine de 11h45 à 13h45 pour vous régaler de plats frais 🥗 ou de pizzas chaudes 🍕. Sous grosse playlist 🎶 et chorées improvisées 🕺, la khâfet relève le niveau de votre pause dej. À plus au Musée 💙💛💚💜
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="khoope">🥪 VP Khoôpé 🥪</strong></h2>
                    <img class="prez" src="img_poles/khoopé-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Tous les pôles se battent entre eux pour savoir lequel est le meilleur... Pourtant, il n'y a qu'un superpôle. Celui qui te sert des cookies bien chaud à 17h🍪, te nourrit jusqu’à 20h30🍕 et t'emmène proche de ton bonheur. Viens donc décompresser et chiller un bon coup à la Khoôpé!
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="bar">🍺 VP Bar 🍺</strong></h2>
                    <img class="prez" src="img_poles/bar-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        BAAAAAAAAAAAAAAR 🍺
                        Une petite faim ? Viens au bar.</br>
                        Une grande soif ? Viens au bar.</br>
                        Tu te fais chier ? Viens au bar.</br>
                        Du lundi au jeudi dès 20h30 🕣
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="soiree">💃 VP Soirées et VP CQ 🚚</strong></h2>
                    <img class="prez" src="img_poles/cq-soirée-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Rencontrez l'équipe qui organisera toutes vos festivités a échelle de CS ! La team imberbe 🧑‍🦲 à la soirée et la team barbue 🧔 à la CQ sauront vous régaler comme jamais. La première régalera vos meilleurs TU🕺, qui seront assurés et CQrisés 🚧 par les seconds. Entre quadra et nano,  crash et coup de Taser, une équipe de choc : t’as peur.
                    </p>
                </div>

                <div class="separator"></div>

                <!-- <div class="pole">
                <h2 id="cq">🛠 VP CQ 🛠</strong></h2>
                <p>
                    Comme le veux la tradition, la principale tâche du vp cq restera de ramener l'autre vp cq en cqrité chez lui. Comme le veut moins la tradition, cette année ça sera deux GDPA supelecs qui occuperont ce poste, ce qui confirme l'intelligence de ce pôle.
                </p></div>
                <img class="prez" src="CQ.jpeg">
                 -->

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="eventos">🍣 VP Eventos 🍣</strong></h2>
                    <img class="prez" src="img_poles/Eventos-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Voici le pôle Eventos, aka le pôle Camilles (ou Camcams pour les intimes)🥰.Nous nous chargons de réaliser des events, des expos et des apéros au Musée.🥂 N'hésitez pas à nous contacter pour réaliser un de ces événements avec nous!💃 Aucune restriction … on s'occupe de tout!🕺
                        PS : pour avoir plein d’exclus, follow <a href='https://www.instagram.com/les_camilles_eventos/'>@les_camilles_eventos </a>
                    </p>
                </div>

                <div class="separator"></div>

                <!-- <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                <h2 id="saclay">🏗 VP Saclay 🏗</strong></h2>
                <p>
                    Le pôle Saclay, c’est le pôle qui s’occupera cette année de l’arrivée de l’ENS Paris-Saclay, notamment au niveau des résidences et de la vie commune qu’on devra mener à partir de l’année prochaine. C’est aussi le pôle qui peut se charger des aménagements pour le plateau, de la navette/bus aux terrains de sport.
                </p></div> -->

                <div class="pole rez" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="rez">🏚 VP Rez 🏚</strong></h2>
                    <img class="prez" src="img_poles/Rez-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Chargé de la bonne ambiance sur le campus de Paris Saclay 🎉, le pôle Rez saura répondre à toutes tes questions concernant Césal en te représentant en tant que résident🏡, te proposer des projets sur le campus et dans ta rez 🏖 et te prêter un max de matos à toi et tes assos 🤝
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole qom" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="qom">🧠 VP Qom 🧠</strong></h2>
                    <img class="prez" src="img_poles/Qom-2k22.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Et finalement les plus beaux Q de cette fine éQuipe ! J'ai nommé le pôle ✨Qom✨ ! Formés et Qualifiés pour vous servir , on régalera aveQ des visuels toujours plus Qualis pour annoncer au Qampus tous les évènements !
                    </p>
                </div>

                <div class="separator"></div>

            </div>
        </section>
        <!-- <section class="vieux">
            <div class="container">
                <div class="btn-annees">
                    <button>2020</button>
                    <button>2019</button>
                    <button>2018</button>
                    <button>2017</button>
                </div>
            </div>
            <div class="photo-vieux">
                <div class="vieux-2k20"></div>
                <div class="vieux-2k19"></div>
                <div class="vieux-2k18"></div>
                <div class="vieux-2k17"></div>
            </div>
        </section> -->
        <div class="tabContainer">
            <div class="buttonContainer">
                <?php
                // display_buttons(3); //POur générer les boutons (fleme de faire à la main)
                ?>
                <button onclick="showPanel(0)">2021</button>
                <button onclick="showPanel(1)">2020</button>
                <button onclick="showPanel(2)">2019</button>
                <button onclick="showPanel(3)">2018</button>
                <button onclick="showPanel(4)">2016</button>
            </div>
            <div class="tabPanel" id="2021">
                <h1>AdR 2021</h1>
                <div class="vieux">
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Table.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Buro</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/ptit-dej.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le P'tit Dej</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Bar_v2.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Bar</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/cq-soirée_v2.jpg" onclick="window.open(this.src,'_self')">
                        <p>Les CQ-Soirée</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Kopé.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Khoôpé</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Qom.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Qom</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Khafet_v2.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Khâfet</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Rez_v2.jpg" onclick="window.open(this.src,'_self')">
                        <p>La ReZ</p>
                    </div>
                </div>

            </div>

            <div class="tabPanel" id="2020">
                <h1>AdR 2020</h1>
                <div class="vieux">
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Table.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Buro</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Ptit Dej.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le P'tit Dej</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Bar.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Bar</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/CQ Soiree.jpg" onclick="window.open(this.src,'_self')">
                        <p>Les CQ-Soirée</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Copé.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Khoôpé</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Qom.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Qom</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Khâfet.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Khâfet</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Rez.jpg" onclick="window.open(this.src,'_self')">
                        <p>La ReZ</p>
                    </div>
                </div>

            </div>
            <div class="tabPanel" id="2019">
                <h1>AdR 2019</h1>
                <div class="vieux">
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Table.jpeg" onclick="window.open(this.src,'_self')">
                        <p>Le Buro</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Ptit Dej.jpeg" onclick="window.open(this.src,'_self')">
                        <p>Le P'tit Dej</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Bar.jpeg" onclick="window.open(this.src,'_self')">
                        <p>Le Bar</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/CQ.jpeg" onclick="window.open(this.src,'_self')">
                        <p>Les CQ</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Soirée.jpeg" onclick="window.open(this.src,'_self')">
                        <p>Les Soirée</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Copé.jpeg" onclick="window.open(this.src,'_self')">
                        <p>La Khoôpé</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Qom.jpeg" onclick="window.open(this.src,'_self')">
                        <p>La Qom</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Khâfet.jpeg" onclick="window.open(this.src,'_self')">
                        <p>La Khâfet</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2019/Rez.jpeg" onclick="window.open(this.src,'_self')">
                        <p>La ReZ</p>
                    </div>
                </div>
            </div>
            <div class="tabPanel"></div>
            <div class="tabPanel"></div>
        </div>
    </main>
    <?php include "../included/footer.php" ?>
    <script defer src="/app.js"></script>
</body>

</html>