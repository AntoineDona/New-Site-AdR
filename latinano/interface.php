<?php session_start(); ?>
<?php include("database.php"); ?>
<!DOCTYPE html>
<html>

<head>

	<title>Interface</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/images/favicon/favicon-96x96.png">
	<link rel="stylesheet" href="styles.css">
</head>

<body class="presence">

	<?php
	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from latinano");
		$query->execute();
		$result = $query->fetch();
		return $result['c'];
	}

	function entree($pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as d from latinano WHERE entree='oui'");
		$query->execute();
		$result = $query->fetch();
		return $result['d'];
	}

	?>

	<?php $nombre = entree($pdo);
	echo "<h1 class='nb_entrees'>Entrées: " . $nombre . "</h1>"; ?>

	<form id="searchform" action="#" method="post">
		<input id="search" type="text" name="pseudo" placeholder="Chercher un prenom / nom / famille de parrainage" />
		<button type="submit" id="submit" form="searchform" name="Rechercher" value=" ">
			<i class="fas fa-search"></i>
		</button>
	</form>

	<?php
	if (isset($_POST['Rechercher'])) { // Si il clique sur valider
		$_SESSION["search"] = $_POST['pseudo']; // Ici on va defenire que la session bla bla bla va être définie comme ce que il a écrit dans pseudo
		// Si tout va bien, on peut continuer
		$reponse = $pdo->query("SELECT * FROM latinano WHERE CONCAT_WS('', prenom, nom, famille, email) LIKE '%" . $_SESSION["search"] . "%' ");
		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch()) {

			if ($donnees["entree"] == 'non') {
	?>
				<div class="greencard">
					<div class="nom">
						Nom: <?php echo $donnees["prenom"] . ' ' . $donnees["nom"]; ?>
					</div>
					<div class="famille">
						Famille: <?php echo $donnees["famille"] ?>
					</div>
					<form action="valide.php?prenom=<?php echo $donnees['prenom'] . '&nom=' . $donnees['nom'] ?>" method="POST" class="valide">
						<input class="submit" type="submit" name="valider" value="Faire entrer">
					</form>
				</div>
	<?php
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