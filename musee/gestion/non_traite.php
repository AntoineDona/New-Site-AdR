<?php
session_start();

if (isset($_GET['order_nt'])) { // Si on a appuyé sur un boutton de tri, on récupère la donnée de l'URL, à sécuriser? prepare SQL
	$_SESSION['order_nt'] = $_GET['order_nt'];
	$_SESSION['sort_nt'] == 'asc' ? $_SESSION['sort_nt'] = 'desc' : $_SESSION['sort_nt'] = 'asc';
} else { //Sinon on a pas cliqué. Alors soit on a rien dans la variable de session, on l'initialise.
	if (!isset($_SESSION['order_nt'])) {
		$_SESSION['order_nt'] = 'id'; // par défaut on trie par id croissant -> les premiers d'abord
	}
	//Sinon on conserve la variable de la session
}

if (isset($_GET['sort_nt'])) { // Si on a appuyé sur un boutton de tri, on récupère la donnée de l'URL, à sécuriser? prepare SQL
	$_SESSION['sort_nt'] = $_GET['sort_nt'];
	$_SESSION['sort_nt'] == 'asc' ? $_SESSION['sort_nt'] = 'desc' : $_SESSION['sort_nt'] = 'asc';
} else { //Sinon on a pas cliqué. Alors soit on a rien dans la variable de session, on l'initialise.
	if (!isset($_SESSION['sort_nt'])) {
		$_SESSION['sort_nt'] = 'asc'; //asc valeur par défaut du sens de tri
	}
	//Sinon on conserve la variable de la session
}

$session_order = "{$_SESSION['order_nt']}";
$session_sort = "{$_SESSION['sort_nt']}";

// print_r($session_order);
// print_r($session_sort);

include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Commandes non traitées</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style_com.css">
	<link rel="stylesheet" type="text/css" title="mobile" href="../mobile.css" />
	<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
	<link rel="stylesheet" href="style_nav.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="style3.css">
	<script src="script.js"></script>

</head>

<body>

	<div class="onglets" style="display:flex;width:60%; margin:auto;">
		<a href="traite.php" role="button" class="btn btn-light btn-lg btn-block" style=" margin-top: .5rem;margin-left:1rem;margin-right:1rem;">Commandes traitées</a>
		<a href="en_cours.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Commandes en cours</a>
		<a href="non_traite.php" role="button" class="btn btn-danger btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Commandes non-traitées</a>
		<a href="menu_adr.php" role="button" class="btn btn-light btn-lg btn-block" style="margin-left:1rem;margin-right:1rem;">Mise à jour menu</a>
		</div>
	<!-- <div class="defileParent">
		le contenu défilant
		<span class="defile" data-text="Nik la kafet ----- Pour passer une annonce, envoyer 1€ en Lydia au 06 07 76 40 74 ----- "> Nik la kafet ----- Pour passer une annonce, envoyer 1€ en Lydia au 06 07 76 40 74  ----- </div>
	</div> -->
	<div class="tri" style="margin-top: 4rem;">
		<h2>Trier par:</h2>
		<a href="?order_nt=id&&sort_nt=<?php echo $_SESSION['sort_nt']; ?>">
			<button class='btn_id' id="id">
				<h4>Heure de commande</h4>
				<div class='fleches_tri'>
					<div class="sort"></div>
					<div class="sort_up"></div>
					<div class="sort_down"></div>
				</div>
			</button>
		</a>
		<a href="?order_nt=horaire&&sort_nt=<?php echo $_SESSION['sort_nt']; ?>">
			<button class='btn_heure_livraison' id="horaire">
				<h4>Heure de livraison</h4>
				<div class='fleches_tri'>
					<div class="sort"></div>
					<div class="sort_up"></div>
					<div class="sort_down"></div>
			</button>
		</a>
	</div>

	<main style="margin-bottom: 500px;">
		<?php
		// On récupère tout le contenu de la table jeux_video
		$reponse = $bdd->query("SELECT * FROM commande WHERE traite='non' order by {$_SESSION['order_nt']} {$_SESSION['sort_nt']}");

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch()) {
		?>
			<div class="jumbotron text-center" style="margin-top:2rem;background-color:white;font-size:2rem;width:60%;margin-left:auto;margin-right:auto;">
				<p><?php echo $donnees['nom']; ?> <?php if ($donnees['type_commande'] == 'A livrer') {
														echo ' - ' . $donnees['numero'];
													} ?> - <?php $date = new Datetime($donnees['Datetime']);
															echo $date->format('H:i:s d/m/Y');
															?></p>
				<p style="border: 2px solid black; border-radius:0.5rem; width:50%; margin:auto; padding:1rem 1rem; margin-bottom:1rem;"><span style="margin-bottom: 1rem; display:inline-block">Commande:</span><br><?php echo $donnees['commande']; ?></p>
				<p style="color:darkred;"> Type: <?php echo $donnees['type_commande'];
													if ($donnees['type_commande'] == 'En terrasse') {
														echo ' - Table n°' . $donnees['num_table'];
													} else { ?> - Pour <?php $horaire = new Datetime($donnees['horaire']);
														echo $horaire->format('H\hi');
														if ($donnees['type_commande'] == 'A livrer') { ?> - Adresse: <?php echo $donnees['adresse'];
															}
														} ?></p>
				<a href=<?php echo "validation_en_cours.php?id=" . $donnees['id'] . "&origin=0"; ?> style="background-color:orange" class="btn btn-success btn-lg">En cours de traitement</a>
				<a href=<?php echo "validation_traite.php?id=" . $donnees['id'] . "&origin=0"; ?> style="background-color:green" class="btn btn-success btn-lg">Commande traitée</a>
			</div>
		<?php
		}

		$reponse->closeCursor(); // Termine le traitement de la requête

		?>
	</main>





	<div id="contact" class="offset">

		<?php include("footer.php"); ?>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script>
		displaySort('<?php echo $session_order ?>', '<?php echo $session_sort ?>')
	</script>

	<body>

</html>