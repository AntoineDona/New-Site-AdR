<?php
date_default_timezone_set('Europe/Paris');
$current_date_sec = (((date('d') - 1) * 24 + date('H')) * 60 + date('i')) * 60 + date('s');


$shotgun_date = mktime(13, 00, 0, 9, 26, 2022);
$shotgun_date_sec = (((date('d', $shotgun_date) - 1) * 24 + date('H', $shotgun_date)) * 60 + date('i', $shotgun_date)) * 60 + date('s', $shotgun_date);

function display_btn($date, $shotgun, $soldout)
{
  if (!$soldout) {
    if (true) {
?>
      <a class="achat" href="https://billetterie.pumpkin-app.com/372788255-quadrabang" target="_blank">
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
  
</body>

</html>