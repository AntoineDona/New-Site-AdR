<?php
date_default_timezone_set('Europe/Paris');
$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');


$shotgun_date = mktime(13, 0, 0, 9, 26, 2022);
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
          <a href="#billetterie" class="nav-link">Billetterie</a>
        </li>
        <li class="nav-item">
          <a href="#navettes" class="nav-link">Navettes</a>
        </li>
        <li class="nav-item">
          <a href="#partners" class="nav-link">Partenaires</a>
        </li>
        <li class="nav-item">
            <a href="#teaser" class="nav-link">Galerie</a>
          </li>
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
            Le Quadrabang, c'est 4 salles et 4 ambiances avec des scènes
            incroyables pour vous faire voyager toute la soirée ! RDV le 7
            Octobre pour enflammer le dance floor avec plus de 3000 étudiants
            ! 🔥 En attendant voici un petit Teaser pour vous faire
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
        <h3>BILLETTERIE</h3>
        <p class="infos_billetterie" style="text-indent: 6rem">La billetterie du QuadraBang 2022 ouvre lundi 26 à 13h pour tout le monde. Le paiement se fera par LYDIA ou par CB. Nous aimerions préciser quatre points: </p>
        <!-- <p class="infos_billetterie">🎁 Grâce à notre partenariat avec Pumpkin, pour toute ouverture de compte avec le code QUADRA21, gagnez 15€ lors de la première utilisation de votre carte Pumpkin🥳 </p> -->
        <p class="infos_billetterie">🆔 Pour payer avec Lydia, vous devrez au préalable avoir validé votre identité! Faites le dès maintenant. Un conseil : si vous rencontrez des problèmes à la faire valider, il faut essayer avec une autre pièce d’identité😌</p>
        <p class="infos_billetterie">⏰ Lors du shotgun, vous serez beaucoup à vous connecter en même temps. Les temps d’attente pourront monter jusqu’à 1h, pas d’inquiétude il y aura de la place pour [presque] tout le monde🤡</p>
        <p class="infos_billetterie">Une fois que votre place est prise, vous aurez 30min pour payer, passé ce délais elle sera remise en vente. Ainsi, si le site Lydia affiche sold out, restez à l’affût pour récupérer ces places🤙🏼</p>
        <div class="billet_ctnr">
          <div class="billet normal">
            <h4>Normal</h4>
            <div class="prix">15€</div>
            <p class="tarif">Tarif normal</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Lundi 26 septembre 13:00</p>
            <?php
            display_btn($current_date_sec, $shotgun_date_sec, false);
            ?>
          </div>
          <div class="billet CS">
            <h4>Cotisant AdR</h4>
            <div class="prix">10€</div>
            <p class="tarif">Tarif réservé aux cotisants AdR</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Lundi 26 septembre 13:00</p>
            <?php
            display_btn($current_date_sec, $shotgun_date_sec, false);
            ?>
          </div>
        </div>
        <p class="infos_billetterie" style="text-indent: 6rem; text-align:center; margin-top:5px">Les CGV / charte du participant sont consultables <a href="/quadrabang/charteQuadraSignee.pdf" style="color: rgb(242, 242, 242);">ici</a></p>
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
        <h3>Navettes</h3>
        <p class="infos_billetterie" style="text-indent: 6rem; text-align:center">Des navettes gratuites vous sont mises à disposition depuis les grandes écoles et Paris</p>
        <div class="billet_ctnr">
          <div class="billet">
            <h4>Denfert Rochereau</h4>
            <p class="horaire">Horaires:</p>
            <p class="horaires">Retour : 3h40 & 5h10</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Vendredi 30 septembre 13:00</p>
            <a class="achat" href="https://collecte.io/navettes-quadrabang-1977710/fr">
              <button>RESERVER</button>
            </a>
          </div>
          <div class="billet">
            <h4>Massy (RER B)</h4>
            <p class="horaire">Horaires:</p>
            <p class="horaires">Aller : 00h00 </p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Vendredi 30 septembre 13:00</p>
            <a class="achat" href="https://collecte.io/navettes-quadrabang-1977710/fr">
              <button>RESERVER</button>
            </a>
          </div>
          <div class="billet">
            <h4>Polytechnique</h4>
            <p class="horaire">Horaires:</p>
            <p class="horaires">Aller : 00h45 </p>
            <p class="horaires">Retour : 3h00 & 5h10</p>
            <p class="ouverture">Disponible à partir du:</p>
            <p class="date_ouverture">Vendredi 30 septembre 13:00</p>
            <a class="achat" href="https://collecte.io/navettes-quadrabang-1977710/fr">
              <button>RESERVER</button>
            </a>
          </div>
        </div>
      </section>
      <section class="partenaires" id="partners">
        <h3>PARTENAIRES</h3>
        <div class="partner_ctnr">
          <a href="https://mabanque.bnpparibas/" target="_blank">
            <img src="img/bnp.png" alt="" />
          </a>
          <a href="https://https://www.lydia-app.com/" target="_blank">
            <img src="img/lydiaBlanc.png" alt="" />
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
          <a href="https://capese.cs-campus.fr/" target="_blank">
            <img src="img/logoCapese.png" alt="" />
          </a>
        </div>
      </section>
      <section class="informations" id="informations">
        <h3>Informations</h3>
        <p class="infos">
          Pour suivre toutes les mises à jour de l'évènement :
          <a href="https://www.facebook.com/events/646677986684439" target="_blank"><i>Evenement Facebook</i></a>
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
          <strong>Navettes gratuites disponibles depuis Paris et les grandes écoles</strong><br />
          __________<br /><br />
          Carte étudiante obligatoire <br />
          l’organisation se réserve le droit d’entrée<br /><br />
          contact :
          <a href="https://www.facebook.com/adr.centralesupelec/" target="_blank"><i>facebook.com/adr.centralesupelec/</i></a><br />
        </p>
      </section>
    </div>
  </div>
  <script src="../js/love.js"></script>
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