<?php
date_default_timezone_set('Europe/Paris');
$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');


$shotgun_date = mktime(13, 0, 0, 10, 2, 2023);
$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

function display_btn($date, $shotgun, $soldout)
{
  if (!$soldout) {
    if (true) {
?>
      <a class="achat" href="https://collecte.io/quadrabang-2022-1944274/fr" target="_blank">
        <button>SHOTGUN</button>
      </a>
    <?php
    } else {
    ?>
      <a class="indisponible" href="">
        <button>INDISPONIBLE</button>
      </a>
    <?php
    }
  } else {
    ?>
    <a class="indisponible" href="">
      <button>SOLDOUT</button>
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
  <meta property="og:image" content="https://adr.cs-campus.fr/quadrabang/img/quadrabang.jpg" />
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="img/icon.png" />
</head>

<script type="text/javascript" src="script.js"></script>

<body onload="onLoad()">
  <div class="loading_page">
    <img src="img/logo_blanc_petit.png" class="loader" />
  </div>
  <div class="parallax_group" id="parallax">
    <nav id="navbar">
      <div class="logo_quadra">
        <a href="#hero"><img src="img/banniere.png" alt="" /></a>
      </div>
      <ul class="nav-links" id="nav-links">
        <li class="nav-item">
          <a href="#quadrabang" class="nav-link">QuadraBang</a>
        </li>
        <li class="nav-item">
          <a href="#billetterie" class="nav-link">Billetterie</a>
        </li>
        <li class="nav-item">
          <a href="#navettes" class="nav-link">Navettes</a>
        </li>
        <li class="nav-item">
          <a href="#partners" class="nav-link">Partenaires</a>
        </li>
        <li class="nav-item">
          <a href="#informations" class="nav-link">Informations</a>
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
        <h3>Le QuadraBang débute dans :</h3>
        <div id="counter" style="grid-area: bottom">
          <div style="grid-area: d_top">00</div>
          <div style="grid-area: h_top">00</div>
          <div style="grid-area: m_top">00</div>
          <div style="grid-area: s_top">00</div>
          <div style="grid-area: d_bottom; font-size: 1.3rem">jour(s)</div>
          <div style="grid-area: h_bottom; font-size: 1.3rem">heure(s)</div>
          <div style="grid-area: m_bottom; font-size: 1.3rem">minute(s)</div>
          <div style="grid-area: s_bottom; font-size: 1.3rem">seconde(s)</div>
        </div>
      </div>
      <section class="quadrabang" id="quadrabang">
        <h2>LE QUADRABANG</h2>
        <div class="ctnr">
          <p class="desc_quadra">
            Le QuadraBang, c'est 4 salles et 4 ambiances avec des scènes
            incroyables pour vous faire voyager toute la soirée ! RDV le 13 octobre
            pour enflammer le dance floor avec plus de 3500 étudiants,
            en attendant voici un petit teaser pour vous faire
            patienter...
          </p>
          <div class="trailer_ctnr">
            <video controls poster="img/poster.jpg" width="100%">
              <source src="teaser_quadrabang_2022" type="video/mp4" />
              Sorry, your browser doesn't support embedded videos.
            </video>
          </div>
        </div>
      </section>
      <section class="billetterie" id="billetterie">
        <h2>BILLETTERIE</h2>
        <p>La billetterie du QuadraBang ouvre le lundi 2 octobre à 13h pour tout le monde.
          <br />Le paiement se fait via Lydia ou par CB.</p>
        <div class="content-divided" style="padding:1rem 0;">
        <div>
          <div class="billet rose">
            <div class="billet_nom"><p>Cotisant</p></div>
            <div class="billet_prix"><p>10€</p></div>
            <div class="billet_info"><p>
              Tarif cotisant AdR
              <br/>2 consos offertes
              <br/>Vestiaire gratuit</p>
            </div>
          </div>
          <div class="billet bleu">
            <div class="billet_nom"><p>Extérieur</p></div>
            <div class="billet_prix"><p>17€</p></div>
            <div class="billet_info"><p>
              Tarif classique
              <br/>2 consos offertes
              <br/>Vestiaire gratuit</p>
            </div>
          </div>
        </div>
        <div style="display:flex;align-items:center;justify-content:center;"><div><a class="bouton" href="">ACHETER <i class="fa-solid fa-angles-right" style="margin:0;"></i></a></div></div>
        </div>
        <p>Les CGV et la charte du participant sont consultables <a href="cgv_quadrabang.pdf">ici</a>.</p>
        <!-- partie pour tester si la personne est cotisante
          <div class="cotisant" id="cotisant">
          <h4>Vérifie ton adresse de cotisant ici:</h4>
          <form action="index.php#cotisant">
            <input id="email" name="email" type="text" placeholder="mon email centralesupélec" />
            <input id="submit" type="submit" value="Vérifier">
          </form>
          <p>
            <?php
            if (isset($_GET["email"])) {
              if (is_cotisant($_GET["email"], $pdo)) {
                echo "✅ Tu es bien cotisant ✅";
              } else {
                echo "⚠️ Tu n'es pas cotisant ⚠️";
              }
            }
            ?>
          </p>

        </div> -->
      </section>
      <section class="billetterie" id="navettes">
        <h2>NAVETTES</h2>
        <p>Nous mettons en place des navettes retours gratuites depuis la soirée :
          <br/>
          <br />plus d'informations à venir...
        </p>
      </section>
      <section class="partenaires" id="partners">
        <h2>PARTENAIRES</h2>
        <div class="partner_ctnr">
          <a href="https://mabanque.bnpparibas/" target="_blank">
            <img src="img/bnp.png" alt="" />
          </a>
          <a href="https://https://www.lydia-app.com/" target="_blank">
            <img src="img/lydia.png" alt="" />
          </a>
          <a href="https://www.sbcs-events.fr" target="_blank">
            <img src="img/sbcs.png" alt="" />
          </a>
          <a href="https://www.facebook.com/asso.pascal.cs" target="_blank">
            <img src="img/pascal.png" alt="" />
          </a>
          <a href="https://capese.cs-campus.fr/" target="_blank">
            <img src="img/capese.png" alt="" />
          </a>
          <a href="https://galerie.pics/" target="_blank">
            <img src="img/pics.png" alt="" />
          </a>
          <a href="https://hyris.tv/" target="_target">
            <img src="img/hyris.png" alt="" />
          </a>
        </div>
      </section>
      <section class="informations" id="informations">
        <h2>INFORMATIONS</h2>
        <p>
          Pour être au courant de toutes les mises à jour de la soirée suivez l'
          <a href="" target="_blank">évènement Facebook</a>.
          <br />
          <br />Vestiaire gratuit
          <br /><i class="fa-solid fa-triangle-exclamation fa-beat"></i> Carte étudiante et ecocup obligatoires <i class="fa-solid fa-id-card"></i>
          <br />
          <br />Les organisateurs se réservent le droit d’entrée. <i class="fa-solid fa-door-open"></i></p>
        <h3>ACCÈS</h3>
            <p>
              École CentraleSupélec
              <br />3 rue Joliot Curie
              <br />91190 Gif-sur-Yvette
              <br />
              <br />Comment s'y rendre ?
              <br/>
              <br/>via le RER B <i class="fa-solid fa-train-subway"></i></p>
            <ul style="padding: 0.7rem 0; text-align:left;">
              <li>station Massy-Palaiseau prendre le bus 91.06 ou 91.10</li>
              <li>station Le Guichet prendre le bus 9</li>
            </ul>
            <p>jusqu'à l'arrêt Joliot-Curie ou Moulon <i class="fa-solid fa-location-dot"></i>
            <br />
            <br />Pour le retour nous mettons en place des <a href="#page_link">navettes gratuites</a>.
            </p>
        <h3>CONTACT</h3>
        <div class="content-divided">
          <div>
            <a href="https://adr.cs-campus.fr" style="text-decoration: none;">
              <i class="fa-solid fa-house"></i>
              adr.cs-campus.fr
            </a>
          </div>
          <div>
            <a href="https://www.instagram.com/adr.cs/" style="text-decoration: none;">
              <i class="fa-brands fa-instagram"></i>
              @adr.cs
            </a>
          </div>
          <div>
            <a href="https://www.facebook.com/adr.centralesupelec/" style="text-decoration: none;">
              <i class="fa-brands fa-facebook-f"></i>
              AdR CentraleSupélec
            </a>
          </div>
        </div>
    </div>
  </div>
  <script src="../js/love.js"></script>
  <script src="https://kit.fontawesome.com/6ede126102.js" crossorigin="anonymous"></script>
  <script>
    let loading_page = document.querySelector('.loading_page');
    setTimeout(() => {
      loading_page.style.opacity = '0';
      setTimeout(() => {
        loading_page.style.visibility = 'hidden';
      }, 500)
    }, 2000)
  </script>
</body>

</html>