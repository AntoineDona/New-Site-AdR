<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout AdR</title>
</head>
<style>
    label{
        font-size:1rem;
        margin : 2rem;

    }
    label,input{
        margin:1em 0;
    }
    body{
        margin : 2rem;
    }
</style>
<body>
    <!-- <?php if($_SESSION['username']=='2021goulletba'):?> -->
        <form method="post" action="ajoutAdrGestion.php">
        <label for="type-grf" >Quelle est votre pôle ?</label>
            <input type="text" multiple name="type-pole" id="type-pole" list="types-pole" required size="32">
    
            <datalist id="types-pole">
            <option value="bar"></option>
            <option value="buro"></option>
            <option value="CQ"></option>
            <option value="soirée"></option>
            <option value="P'tit dej"></option>
            <option value="Khâfet"></option>
            <option value="Qom"></option>
            <option value="Khoopé"></option>
            <option value="Eventos"></option>
            <option value="Rez"></option>
            </datalist>
    </br><label for="prenom">Donner votre prénom (si vous faites partie des doublons, précisez la première lettre du nom, ex : Bastien G) : </label><input type="text" name='prenom' required>
    </br><label for="surnom">Choisir un surnom : </label><input type="text" name='surnom' required>
    </br><label for="loginVR">Donner votre indentifiant VR : </label><input type="text" name='loginVR' required>
        </form>
    <!-- <?php else: ?>
        <p>Tu n'as pas accès à cette page, demande à ton VP Geek préféré</p>
    <?php endif;?> -->
</body>
</html>