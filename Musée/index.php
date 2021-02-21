<?php $page = 'home' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Musée/style.css">
    <script defer src="/Musée/app.js"></script>
    <title>Le Musée</title>
</head>

<body>
    <?php include "included/header.php" ?>
    <main>
        <section class="hero">
            <h1>Le Musée</h1>
        </section>
        <section class="apropos">
            <div class="cadre">
                <div class="a_propos">
                    <h1>A propos</h1>
                    <div class="separateur"></div>
                    <p>Le Musée est le bar de l'école CentraleSupélec. <br>
                        Il a ouvert pour la première fois en 2018 lors de la fusion des écoles Centrale Paris et Supéle. <br>
                        Il est aujourd'hui tenu par les membres du bureau de l'Association des Résidents de CentraleSupélec (AdR) qui y servent matin, midi et soirs des mets allant du Wrap à la pizza, sans oublier la bière!
                    </p>
                    <a href="apropos.php"><button>En savoir plus</button></a>
                </div>
            </div>
            <div class="illustration_container"></div>
        </section>
    </main>
    <footer>
    </footer>
</body>

</html>