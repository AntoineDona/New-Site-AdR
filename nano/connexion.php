<?php
session_start();

if (isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]) {
    echo "Connecté : ";
    // Pour voir plus de données disponibles, voir la documentation
    // sur auth.viarezo.fr
    //echo $_SESSION["user"]["login"];
    $_SESSION["prenom"] = $_SESSION["user"]["firstName"];
    $_SESSION["nom"] = $_SESSION["user"]["lastName"];
    echo $prenom . " " . $nom;
    header("Location: https://adr.cs-campus.fr/nano/index.php?nom=" . $nom . "&prenom=" . $prenom);
}
?>

<!DOCTYPE html>
<html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>EQUINANOXE</title>
    <link rel="icon" type="image/png" href="img/adr_ico.png" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<?php include("script.php"); ?>

<body onload="onLoad()">

    <div id="holder">
        <div id="counter">
            <div style="grid-area: d_top;">00</div>
            <div style="grid-area: h_top;">00</div>
            <div style="grid-area: m_top;">00</div>
            <div style="grid-area: s_top;">00</div>
            <div style="grid-area: d_bottom; font-size:20%;">jour(s)</div>
            <div style="grid-area: h_bottom; font-size:20%;">heure(s)</div>
            <div style="grid-area: m_bottom; font-size:20%;">minute(s)</div>
            <div style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>
        </div>
        <div id="link" style="opacity:0;" href="#">
            <a class='connexion' href='redirect.php?redirect=https://adr.cs-campus.fr/nano/index.php'>Se connecter</a>
        </div>
    </div>

    <div class="connexion">
        <?php
        echo($_SESSION["isConnected"]);
        if (isset($_SESSION["isConnected"])) {
            if (!$_SESSION["isConnected"]) {
                echo "<p class= 'connexion'>Tu n'es pas encore connecté, pour shotgun une place au Nano il faut te connecter :</p> ";
                // Se connecter
                echo "<a class= 'connexion' href='redirect.php?redirect=/nano/index.php'>Se connecter</a>";
            }
        }
        ?>
    </div>
</body>

</html>