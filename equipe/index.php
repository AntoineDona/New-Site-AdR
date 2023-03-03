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
    <title>L'équipe - AdR CentraleSupélec</title>
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
        <section class="hero adr2k23">
            <div class="container">
            <h1 class="headline">Notre équipe</h1>
                
            </div>
        </section>
        <section class="poles">
            <div class="container y2021" id="equipe">

                <!-- <h1 class="equipe"><strong>!</strong>! Voici l'AdR 2k21 !<strong>!</strong></h1> -->

                <div class="pole buro">
                    <h2 id="buro">🍈 Le Buro 🍈</h2>
                    <img class="prez" src="img_poles/buro_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Sous leurs couronnes de rois 👑 se trouvent les cerveaux de l'association 🧠 : le Buro. Heureusement qu'ils la portent pour que leur melon n’explose pas 🍈.
                </div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="ptitdej">🥐 Le P'tit Déj 🥐</strong></h2>
                    <img class="prez" src="img_poles/ptit_dej_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Entre réveil difficile 🕰️ et croissant chaud 🥐, le P'tit Déj c'est l'occasion de réveiller vos papilles avant les cours ou de boire un bon café ☕️. Lève-tôt ou gros fêtard, passes faire le plein de vitamines pour illuminer le reste de ta journée ! 😉
                    </p>
                </div>


                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="khafet">🍕 La Khâfet 🍕</strong></h2>
                    <img class="prez" src="img_poles/khafet_2k23.jpg">
                    <p>
                    Le pôle le plus demandé de l’AdR composé des plus gros kiffeurs. Grosse faim ? Les meilleurs pizzas, paninis et wraps du Musée c’est à la Khâfet, le tout servi en musique 🎵 et avec le smile 🙂. On se voit bientôt à la Khâfiesta ! 🎉
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="khoope">🥪 La Khoôpé 🥪</strong></h2>
                    <img class="prez" src="img_poles/khoope_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Venez vous amuser comme des singes 🦧 à la Khoôpé ! On y sert des cookies 🍪 tout chauds à 17h pour vous réchauffer les mains et des pizzas 🍕 pour réchauffer votre cœur. Et pour éteindre le feu 🔥, rien de tel qu'une bonne bière 🍻 ! L'ambiance y est délire et nul ne doute que la Khoôpé est le meilleur pôle de tout l’AdR 🖤❤️ !
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="bar">🍺 Le Bar 🍺</strong></h2>
                    <img class="prez" src="img_poles/bar_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Avant ils habitaient en face du baaaaaaar 🍻, maintenant ils habitent en face de chez eux 🏡. Deviens l'ami du baaaaaaar et régale toi avec nos pizzas 🍕 en les arrosant avec nos bières 🍺 du lundi au jeudi de 20h30 à minuit.

                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="soiree">🚚 Les CQ/Soirées 💃</strong></h2>
                    <img class="prez" src="img_poles/cq&soirees_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Besoin de vaubans ou de crashs 🚧, des deux paires d’épaules les plus larges 💪 ou des deux cerveaux les mieux formés de l’AdR 🧠, les VP CQ/Soirées seront là toute l’année pour organiser les meilleures soirées et CQriser vos TU 🔊.
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
                    <h2 id="eventos">✨ Les Eventos ✨</strong></h2>
                    <img class="prez" src="img_poles/eventos_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Entre events de folie 🕺🏻 et apéros gourmands 🧁, le pôle Eventos est vraiment là pour te régaler ! Que ce soit des expos originales ou des classiques revisités, on vous en met plein la vue 🤩. Donc n’hésitez plus, contactez nous pour réaliser des expos de rêve 💃🏻 !
                    </p>
                </div>

                <div class="separator"></div>

                <!-- <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                <h2 id="saclay">🏗 VP Saclay 🏗</strong></h2>
                <p>
                    Le pôle Saclay, c’est le pôle qui s’occupera cette année de l’arrivée de l’ENS Paris-Saclay, notamment au niveau des résidences et de la vie commune qu’on devra mener à partir de l’année prochaine. C’est aussi le pôle qui peut se charger des aménagements pour le plateau, de la navette/bus aux terrains de sport.
                </p></div> -->

                <div class="pole rez" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="rez">🏚 La ReZ 🏚</strong></h2>
                    <img class="prez" src="img_poles/rez_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Parce que l’AdR c’est pas que le musée 🍻, le pôle ReZ saura te représenter en tant que résident 🏡, te proposer des projets sur le campus 🎉🏖️, t’aider dans ta relation avec Césal 🛏️ et te prêter du matos à toi et tes assos 🤝.
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole qom" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="qom">🧠 La Qom 🧠</strong></h2>
                    <img class="prez" src="img_poles/qom_2k23.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                    Pour finir, les plus beaux Q de cette éQuipe 🍑 ! Plus Qonnus sous le nom du pôle 🖌️Qom✨, agissant dans l'ombre pour vous faire des visus toujours plus Qualis, des tentures inQroyables 🤩 et des shotguns fantastiQues 💻.
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
                <button onclick="showPanel(0)">2022</button>
                <button onclick="showPanel(1)">2021</button>
                <button onclick="showPanel(2)">2020</button>
                <button onclick="showPanel(3)">2019</button>
                <button onclick="showPanel(4)">2018</button>
            </div>

            <div class="tabPanel" id="2022">
                <h1>AdR 2022</h1>
                <div class="vieux">
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/bureau-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Buro</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/ptit-dej-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le P'tit Déj</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/bar-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Bar</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/cq-soirée-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>Les CQ-Soirées</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/khoopé-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Khoôpé</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/Qom-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Qom</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/Khafet-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>La Khâfet</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2022/Rez-2k22.jpg" onclick="window.open(this.src,'_self')">
                        <p>La ReZ</p>
                    </div>
                </div>

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
                        <p>Le P'tit Déj</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/Bar_v2.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Bar</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2021/cq-soirée_v2.jpg" onclick="window.open(this.src,'_self')">
                        <p>Les CQ-Soirées</p>
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
                        <p>Le P'tit Déj</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/Bar.jpg" onclick="window.open(this.src,'_self')">
                        <p>Le Bar</p>
                    </div>
                    <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                        <img src="Vieux/2020/CQ Soiree.jpg" onclick="window.open(this.src,'_self')">
                        <p>Les CQ-Soirées</p>
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
                        <p>Le P'tit Déj</p>
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
                        <p>Les Soirées</p>
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