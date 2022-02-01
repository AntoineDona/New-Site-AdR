<?php 
session_start();
$page='ajout girafe';
$girafes=$_SESSION['girafe'];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style_girafe.css">
    <title>Ajouter une girafe</title>
</head>
<body>
    <?php include 'header.php' ?> 
    <div id="form-ajouter-grf" >
    <form method="post" action="gestion_ajout_girafe.php" >
        <!-- bouton de nombre de chasseur -->
        <p >Nombre de personne non AdR : <br/></p>
        <input type="number" name="counter_nadr" required="required" value="0" min='0' id='button-nadr' >
        <p>
            Sélectionnez les chasseurs :<br />
            <!-- autre facon de le faire : https://developer.mozilla.org/fr/docs/Web/HTML/Attributes/multiple -->
            <?php
            foreach($girafes as $girafe){
                echo '<input type="checkbox" name="'.$girafe['prénom'].'" id="'.$girafe['prénom'].'" class="check-with-label" /> <label for="'.$girafe['prénom'].'" class="label-for-check" >'.$girafe['prénom'].'</label><br />';
            }
            ?>
        </p>
        <label for="type-grf">Quelle est votre girafe ?</label>
        <input type="text" multiple name="type-grf" id="type-grf" list="2-types-grf" required size="64">

        <datalist id="2-types-grf">
        <option valeur="17">Girafe de kro - 17€</option>
        <option valeur="22">Girafe haut de gamme - 22€</option>
        </datalist>

        <input type="submit" value="Partager la girafe">
    </form>
    <?php 
    if(isset($_SESSION['incorrect_grf']) and $_SESSION['incorrect_grf']){
        echo '<p style="color:red">'.$_SESSION['message'].'</p>';
    }
    ?>
    </div>
    
    
</body>
</html>