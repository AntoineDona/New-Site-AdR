<?php $page = 'home';
session_start();?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "included/meta.php" ?>
    <!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Restaurant",
            "name": "Le Musée",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "1 rue Joliot Curie",
                "addressLocality": "Gif-sur-Yvette",
                "addressRegion": "Ile-de-France",
                "addressCountry": "France",
                "postalCode": "91190"
            },
            "menu": "https://adr.cs-campus.fr/musee/menu",
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": {
                    "@type": "DayOfWeek",
                    "name": "Lundi - Vendredi"
                }
            },
            "url": "https://adr.cs-campus.fr/musee/index.php"
        }
    </script>
    <title>Le Musée - AdR CentraleSupélec (AdRCS)</title>
</head>

<body>
    <?php include "included/header.php" ?>
    <main>
        <section class="hero accueil">
            <h1>Le Musée</h1>
        </section>
        <section class="smallapropos musee">
            <div class="cadre">
                <h1>A propos</h1>
                <div class="separateur"></div>
                <p>Le Musée est le bar-cafétaria de l'école CentraleSupélec. <br>
                    Il a ouvert en 2018 lors de la fusion des écoles Centrale Paris et Supélec. <br>
                    Il est aujourd'hui tenu par les membres de l'Association des Résidents de CentraleSupélec (AdR) <br> qui y servent matin, midi et soirs des mets allant du Wrap à la Pizza, sans oublier la Bière!
                </p>
                <a href="apropos.php"><button>En savoir plus</button></a>
            </div>
            <div class="illustration_container"></div>
        </section>
        <!-- <section class="smallapropos menu">
            <div class="cadre">
                <h1>Le Menu</h1>
                <div class="separateur"></div>
                <p>Le Musée est le bar de l'école CentraleSupélec. <br>
                    Il a ouvert pour la première fois en 2018 lors de la fusion des écoles Centrale Paris et Supéle. <br>
                    Il est aujourd'hui tenu par les membres du bureau de l'Association des Résidents de CentraleSupélec (AdR) qui y servent matin, midi et soirs des mets allant du Wrap à la pizza, sans oublier la bière!
                </p>
                <a href="apropos.php"><button>Découvre le Menu</button></a>
            </div>
            <div class="illustration_container"></div>
        </section>
        <section class="smallapropos commander">
            <div class="cadre">
                <h1>Commander</h1>
                <div class="separateur"></div>
                <p>Le Musée est le bar de l'école CentraleSupélec. <br>
                    Il a ouvert pour la première fois en 2018 lors de la fusion des écoles Centrale Paris et Supéle. <br>
                    Il est aujourd'hui tenu par les membres du bureau de l'Association des Résidents de CentraleSupélec (AdR) qui y servent matin, midi et soirs des mets allant du Wrap à la pizza, sans oublier la bière!
                </p>
                <a href="apropos.php"><button>Commander</button></a>
            </div>
            <div class="illustration_container"></div>
        </section> -->
    </main>
    <?php include "included/footer.php" ?>
</body>

</html>