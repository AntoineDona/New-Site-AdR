<?php session_start(); ?>
<?php include("database.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type"> 
    <title>Interface</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body style="padding-top:20vw;" class="Présence">

    <?php
    function number_place($pdo)
    {
        $query = $pdo->prepare("SELECT COUNT(*) as c from papy");
        $query->execute();
        $result = $query->fetch();
        return $result['c'];
    }

    function entree($pdo)
    {
        $query = $pdo->prepare("SELECT COUNT(*) as d from papy WHERE entree='oui'");
        $query->execute();
        $result = $query->fetch();
        return $result['d'];
    }

    ?>

    <?php $nombre = entree($pdo);
    echo "<p class=soiree>$nombre</p>"; ?>
    <h1>test</h1>

    <form style="position:fixed;top:0;width:100vw;background:#fff;box-shadow:#000 0px 0px 5px;" action="#" method="post">
        <input style="width:80vw;height:20vw;font-size:60px;font-family:'CaviarDreams';background:#fff;border-width:0;" type="text" name="pseudo" placeholder="Chercher un prenom" />
        <input style="width:16vw;height:20vw;font-size:60px;font-family:'CaviarDreams';background:url(icon-search.svg),#fff;background-size:contain;background-position:center;background-repeat:no-repeat;border-width:0;" type="submit" name="Rechercher" value=" " />
    </form>

    <style>
        .card {
            background: rgba(250, 125, 125, 0.3);
            width: 96vw;
            text-align: center;
            font-family: 'CaviarDreams';
            font-size: 60px;
            color: black;
            margin: auto;
            margin-top: 4vw;
            padding: 10px;
            border-radius: 8px;
            box-shadow: #000 0px 0px 5px;
        }

        .redcard {
            background: rgba(125, 250, 125, 0.3);
            width: 96vw;
            text-align: center;
            font-family: 'CaviarDreams';
            font-size: 60px;
            color: #000;
            margin: auto;
            margin-top: 4vw;
            padding: 10px;
            border-radius: 8px;
            box-shadow: #000 0px 0px 5px;
        }

        .input {
            font-size: 50px;
            font-family: 'CaviarDreams';
            background: #fff;
            margin: 8px;
            border-width: 0;
            border-radius: 8px;
            box-shadow: #000 0px 0px 2px;
            padding: 6px;
        }
    </style>

    <?php
    if (isset($_POST['Rechercher'])) { // Si il clique sur valider
        $_SESSION["search"] = $_POST['pseudo']; // Ici on va defenire que la session bla bla bla va être définie comme ce que il a écrit dans pseudo
        // Si tout va bien, on peut continuer
        $reponse = $pdo->query("SELECT * FROM papy WHERE prenom LIKE '" . $_SESSION["search"] . "%' ");
        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch()) {

            if ($donnees["entree"] == 'non') {
                echo '<div class="card">';
                echo $donnees["prenom"] . ' ' . $donnees["nom"] . '<br><br>';
                echo '<strong>Pas encore entré(e)</strong>';
                echo '<form action="valide.php?prenom=' . $donnees['prenom'] . '&nom=' . $donnees['nom'] . '" method="POST" class="valide">';
                echo '<input class="input" type="submit" name="valider" value="Faire entrer">';
                echo '</form>';
                echo '</div>';
            } else {
                echo '<div class="redcard">';
                echo $donnees["prenom"] . ' ' . $donnees["nom"] . '<br><br>';
                echo "<trong>DÉJÀ ENTRÉ(E)</strong>";
                echo '</div>';
            }
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
    }
    ?>


</body>

</html>