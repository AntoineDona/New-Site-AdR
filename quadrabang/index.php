<?php
date_default_timezone_set('Europe/Paris');
$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');

$shotgun_date = mktime(1, 32, 0, 9, 25, 2021);
$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

$shotgun_date2 = mktime(12, 0, 0, 9, 27, 2021);
$shotgun_date_sec2 = (((date('d', $shotgun_date2) - 1) * 24 + date('H', $shotgun_date2)) * 60 + date('i', $shotgun_date2)) * 60 + date('s', $shotgun_date2);

function display_btn($date, $shotgun)
{
  if ($date >= $shotgun) {
?>
    <a class="achat" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
      <button>ACHETER</button>
    </a>
  <?php
  } else {
  ?>
    <a class="indisponible" href="">
      <button>INDISPONIBLE</button>
    </a>
<?php
  }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8; IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>QuadraBang</title>

  <meta name="google-site-verification" content="cEbrs-eyoHMLzEcQwiEu5sHkC8N61J92Z_fElR1KTMQ" />
  <meta property="og:image" content="img/quadrabang.png" />
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="img/logo.png" />
</head>

<script type="text/javascript" src="script.js"></script>

<body onload="onLoad()">
  <div class="loading_page">
    <img src="img/logo_blanc_petit.png" class="loader" />
  </div>
  <div class="parallax_group" id="parallax">
    <nav id="navbar">
      <div class="logo_quadra">
        <a href="#hero"><img src="img/quadra&logo.png" alt="" /></a>
      </div>
      <ul class="nav-links" id="nav-links">
        <li class="nav-item">
          <a href="#quadrabang" class="nav-link">Quadrabang</a>
        </li>
        <li class="nav-item">
          <a href="#billeterie" class="nav-link">Billeterie</a>
        </li>
        <li class="nav-item">
          <a href="#partners" class="nav-link">Partenaires</a>
        </li>
        <!-- <li class="nav-item">
            <a href="#teaser" class="nav-link">Galerie</a>
          </li> -->
        <li class="nav-item">
          <a href="#informations" class="nav-link">Infos pratiques</a>
        </li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
    <div class="parallax_layer base_layer"></div>
    <div class="parallax_layer mid_layer"></div>
    <div class="parallax_layer top_layer"></div>
    <div class="main">
      <div class="quadra" id="hero"></div>
      <div class="counter_wrapper">
        <h3>Le Quadrabang débute dans :</h3>
        <div id="counter" style="grid-area: bottom">
          <div style="grid-area: d_top">00</div>
          <div style="grid-area: h_top">00</div>
          <div style="grid-area: m_top">00</div>
          <div style="grid-area: s_top">00</div>
          <div style="grid-area: d_bottom; font-size: 20%">jour(s)</div>
          <div style="grid-area: h_bottom; font-size: 20%">heure(s)</div>
          <div style="grid-area: m_bottom; font-size: 20%">minute(s)</div>
          <div style="grid-area: s_bottom; font-size: 20%">seconde(s)</div>
        </div>
      </div>
      <section class="quadrabang" id="quadrabang">
        <h3>LE QUADRABANG</h3>
        <div class="ctnr">
          <p class="desc_quadra">
            Après une édition annulée, le Quadrabang 2k21 revient en force le 8 octobre de 23h à 5h
            pour une soirée mémorable !
            Le Quadrabang, c'est 4 salles et 4 ambiances avec des scènes
            incroyables pour vous faire voyager toute la soirée ! RDV le 8
            Octobre pour enflammer le dance floor avec plus de 2500 étudiants
            ! 🔥 En attendant voici un petit Recap du Quadra 2019 pour vous faire
            patienter...
          </p>
          <div class="trailer_ctnr">
            <video controls poster="img/poster.jpg" width="100%">
              <source src="https://www.youtube.com/watch?v=iMRi6l7UoKQ" type="video/mp4" />
              Sorry, your browser doesn't support embedded videos.
            </video>
          </div>
        </div>
      </section>
      <section class="billeterie" id="billeterie">
        <h3>BILLETERIE</h3>
        <div class="billet_ctnr">
          <div class="billet early">
            <h4>Early Bird</h4>
            <p class="prix">10€</p>
            <p class="tarif">Tarif réduit limité</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Dimanche 26 septembre 12:00</p>
            <?php
            display_btn($current_date_sec, $shotgun_date_sec);
            ?>
          </div>
          <div class="billet normal">
            <h4>Normal</h4>
            <div class="prix">15€</div>
            <p class="tarif">Tarif normal</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Lundi 27 septembre 12:00</p>
            <?php
            display_btn($current_date_sec, $shotgun_date_sec);
            ?>
          </div>
          <div class="billet CS">
            <h4>Cotisant AdR</h4>
            <div class="prix">10€</div>
            <p class="tarif">Tarif réservé aux cotisants AdR</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Lundi 27 septembre 12:00</p>
            <?php
            display_btn($current_date_sec, $shotgun_date_sec);
            ?>
          </div>
        </div>
      </section>
      <section class="partenaires" id="partners">
        <h3>PARTENAIRES</h3>
        <div class="partner_ctnr">
          <a href="https://mabanque.bnpparibas/" target="_blank">
            <img src="img/bnp.png" alt="" />
          </a>
          <a href="https://www.pumpkin-app.co" target="_blank">
            <img src="img/Pumpkin_blanc.png" alt="" />
          </a>
          <a href="https://www.sbcs-events.fr" target="_blank">
            <img src="img/SBCS.png" alt="" />
          </a>
          <a href="https://www.facebook.com/asso.pascal.cs" target="_blank">
            <img src="img/Pascal_blanc.png" alt="" />
          </a>
          <a href="https://hyris.tv/" target="_target">
            <img src="img/Logo_Hyris_B.png" alt="" />
          </a>
          <a href="https://galerie.pics/" target="_blank">
            <img src="img/Pics.png" alt="" />
          </a>
        </div>
      </section>
      <!-- <section class="recap" id="recap">
          <h3>GALERIE</h3>
          <video controls poster="img/poster.jpg" width="800">
            <source src="recap-quadrabang-2019.mp4" type="video/mp4" />
            Sorry, your browser doesn't support embedded videos.
          </video>
        </section> -->
      <section class="informations" id="informations">
        <h3>Informations</h3>
        <p class="infos">
          Pour suivre toutes les mises à jour de l'évènement :
          <a href="https://www.facebook.com/events/410055527219768" target="_blank"><i>Evenement Facebook</i></a>
          <br /><br />
          <strong>Ecole CentraleSupélec</strong><br />
          __________<br /><br />
          <b>· 1-3 rue joliot curie, 91190 gif-sur-yvette ·</b>
        </p>
        <!-- <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7361.06284246243!2d2.161033597340614!3d48.709911520161754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67745e24d0f51%3A0x8cd75b7cb52a1f8c!2sCentraleSup%C3%A9lec%20-%20Universit%C3%A9%20Paris-Saclay!5e0!3m2!1sfr!2sfr!4v1632275418984!5m2!1sfr!2sfr"
              width="600"
              max-width="90%"
              height="400"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
            ></iframe> -->
        <h4>ACCES</h4>
        <ul>
          <li>via le RER B (arrêt le guichet)</li>
          <li>
            via les bus 91.06 ou 91.10 <br> depuis massy-palaiseau (arrêt
            joliot-curie)
          </li>
        </ul>
        <p>
          <strong>Vestiaire gratuit</strong><br />
          <strong>Navettes gratuites disponibles</strong><br />
          __________<br /><br />
          Pass Sanitaire obligatoire | carte étudiante obligatoire <br />
          l’organisation se réserve le droit d’entrée<br /><br />
          contact :
          <a href="https://www.facebook.com/adr.centralesupelec/" target="_blank"><i>facebook.com/adr.centralesupelec/</i></a><br />
        </p>
      </section>
    </div>
  </div>
  <script src="../easteregg/love.js"></script>
</body>

</html>