<?php include("database.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Articles en stock</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style_com.css">
  <link rel="stylesheet" type="text/css" title="mobile" href="../mobile.css" />
  <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
</head>

<body>


    <div class="header" style="margin-bottom:2rem;">
        <a href="traite.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-top:0.5rem;">Commandes traitées</a>	
        <a href="non_traite.php" role="button" class="btn btn-light btn-lg btn-block">Commandes non-traitées</a>
        <a href="menu_adr.php" role="button" class="btn btn-danger btn-lg btn-block" style="margin-top:0.5rem;">Mise à jour menu</a>	
    </div>
	
	<div style="background-color:white;" class="jumbotron text-center">
	<div class="narrow">


    <form method="POST" action="validation_menu_adr.php" class="form_menu">

    <?php

	// On récupère tout le contenu de la table
/*
On prend dans l'ordre des catégories: SELECT * FROM categories_menu ORDER BY order
On parcourt les articles du menu de cette catégorie: SELECT * FROm menu WHERE type_id=$id


*/

	$categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
	while ($categorie = $categories->fetch())
		{
			if ($categorie['id'] != 1) //si id!=1 il y a des articles, on affiche la catégorie
				{
					echo '<h3> ' . $categorie["categorie"] . ': </h3>';
				}
			
			$articles_correspondant = $bdd->prepare('SELECT * FROM menu where type_id = ? ORDER BY article');
			$articles_correspondant->execute(array($categorie["id"]));
	
			if ($categorie['id'] == 2)
				{
					while ($donnees = $articles_correspondant->fetch()) //on affiche les cases à cocher 
				{
			?>
					<input value="checked" type="checkbox" class="article" name=<?php echo $donnees["id"]?> 
					<?php if ($donnees['stock']=='oui'){echo "checked=\"checked\"";} ?>>
					<label for="article"><?php echo $donnees["article"] . ' ;  Sold out?';?></label>
					<input value="checked" type="checkbox" class="article" name=<?php echo 'soldout' . $donnees["id"] //case de soldout?> 
					<?php if ($donnees['soldout']=='oui'){echo "checked=\"checked\"";} ?>>
					<br>
			<?php
				}
				}
			else
				{
					while ($donnees = $articles_correspondant->fetch()) //on affiche les cases à cocher
						{
					?>
							<input value="checked" type="checkbox" class="article" name=<?php echo $donnees["id"]?> 
								<?php if ($donnees['stock']=='oui'){echo "checked=\"checked\"";} /*Si déjà cochée, on affiche qu'elle est déjà cochée */?>>
							<label for="article"><?php echo $donnees["article"];?></label>
							<br>
					<?php
						}
				}
		echo '<br>';
		}
    	?>
	
	<?php /*
	$reponse = $bdd->query('SELECT * FROM menu');
	
	// On affiche chaque entrée une à une
	while ($donnees = $reponse->fetch())
        {
    ?>
    
        <input value="checked" type="checkbox" class="article" name=<?php echo $donnees["id"]?> <?php if ($donnees['stock']=='oui'){echo "checked=\"checked\"";}?>>
        <label for="article"><?php echo $donnees["article"];?></label>
        <br>


    <?php
    } */
    ?>
    <input style="background-color:grey" class="btn btn-secondary" type="submit" name="Valider">


    </form>
    </div>
    </div>

<div id="contact" class="offset">

<?php include("footer.php"); ?>

</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
