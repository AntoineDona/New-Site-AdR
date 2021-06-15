<?php include("database.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Navettes du Quadrabang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles.css">
</head>
<body class="bigbang">

	<img class="img_quadra" src="img/QUADRATEXTE_1.png">

	
	<section class="quadra">

		<article class="billeterie">
			<h2 class="resa">Réserve ta place ici: <a href="index.html" class="lien"> adr.cs-campus.fr/quadrabang</a></h2>
		</article>

		<div class="formulaires">

		<article class="reservation">
			<h1 class="reservation"><span class="coeur"><strong>&#9829;</strong>&#9829;</span> Réservez votre bus pour la soirée <span class="coeur">&#9829;<strong>&#9829;</strong></span></h1>
			<p class="complet">Malheureusement, il n'est plus possible de réserver de navettes, cependant nous vous rappelons qu'il est possible d'accéder à la soirée en transport:<br/>
				<a href="https://www.vianavigo.com/accueil" class="complet" style="color:#0000FF;">Trajet en transport</a> à l'adresse 1, rue Joliot Curie, 91190 Gif-sur-Yvete.</p>
		</article>


	<form method="POST" action="reponse.php">
		<article class="nom">
    			<p>
        			<label for="pseudo">Votre nom :</label><br>
        			<input class="quadra" type="text" name="nom" id="nom" placeholder="Ex : Aya Nakamura"  />
    			</p>
		</article>

		<article class="mail">
   			<label for="email"> Votre adresse email:</label><br>
			<input class="quadra" type="email" name="email"/>
		</article>

		<article class="bus">
<?php
function number_place_aller($aller,$pdo){
	if ($aller != "aucune"){
		$query = $pdo->prepare("SELECT COUNT(*) as c from quadra_navettes where aller=?");
		$query->execute(array($aller));
		$result= $query->fetch();
		return $result['c'];
	}
}
?>
  <p><label for="aller">Veuillez indiquer la navette aller souhaitée :</label><br />
	<select name="aller" id="aller" class="quadra">
       		 <option value="aucune" selected>Aucune</option>
		<!--<?php if (number_place_aller("Denfert-Rochereau (22h30)",$pdo)<53){ ?><option value="Denfert-Rochereau (22h30)">Denfert-Rochereau (22h30)</option><?php } ?>
		<?php if (number_place_aller("Denfert-Rochereau (00h30)",$pdo)<53){ ?><option value="Denfert-Rochereau (00h30)">Denfert-Rochereau (00h30)</option><?php } ?>
		<?php if (number_place_aller("Polytechnique (23h19)",$pdo)<53){ ?><option value="Polytechnique (23h19)">Polytechnique (23h19)</option><?php } ?>
		<?php if (number_place_aller("Polytechnique (23h30)",$pdo)<53){ ?><option value="Polytechnique (23h30)">Polytechnique (23h30)</option><?php } ?>
		<?php if (number_place_aller("AgroParisTech (22h15)",$pdo)<53){ ?><option value="AgroParisTech (22h15)">AgroParisTech (22h15)</option><?php } ?>
		<?php if (number_place_aller("AgroParisTech (00h23)",$pdo)<53){ ?><option value="AgroParisTech (00h23)">AgroParisTech (00h23)</option><?php } ?>
		<?php if (number_place_aller("Ponts ParisTech (22h30)",$pdo)<53){ ?><option value="Ponts ParisTech (22h30)">Ponts ParisTech (22h30)</option><?php } ?>
		<?php if (number_place_aller("Ponts ParisTech (00h30)",$pdo)<53){ ?><option value="Ponts ParisTech (00h30)">Ponts ParisTech (00h30)</option><?php } ?> -->
       		<option value="Pedibus">Pedibus</option>
		<option value="Uber">Uber</option>
	  </select>
   			</p>
		</article>
<?php
function number_place_retour($retour,$pdo){
	if ($retour != "aucune"){
		$query = $pdo->prepare("SELECT COUNT(*) as c from quadra_navettes where retour=?");
		$query->execute(array($retour));
		$result= $query->fetch();
		return $result['c'];
	}
}
?>
		<article class="bus">
   			<p><label for="retour">Veuillez indiquer la navette retour souhaitée :</label><br />
       	<select name="retour" id="retour" class="quadra">
       		<option value="aucune" selected>Aucune</option>
		<!-- <?php if (number_place_retour("Denfert-Rochereau (03h00)",$pdo)<53){ ?><option value="Denfert-Rochereau (03h00)">Denfert-Rochereau (03h00)</option><?php } ?>
		<?php if (number_place_retour("Denfert-Rochereau (05h00)",$pdo)<53){ ?><option value="Denfert-Rochereau (05h00)">Denfert-Rochereau (05h00)</option><?php } ?>
		<?php if (number_place_retour("Polytechnique (04h30)",$pdo)<53){ ?><option value="Polytechnique (04h30)">Polytechnique (04h30)</option><?php } ?>
		<?php if (number_place_retour("Polytechnique (04h43)",$pdo)<53){ ?><option value="Polytechnique (04h43)">Polytechnique (04h43)</option><?php } ?>
		<?php if (number_place_retour("AgroParisTech (03h05)",$pdo)<53){ ?><option value="AgroParisTech (03h05)">AgroParisTech (03h05)</option><?php } ?>
		<?php if (number_place_retour("AgroParisTech (05h13)",$pdo)<53){ ?><option value="AgroParisTech (05h13)">AgroParisTech (05h13)</option><?php } ?>
		<?php if (number_place_retour("Ponts ParisTech (02h50)",$pdo)<53){ ?><option value="Ponts ParisTech (02h50)">Ponts ParisTech (02h50)</option><?php } ?>
		<?php if (number_place_retour("Ponts ParisTech (04h50)",$pdo)<53){ ?><option value="Ponts ParisTech (04h50)">Ponts ParisTech (04h50)</option><?php } ?> -->
       		<option value="Pedibus">Pedibus</option>
		<option value="Uber">Uber</option>
				</select>
   			</p>
		</article>

		<article class="envoyer">
			<input type="submit" name="Valider">
		</article>
	</form>
		
		</div>
		
	</section>

	<?php include("footer.php"); ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
