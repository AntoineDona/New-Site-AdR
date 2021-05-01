<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Articles en stock</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" title="mobile" href="../mobile.css" />
	<link rel="stylesheet" href="style_com.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="style3.css">

	<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
	<script src="script.js"></script>

</head>

<body>


	<div class="onglets" style="display:flex;width:60%; margin:auto;margin-bottom:1rem;">
		<a href="traite.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-top:0.5rem;">Commandes traitées</a>
		<a href="non_traite.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Commandes non-traitées</a>
		<a href="menu_adr.php" role="button" class="btn btn-danger btn-lg btn-block" style="margin-top:0.5rem;">Mise à jour menu</a>
	</div>
	<main style="margin-bottom: 200px;">
		<div style="background:transparent;" class="jumbotron text-center">
			<div class="narrow" style="display: flex; flex-direction: column; align-items: center;">
				<div class="carte">
					<form method="POST" action="validation_menu_adr.php" class="form_menu">
						<h1>Carte du jour</h1>
						<div class="reset">
							<?php
							$articles = $bdd->query('SELECT * FROM menu WHERE type_id=1');
							while ($article = $articles->fetch()) {
							?>
								<input value="checked" type="checkbox" class="reset_button" name=31 id="reset_button" <?php if ($article['stock'] == 'oui') {
																															echo "checked=\"checked\"";
																														} ?>onclick="deselectAll()">
								<label for="reset_button"> Décocher tout (Aucun article en vente) </label>
						</div>
						<div class="contenu">
							<?php
							}
							// On récupère tout le contenu de la table menu
							/* 
                On parcourt les catégories par ordre
                on compte le nombre d'articles correspondant
                Si le nombre est nul -> on ne echo pas le nom de la catégorie
                Si non nul -> on note le nom de la catégorie et on affiche tous les articles
                */

							$categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
							while ($categorie = $categories->fetch()) {
								//Au moins un article de la catégorie: c'est toujours le cas ici!! On selectionne les articles de la catégorie :
								$articles = $bdd->prepare('SELECT * FROM menu WHERE type_id=? order by article' );
								$articles->execute(array($categorie["id"]));
								if ($categorie['id'] != 1) //On saute le aucun, servira de boutton reset en haut. Si coché, modifier la page comande.php
								{
							?>
								<div class="categorie">
									<!-- si on clique sur ce boutton, on appelle selectAll('categorie_1') qui sélectionne toutes les cases de la catégorie-->
									<h3>
										<input value="checked" type="checkbox" class="categorie_checkbox" name=<?php echo 'categorie_' . $categorie["id"]; ?> id=<?php echo 'categorie_' . $categorie["id"]; ?> onclick="selectAll('<?php echo 'categorie_' . $categorie['id']; ?>')">
										<label for="categorie" class="categorie_label"><?php echo $categorie["categorie"]; ?></label>
									</h3>
									<ul>
										<?php

										if ($categorie['id'] == 2) { //si on est dans les plats du jour, option soldout accessible
											while ($article = $articles->fetch()) //on affiche les cases à cocher 
											{
										?>
												<li>
													<div class="article">
														<input value="checked" type="checkbox" class=<?php echo 'categorie_' . $article["type_id"]; ?> name=<?php echo $article["id"]; ?> id=<?php echo 'categorie_' . $article["type_id"]; ?> <?php if ($article['stock'] == 'oui') {
																																																													echo "checked=\"checked\"";
																																																												} ?> onclick="uncheckAll('<?php echo 'categorie_' . $article['type_id']; ?>')">
														<label for="article"><?php echo $article["article"]; ?></label>
														<br>
														<span class="ingredients">
															<?php echo $article['infos']; ?>
														</span>
													</div>

													<div class="soldout_select">
														<input value="checked" type="checkbox" class="article" name=<?php echo 'soldout' . $article["id"]; ?> id=<?php echo 'categorie_' . $article["type_id"]; ?> <?php if ($article['soldout'] == 'oui') {
																																																						echo "checked=\"checked\"";
																																																					} ?>>
														<label class="soldout_label" for=<?php echo 'soldout' . $article["id"]; ?>>Sold out? </label>
													</div>
												</li>
												<br>
											<?php
											}
										}
										//Sinon on est dans les catégories normales, sans soldout
										else {
											//dans ce cas on affiche simplement tous les articles 
											while ($article = $articles->fetch()) //on affiche les cases à cocher 
											{
											?>
												<li>
													<div class="article">
														<input value="checked" type="checkbox" class=<?php echo 'categorie_' . $article["type_id"]; ?> name=<?php echo $article["id"]; ?> id=<?php echo $article["id"]; ?> <?php if ($article['stock'] == 'oui') {
																																																								echo "checked=\"checked\"";
																																																							} ?> onclick="uncheckAll('<?php echo 'categorie_' . $article['type_id']; ?>')">
														<label for="article"><?php echo $article["article"]; ?></label>
														<br>
														<span class="ingredients">
															<?php echo $article['infos']; ?>
														</span>
														<?php // si dessert du jour, on affiche une case modifiable
														if ($article["article"] == "Dessert du jour") {
														?>
															<input class="quadra" type="text" name="dessert" style="width:50%; vertical-align:center;"/>
															<input id="submit" class="btn_dessert" style="width:40%; height: 3rem; font-size:2rem; vertical-align:middle;" type="submit" name="modif_dessert" value="Modifier">
														<?php
														}
														?>
													</div>
													<!-- <div class="price">
                                    <?php echo $article['prix'] . '€'; ?>
                                </div> -->
												</li>
												<br>
										<?php
											}
										}
										?>
									</ul>
								</div>
						<?php
								}
							}
						?>

						<!-- <div class="categorie">
                        <h3>test</h3>
                        <ul>
                            <li>
                                <div class="article">Burger frites</div>
                                <div class="price">5.00€</div>
                            </li>
                            <li>
                                <div class="article">Kebab frites</div>
                                <div class="price">5.00€</div>
                            </li>
                        </ul>
                    </div> -->
						</div>
						<input id="submit" class="btn_valider" type="submit" name ="modifier_menu" value="Modifier">

					</form>
				</div>

<!-- <form method="POST" action="validation_menu_adr.php" class="form_menu">

    <?php

	// On récupère tout le contenu de la table
	/*
On prend dans l'ordre des catégories: SELECT * FROM categories_menu ORDER BY order
On parcourt les articles du menu de cette catégorie: SELECT * FROm menu WHERE type_id=$id


*/

	$categories = $bdd->query('SELECT * FROM categories_menu ORDER BY ordre');
	while ($categorie = $categories->fetch()) {
		if ($categorie['id'] != 1) //si id!=1 il y a des articles, on affiche la catégorie
		{ ?>
					<input value="checked" type="checkbox" class="categorie_checkbox" name=<?php echo 'categorie_' . $categorie["id"]; ?> id=<?php echo 'categorie_' . $categorie["id"]; ?> onclick="selectAll('<?php echo 'categorie_' . $categorie['id']; ?>')">
                        (all) <label for="categorie" class="categorie_label" style="font-size: 20px; margin-bottom:10px; text-decoration:underline"><?php echo $categorie["categorie"]; ?></label>
						<br>
				<?php
			}

			$articles_correspondant = $bdd->prepare('SELECT * FROM menu where type_id = ? ORDER BY article');
			$articles_correspondant->execute(array($categorie["id"]));

			if ($categorie['id'] == 2) {
				while ($article = $articles_correspondant->fetch()) //on affiche les cases à cocher 
				{
				?>
					<input value="checked" type="checkbox" class=<?php echo 'categorie_' . $article["type_id"]; ?> name=<?php echo $article["id"]; ?> id=<?php echo 'categorie_' . $article["type_id"]; ?>
					<?php if ($article['stock'] == 'oui') {
						echo "checked=\"checked\"";
					} ?> onclick="uncheckAll('<?php echo 'categorie_' . $article['type_id']; ?>')">
                
					<label for="article"><?php echo $article["article"] . ' ;  Sold out?'; ?></label>
					<input value="checked" type="checkbox" class="article" name=<?php echo 'soldout' . $article["id"] //case de soldout
																				?> 
					<?php if ($article['soldout'] == 'oui') {
						echo "checked=\"checked\"";
					} ?>>
					<br>
			<?php
				}
			} else {
				if ($categorie['id'] == 1) { // Si case "Aucun"
					while ($article = $articles_correspondant->fetch()) {
			?>
								<input value="checked" type="checkbox" class="reset_button" name=<?php echo $article["id"] ?> id="reset_button"
									<?php if ($article['stock'] == 'oui') {
										echo "checked=\"checked\"";
									} /*Si déjà cochée, on affiche qu'elle est déjà cochée */ ?>
									onclick="deselectAll()">
								<label for="article"><?php echo $article["article"]; ?> (Attention, ça décoche toutes les cases!)</label>
								<br>
						<?php

					}
				} else {
					while ($article = $articles_correspondant->fetch()) //on affiche les cases à cocher
					{
						?>
								<input value="checked" type="checkbox" class=<?php echo 'categorie_' . $article["type_id"]; ?> name=<?php echo $article["id"]; ?> id=<?php echo $article["id"]; ?>
								<?php if ($article['stock'] == 'oui') {
									echo "checked=\"checked\"";
								} ?> 
								onclick="uncheckAll('<?php echo 'categorie_' . $article['type_id']; ?>')">
                                <label for="article"><?php echo $article["article"]; ?></label>
								<br>
						<?php
					}
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
-->
			</div>
		</div>
	</main>
	<div id="contact" class="offset">

		<?php include("footer.php"); ?>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>