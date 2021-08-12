<?php include("auth.php"); 
?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>NANOLYMPIQUE</title>
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/images/favicon/favicon-96x96.png">
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<?php include("script.php"); ?>

<body onload="onLoad()">

	<!-- <a href="deconnexion.php">se deconnecter</a> -->

	<?php
	function number_place($pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from nanolympique");
		$query->execute();
		$result = $query->fetch();
		return $result['c'];
	}
	?>

	<?php
	function is_present($prenom, $nom, $pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from nanolympique where prenom=? and nom=?");
		$query->execute(array($prenom, $nom));
		$result = $query->fetch();
		return $result['c'];
	}


	function is_rpz($mail, $pdo)
	{
		$query = $pdo->prepare("SELECT COUNT(*) as c from representants_fp where EMAIL=?");
		$query->execute(array($mail));
		$result = $query->fetch();
		return $result['c'];
	}

	?>


	<?php
	$_SESSION["promo"] = $_SESSION["user"]["promo"];
	$_SESSION["prenom"] = $_SESSION["user"]["firstName"];
	$_SESSION["nom"] = $_SESSION["user"]["lastName"];
	$_SESSION["mail"] = $_SESSION["user"]["email"];




	//$req='select count(*) from nanoween where prenom=$_SESSION["prenom"] AND nom =$_SESSION["nom"]';
	//$res=$pdo->query($req);

	$res = is_present($_SESSION["prenom"], $_SESSION["nom"], $pdo);
	$rpz = is_rpz($_SESSION["mail"], $pdo);

	//echo $res;
	//echo 'est ce que ça fonctionne vraiment?';
	$reste = 550 - number_place($pdo);
	//echo 'Il reste '.$reste.' places au shotgun';
	if ($res == 0) {
		$_SESSION['shotgun'] = false; //changer en false!!!
		//echo 'y a pas';
		// la valeur n'existe pas -> action appropriée
	} else {
		$_SESSION['shotgun'] = true;
		//echo 'y a de ouf';
		// valeur existe -> action appropriée
	}
	?>

	<?php
	if ($_SESSION["mail"] == 'agathe.auburtin@student-cs.fr') {
		header("Location: https://adr.cs-campus.fr/nanolympique/agathe.php");
	}
	?>


	<?php
	if ($rpz == 0) {
		$_SESSION["representant"] = false;
	} else {
		$_SESSION["representant"] = true;
		//echo "trop cool tu as cotisé";
	}
	?>


	<?php
	if (number_place($pdo) >= 550 and !$_SESSION['shotgun']) {
		if ($_SESSION["isConnected"]) {
			header("Location: https://adr.cs-campus.fr/nanolympique/fini.php");
		} else {
			header("Location: https://adr.cs-campus.fr/nanolympique/connexion.php");
		}
	}

	?>

	<div id="titre_sg"></div>
	<div id="holder">
		<div class="olympics">
			<div class="ring blue" id="mois">
				<p class="chiffre">00</p>
				<p>mois(s)</p>
			</div>
			<div class="ring yellow" id="jours">
				<p class="chiffre">00</p>
				<p>jour(s)</p>
			</div>
			<div class="ring black" id="heures">
				<p class="chiffre">00</p>
				<p>heure(s)</p>
			</div>
			<div class="ring green" id="minutes">
				<p class="chiffre">00</p>
				<p>minute(s)</p>
			</div>
			<div class="ring red" id="secondes">
				<p class="chiffre">00</p>
				<p>seconde(s)</p>
			</div>
		</div>
		<!-- <div id="counter" style="display: none;">
			<div style="grid-area: d_top;">00</div>
			<div style="grid-area: h_top;">00</div>
			<div style="grid-area: m_top;">00</div>
			<div style="grid-area: s_top;">00</div>
			<div style="grid-area: d_bottom; font-size:20%;">jour(s)</div>
			<div style="grid-area: h_bottom; font-size:20%;">heure(s)</div>
			<div style="grid-area: m_bottom; font-size:20%;">minute(s)</div>
			<div style="grid-area: s_bottom; font-size:20%;">seconde(s)</div>
		</div> -->

		<script type="text/javascript">
			function shotgun() {
				window.location = 'action.php';
			}

			function verif() {
				if (confirm("En cliquant sur OK, tu annules ta place et la remets en jeu.")) {
					window.location = 'action.php';
				}
			}
		</script>
	</div>
	
		<?php
		if (!$_SESSION["is_representant"]) {
			echo " <div id='danger_msg_ctnr'> <p id='co_msg'>Attention, si vous voyez ce message, VOUS NE POURREZ PAS SHOTGUN!! Seuls les représentants de famille de parrainage ont la possibilité de Shotgun!!</p></div> ";
		} else {
			echo " <div id='ok_msg_ctnr'> <p id='co_msg'> Salut " .$_SESSION["prenom"] . "! <br> Tu est bien représentant de ta famille de parainage, tu vas pouvoir Shotgun! </p></div>";
		}
		?>
	<div id="sg_link_ctnr" href="#">
		<?php
		if (!$_SESSION['shotgun']) {
			echo '<a id="sg_link" href="action.php" onClick="shotgun();">SHOTGUN</a>';
		} else {
			echo '<a id="sg_link" href="action.php"onClick="verif();">DEPAPS</a>';
		}
		?>
	</div>


	<div class="etat" style="display: none;">
		<p>Salut <?php echo $_SESSION["prenom"] . ' ' . $_SESSION["nom"]; ?> !<br>
			<?php
			if ($_SESSION['shotgun']) {
				echo 'Tu as déjà ta place !';
			} else {
				echo "Tu n'as pas encore ta place !";
			}
			?>
		</p>
	</div>

</body>

</html>