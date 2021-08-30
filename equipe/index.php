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
        <section class="hero adr2k21" id="adr2k21">
            <div class="container">
                <h1 class="headline"> Notre équipe </h1>
            </div>
        </section>
        <section class="poles">
            <div class="container y2021" id="equipe">

                <!-- <h1 class="equipe"><strong>!</strong>! Voici l'AdR 2k21 !<strong>!</strong></h1> -->

                <div class="pole buro">
                    <h2 id="buro">⚙ Le Buro ⚙ </h2>
                    <img class="prez" src="img_poles/Table.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Fraîchement élu, prêt à tout changer !!
                        Que ce soit au niveau des résidences, des lieux de vie ou encore des différents évènements et activités proposés par l’AdRCS prochainement, nous avons pour objectif de faire ce pourquoi cette association a été créée, c’est à dire représenter et faire plaisir aux résidents du campus ! ❤❤
                    </p>
                </div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="ptitdej">🥐 VP P'tit Dej 🥐</strong></h2>
                    <img class="prez" src="img_poles/ptit-dej.jpg" onclick="window.open(this.src,'_self')">
                    <p>Voilà le pôle le plus important de l'AdR : LE P'tit Déj !! 🥐 
                        Les seuls du campus capables de régaler ceux qui se lèvent pour suivre les cours 📚 autant que ceux qui détestent le sommeil et qui sont encore en nuit blanche 🔭 
                        Cette courageuse équipe de lèves-tôt 🥱 saura te réveiller dans la meilleure des ambiances au Musée, au son de douces musiques (et parfois de cris stridents 👭). 
                        Venez donc découvrir la délicieuse formule (et tout un tas d'autres choses🍏) de ces crèmes du p'tit dèj tous les matins entre 7h30 et 9h 🖤❤️</p>
                </div>


                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="khafet">🍕 VP Khâfet 🍕</strong></h2>
                    <img class="prez" src="img_poles/Khafet.jpg">
                    <p>
                    Ils se disent tous le meilleur pôle mais il n'y a qu'à regarder les chiffres pour voir que la khâfet est LE pôle le plus prisé. 
                    La team Khâfet toujours au complet s'occupe de régaler le campus chaque midi de 11h45 à 13h45. 
                    À la place de votre RU habituel, venez déguster les meilleures pizzas du campus mais aussi de bon petits plats maison préparés le jour même par notre ékip 🔥😋 !
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="khoope">🥪 VP Khoôpé 🥪</strong></h2>
                    <img class="prez" src="img_poles/Kopé.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Description Koôpée
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="bar">🍺 VP Bar 🍺</strong></h2>
                    <img class="prez" src="img_poles/Bar.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Description du Bar
                        <!-- Vous servir bière au musée et alcool en soirée (quand y’en aura), toujours être chaud(e) pour un BP (qu’on va gagner), nous et Bertrand le gérant du musée seront vos VPs bar cette année et telle est notre mission.
                        Pour nous trouver, rien de bien compliqué, il suffit de passer au Musée à partir de 20h30, et venir nous défier si vous l’osez.-->
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="soiree">💃 VP Soirées et VP CQ 🚚</strong></h2>
                    <img class="prez" src="img_poles/cq-soirée.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Description des pôles CQ et Soirée
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
                    <img class="prez" src="img_poles/Eventos.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Desciption du pôle Eventos
                        <!-- Le pôle eventos est un mélange entre les douceurs culinaires espagnoles et le savoir-vivre français pour des apéros toujours plus qualis et des événements encore plus hardcore. Tout au long de l’année il te permettra d’assister à des afterwork endiablés au musée, à des cafés débats (si tu te sens pousser des ailes de philosophes), à la création d’un coin chill au musée et bien d’autres choses encore.
                        Le pôle apéro pour des ienclis satisfaits. -->
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
                    <img class="prez" src="img_poles/Rez.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Le pôle rez est posté en bas des blocs de Césal toute l’année, été compris ☀️,
                        pour représenter les résidents au quotidien 🏠, répondre à vos questions,
                        être l’intermédiaire en cas de litige, proposer des améliorations des résidences comme notre superbe terrain de pétanque 🏆,
                        gérer le matos et les prêts sur le campus, collaborer dans des projets sur tout le plateau de Saclay et évidemment peupler ce bon vieux Musée 🍻
                        <!-- Puisque ça ne s'appelle pas l'Association des REZidents pour rien, c'est au tour du pôle Rez de se présenter.
                        Vous avez déjà reçu notre mail de présentation la semaine dernière (et oui, on est des années lumières devant les autres pôles).
                        Ce qu’il faut surtout retenir, c’est que Léonard Corre, le Prez Rez, et les trois VP Rez Alexandre Couret, Guillaume Raysseguier et Clément Franey sont là pour représenter les résidents devant CESAL, et ramener la Poly à la maison. (RIP) -->
                    </p>
                </div>

                <div class="separator"></div>

                <div class="pole qom" onclick="window.open(this.getElementsByTagName('img')[0].src,'_self')">
                    <h2 id="qom">🧠 VP Qom 🧠</strong></h2>
                    <img class="prez" src="img_poles/Qom.jpg" onclick="window.open(this.src,'_self')">
                    <p>
                        Qom prévu le meilleur pour la fin, le Qoeur de l'AdR, le pôle qui fait tourner le Qampus, finalement j'ai nommé le pôle Qom. Nous faisons des visuels pour tous nos évènements genre soirées (quand y en aura), par des tentures, affiches, flyers, aQQompagnés de toute la QommuniQation qui en déQoule (fb, insta, snap, linkdIn, chatroulette, etc.). On en profite pour sharker quelques entreprises au passage :)
                        On fait aussi dans l'import-export de tentures (et la peinture qui va aveQ), que l'on vous fournira à un prix Qordial ;)
                        Nous sommes désolés pour l'othographe, on a quelques problèmes de Q à régler
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
                <button onclick="showPanel(0)">2020</button>
                <button onclick="showPanel(1)">2019</button>
                <button onclick="showPanel(2)">2018</button>
                <button onclick="showPanel(3)">2016</button>
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