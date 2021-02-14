<?php
    function display_buttons($nbr_annees)
    {
        $id = 0;
        $annee = 2020;
        while ($id<$nbr_annees)
        {
            echo "<button onclick='showPanel(" . $id . ")'>" . $annee . "</button> \n";
            $id++;
            $annee=$annee-1;
        };
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdR CentraleSupélec</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> 
    <title>NAVIGATION</title>
</head>
<body>
    <?php include "../included/header.php" ?>
    <section class="adr2k21" id="adr2k21"> 
        <div class="container">
            <h1 class="headline"> Notre équipe </h1>
            <div class="headline-description">
                <div class="separator">
                    <div class="line line-left"></div>
                    <div class="heart"><i class="fas fa-heart"></i></div>
                    <div class="line line-right"></div>
                </div>
                <div class="single-animation">
                    <h5>Toujours là pour vous faire kiffer</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="poles">
        <div class="container" id="equipe">
			
            <h1 class="equipe"><strong>!</strong>! Voici l'AdR 2k21 !<strong>!</strong></h1>
            <br>

            <article class="pole">
                <h2 id="buro">⚙ Le Buro ⚙ </h2>
                <p>
                    Fraîchement élu, prêt à tout changer !! 
                    Que ce soit au niveau des résidences, des lieux de vie ou encore des différentes évènements et activités proposées par l’AdRCS prochainement, nous avons pour objectif de faire ce pourquoi cette association a été créer c’est à dire représenter et faire plaisirs aux résidents de campus ! ❤❤
                </p>
            </article>
            <img class="prez" src="/img_poles/Table.jpg" width="100%" height="auto">

            <div class="separator"></div>
            
            <article class="pole">
            <h2 id="ptitdej">🥐 VP Ptit Dej 🥐</strong></h2>
            <p>
                Parce que le monde appartient à ceux qui se lèvent tôt, l'AdR appartient au pôle P'tit déj. Aussi connu sous le nom du "Vrai Bureau," ce pôle est essentiel au fonctionnement de l'association. 
                <!--Cette équipe de choc 100% féminine n'est pas fragile pour autant.---> 
                Sur le pied de guerre tous les matins à 7:30, que tu sois en gueule de bois ou un des courageux qui se lèvent aux aurores, nous sommes prêtes à t'accueillir au musée, avec musique, café, bonne humeur, et une petite macarena si la chance te sourit!
            </p></article>
            <img class="prez" src="/img_poles/Ptit Dej.jpg" width="100%" height="auto">
            <br><br><br><br>
    
            <div class="separator"></div>
            
            <article class="pole">
            <h2 id="khafet">🍕 VP Khâfet 🍕</strong></h2>
            <p>
                Tu te demandes pourquoi les pizzas sont moins bonnes depuis une semaine? Pourquoi tu attends 30min ta salade César? 
        Nous avons la réponse! Nous sommes la nouvelle équipe de la Khâfet! 
    
        Si tu veux déguster les meilleurs pizzas de l'AdR (coucou les Bar) viens nous voir au musée de 11h45 à 13h45! En prime on a 3 nouvelles pizzas à venir découvrir dès demain : kebab, chèvre miel et bœuf!
        La bise de la Khâfet
            </p></article>
            <img class="prez" src="/img_poles/Khafet.jpg" width="100%" height="auto">
    
            <div class="separator"></div>
            
            <article class="pole">
            <h2 id="khoope">🥪 VP Khoôpé 🥪</strong></h2>
            <p>
                La khoôpé est au musée ce que le labrador est à Gilbert Montagné : un guide. 
        Que tu veuilles bloquer un rond point, prendre ton goûter, t'ambiancer sur des playlists choisies avec soin ou te péter le crâne dès 17h, on sera toujours là pour toi (surtout pour cramer ta pizza si t'es malpoli).
        Finalement la khoôpé c'est le bar en mieux: couchés plus tôt levés plus tôt.
        N'oubliez pas d'être présents à toutes nos khoôpés à thème.
            </p></article>
            <img class="prez" src="/img_poles/Kopé.jpg" width="100%" height="auto">

            <div class="separator"></div>
            
            <article class="pole">
            <h2 id="bar">🍺 VP Bar 🍺</strong></h2>
            <p>
                Vous servir bière au musée et alcool en soirée (quand y’en aura), toujours être chaud(e) pour un BP (qu’on va gagner), nous et Bertrand le gérant du musée seront vos VPs bar cette année et telle est notre mission. Pour nous trouver, rien de bien compliqué, il suffit de passer au Musée à partir de 20h30, et venir nous défier si vous l’osez.
            </p></article>
            <img class="prez" src="/img_poles/Bar.jpg" width="100%" height="auto">

            <div class="separator"></div>
            
            <article class="pole">
            <h2 id="soiree">💃 VP Soirées et VP CQ 🚚</strong></h2>
            <p>
                Coucou bande de nouilles ! Nous, serons VP Soirées de l’AdR pour cette année. Pour toujours plus de jeux de mots douteux mais inspirant sur les noms de soirée ou de goodies décalés, on va travailler, parce que (n’écoutez pas les bars) des soirées, vous en aurez. 
                <br>Comme le veux la tradition, la principale tâche du vp cq restera de ramener l'autre vp cq en cqrité chez lui. Comme le veut moins la tradition, cette année ça sera deux GDPA supelecs qui occuperont ce poste, ce qui confirme l'intelligence de ce pôle.
            </p></article>
            <img class="prez" src="/img_poles/CQ Soirée.jpg" width="100%" height="auto">

            <div class="separator"></div>
            
            <!-- <article class="pole">
            <h2 id="cq">🛠 VP CQ 🛠</strong></h2>
            <p>
                Comme le veux la tradition, la principale tâche du vp cq restera de ramener l'autre vp cq en cqrité chez lui. Comme le veut moins la tradition, cette année ça sera deux GDPA supelecs qui occuperont ce poste, ce qui confirme l'intelligence de ce pôle.
            </p></article>
            <img class="prez" src="CQ.jpeg" width="100%" height="auto">
            <br><br><br><br> -->
    
            <article class="pole">
            <h2 id="eventos">🍣 VP Eventos 🍣</strong></h2>
            <p>
                Le pôle eventos est un mélange entre les douceurs culinaires espagnol et le savoir-vivre français pour des apéros toujours plus quali et des événements encore plus hardcore. Tout au long de l’année il te permettra d’assister à des afterwork endiablés au musée, a des cafés débats (si tu te sens pousser des ailes de philosophes), à la création d’un coin chill au musée et bien d’autres choses encore. 
        Le pôle apéro pour des ienclis satisfaits.
            </p></article>
            <img class="prez" src="/img_poles/Eventos.jpg" width="100%" height="auto">

            <div class="separator"></div>
            
            <!-- <article class="pole">
            <h2 id="saclay">🏗 VP Saclay 🏗</strong></h2>
            <p>
                Le pôle Saclay, c’est le pôle qui s’occupera cette année de l’arrivée de l’ENS Paris-Saclay, notamment au niveau des résidences et de la vie commune qu’on devra mener à partir de l’année prochaine. C’est aussi le pôle qui peut se charger des aménagements pour le plateau, de la navette/bus aux terrains de sport.
            </p></article> -->
    
            <article class="pole">
            <h2 id="rez">🏚 VP Rez 🏚</strong></h2>
            <p>
                Puisque ça ne s'appelle pas l'Association des REZidents pour rien, c'est au tour du pôle Rez de se présenter. 
                Vous avez déjà reçu notre mail de présentation la semaine dernière (et oui, on est des années lumières devant les autres pôles). 
                Ce qu’il faut surtout retenir, c’est que Léonard Corre, le Prez Rez, et les trois VP Rez Alexandre Couret, Guillaume Raysseguier et Clément Franey sont là pour représenter les résidents devant CESAL, et ramener la Poly à la maison. (RIP)
            </p></article>
            <img class="prez" src="/img_poles/Rez.jpg" width="100%" height="auto">

            <div class="separator"></div>
            
            <article class="pole">
            <h2 id="qom">🧠 VP Qom 🧠</strong></h2>
            <p>
                Qom prévu le meilleur pour la fin, le Qoeur de l'AdR, le pôle qui fait tourner le Qampus, finalement j'ai nommé le pôle Qom. Nous faisons des visuels pour tous nos évènements genre soirées (quand y en aura), par des tentures, affiches, flyers, aQQompagnés de toute la QommuniQation qui en déQoule (fb, insta, snap, linkdIn, chatroulette, etc.). On en profite pour sharker quelques entreprises au passage :)
        On fait aussi dans l'import-export de tentures (et la peinture qui va aveQ), que l'on vous fournira à un prix Qordial ;) 
        Nous sommes désolés pour l'othographe, on a quelques problèmes de Q à régler
            </p></article>
            <img class="prez" src="/img_poles/Qom.jpg" width="100%" height="auto">

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
                display_buttons(5)
            ?>
            <!-- <button onclick="showPanel(0)">2020</button>
            <button onclick="showPanel(1)">2019</button>
            <button onclick="showPanel(2)">2018</button>
            <button onclick="showPanel(3)">2016</button> -->
        </div>
        <div class="tabPanel">2020</div>
        <div class="tabPanel" id="2019">
            <h1>AdR 2019</h1>
            <img src="Vieux/2019/Buro.jpeg" >
            <img src="Vieux/2019/Ptit dej.jpeg" >
            <img src="Vieux/2019/Bar.jpeg" >
            <img src="Vieux/2019/CQ.jpeg" >
            <img src="Vieux/2019/Khoôpé.jpeg" >
            <img src="Vieux/2019/Soirée.jpeg" >
            <img src="Vieux/2019/Qom.jpeg" >
            <img src="Vieux/2019/Khâfet.jpeg" >
            <img src="Vieux/2019/Rez.jpeg" >
        </div>
        <div class="tabPanel">2018</div>
        <div class="tabPanel">2017</div>
    </div>
    <?php include "../included/footer.php" ?>
    <script src="/app.js"></script>
</body>
</html>