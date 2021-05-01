<?php include "secure.php" ?>
<?php include("../included/database.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Validation Menu</title>

    <!-- <meta http-equiv="refresh" content="1.5;url=menu.php" /> -->
</head>

<body>

<div class="header" style="margin-bottom:2rem;">
	<a href="traite.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-top:0.5rem;">Commandes traitées</a>	
    <a href="non_traite.php" role="button" class="btn btn-light btn-lg btn-block">Commandes non-traitées</a>
    <a href="menu_adr.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-top:0.5rem;">Mise à jour menu</a>	
</div>

<?php
    $id=$_GET["id"];

    $req = $bdd->prepare('UPDATE commande SET livre=\'oui\' WHERE id = :id');
    $req->execute(array(
        'id' => $id
    ));

?>

<div class="jumbotron text-center" style="margin-top:2rem;background-color:white;font-size:2rem;width:90%;margin-left:auto;margin-right:auto;">
    <i style="color:#2FAF2C;position:relative;top:1rem;margin-bottom:1rem;" class="fas fa-check-circle fa-3x"></i>
    <p>
        La commande a bien été placée dans la catégorie "Commande traitée".
    </p>
</div>


<div id="contact" class="offset">

<?php include("footer.php"); ?>

</div>
</body>
</html>