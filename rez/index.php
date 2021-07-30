<?php $page = 'Rez' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <?php include "../included/meta.php" ?>
    <link rel="stylesheet" href="style.css">

    <title>Infos ReZ - AdR CentraleSupélec (AdRCS)</title>
</head>

<body>
    <?php include "../included/header.php" ?>
    <main>
        <section class="hero rez">
            <h1>La REZ</h1>
        </section>
        <section class="FAQ">
            <h1>FAQ de la ReZ</h1>

            <!-- <p>Voici la FAQ qui répertorie les questions les plus fréquentes. Elle sera mise à jour régulièrement. 
            Si vous rencontrez un problème qui n'est pas mentionné ici, ou pour toute autre question, 
            vous pouvez nous contacter sur <a href="https://www.facebook.com/adr.centralesupelec">Facebook</a>, ou contacter directement Cesal</p> -->

            <div class="container-faq">

                <div class="questions">
                    <div class="visible-pannel">
                        <h2>Quand se font les réservations à Césal pour les première année (GPA) ?</h2>
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="toggle-pannel">
                        <p>Le 5 Août (horaire non déterminé pour l’instant)</p>
                    </div>
                </div>

                <div class="questions">
                    <div class="visible-pannel">
                        <h2>Comment créer son compte ?</h2>
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="toggle-pannel">
                        <p>Il faut aller dans “activer mon compte” sur <a href="https://logement.cesal.fr/espace-resident/cesal_login.php">cesal.fr</a>
                            et utiliser son adresse mail utilisée pour SCEI si vous n’avez pas encore votre adresse student-cs </p>
                    </div>
                </div>

                <div class="questions">
                    <div class="visible-pannel">
                        <h2>Quelles sont les pièces à fournir pour le dossier de réservation ?</h2>
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="toggle-pannel">
                        <p style="font-weight: bold;">Il faut donner dans les 48h:</p>
                        <ul>
                            <li>un scan de sa pièce d’identité</li>
                            <li>un avis d’imposition de son garant</li>
                            <li>un scan de la pièce d’identité de son garant</li>
                        </ul>
                        <p style="font-weight: bold;">Ensuite, il faudra fournir:</p>
                        <ul>
                            <li>un certificat de scolarité ou pour le remplacer un screenshot prouvant que vous entrez en première année à CentraleSupélec</li>
                            <li>une attestation d’assurance pour votre logement</li>
                            <li>un document prouvant votre domicile principal (parents, famille) type crédance de loyer ou facture eau/électricité/téléphone récente</li>
                        </ul>
                        </p>
                    </div>
                </div>

                <div class="questions">
                    <div class="visible-pannel">
                        <h2>Je n’ai pas la possibilité d’avoir un garant. Que faire ?</h2>
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="toggle-pannel">
                        <p>Il existe des sites comme <a href="https://www.garentme.fr/">garentme.fr</a> permettant d’obtenir un garant.</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- <section class="maintenance">
            <div class="container">
                En cours de construction
            </div>
        </section> -->
    </main>
    <?php include "../included/footer.php" ?>
    <script src="/app.js"></script>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
</body>

</html>