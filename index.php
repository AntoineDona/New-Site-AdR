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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> 
    <title>NAVIGATION</title>
</head>
<body>
    <?php include "included/header.php" ?>
    <section class="hero" id="hero">
        <div class="container">
            <div class="imgt">
                <img src="images/adr_anim.svg">
            </div>
            <h1 class="headline" id="A">A</h1><h1 class="headline">ssociation </h1> <h1 class="headline" id="d">d</h1><h1 class="headline">es </h1> <h1 class="headline" id="R"> R</h1><h1 class="headline">ésidents de CentraleSupélec</h1>
            <div class="headline-description">
                <div class="separator">
                    <div class="line line-left"></div>
                    <div class="heart"><i class="fas fa-heart"></i></div>
                    <div class="line line-right"></div>
                </div>
                <div class="single-animation">
                    <h5>Toujours là pour vous faire kiffer</h5>
                    <a href="#" class="btn cta-btn">Nous découvrir</a>
                </div>
            </div>
        </div>
    </section>
    <section class="evenements">
        <div class="container">
            <div class="info">
                <div class="evenements-description padding-right animate-left">
                    <div class="global-headline">
                        <h1 class="sub-headline titre">
                            Soirées
                        </h1>
                    </div>
                    <div class="separator">
                        <div class="line line-left"></div>
                        <div class="heart"><i class="fas fa-heart"></i></div>
                        <div class="line line-right"></div>
                    </div>
                    <p class="evenement-info">
                        Nous sommes spécialisés dans l'organisation de soirées étudiantes. Ces soirées sont reconnues dans la France entière depuis des décennies. Le Quadrabang en est l'exemple parfait (l'édition 2019 a réuni près de 3000 personnes!).
                    </p>
                    <a href="#" class="btn body-btn">Nos prochains évènements</a>
                </div>
                <div class="evenements-info-img animate-right">
                    <img src="images/soirée.jpg" alt="" id="soiree">
                </div>
            </div>
        </div>
    </section>
    <!--Section soirée-->
    <section class="famille between">
        <div class="container">
            <div class="global-headline">
                <h1 id="titre-famille" class="sub-headline titre animate-bottom">
                    
                </h1>
                <video src="Perms_Rez.mpeg"></video>
            </div>
        </div>
    </section>
    <script src="app.js"></script>
</body>
</html>