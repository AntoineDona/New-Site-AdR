<?php $page = "Events" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../included/meta.php" ?>
    <title>Nos événements - AdR CentraleSupélec (AdRCS)</title>
</head>

<body>
    <?php include "../included/messenger.php" ?>
    <?php include "../included/header.php" ?>
    <main>
        <section class="hero events">
            <!-- <a href="https://www.cyberpunk.net/fr/fr/" target="_blank">
                <img src="../images/lien_de_resa.png" alt="resa" id="lien_resa">
            </a> -->
            <div class="container">
                <h1 class="headline"> Nos Events</h1>
            </div>
            <a href="/christmasbang/" id="lien_resa">Lien du Christmas Bang</a>
        </section>
        <section class="to_come">
            <h2>Evenements à venir</h2>
            <div class="event">
                <div class="background" id="christmasbang"></div>
                <div class="content">
                    <div class="event_img">
                    </div>
                    <div class="infos">
                        <h3>Christmas Bang</h3>
                        <h4 class="date">Vendredi 17 décembre</h4>
                        <p>❄️All I want for Christmas is a Bang❄️<br/>
                        🎅🏻Le père Noël existe, et cette année il sera à Gif le 17 décembre🎅🏻</p>
                        <a href="/christmasbang/">lien du site</a>
                    </div>
                </div>

            </div>
        </section>
        <section class="old_events">
            <h2>Evenements passés</h2>
            <div class="event">
                
            </div>
        </section>
    </main>
    <?php include "../included/footer.php" ?>
    <script src="/app.js"></script>
</body>

</html>