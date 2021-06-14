<?php
session_start();
header("Location: /nano/interfacev2.php");
?>
<?php include("database.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Interface</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body class="Présence">

<?php
function number_place($pdo){
		$query = $pdo->prepare("SELECT COUNT(*) as c from nanoween");
		$query->execute();
		$result= $query->fetch();
		return $result['c'];
}


?>

	<h1 class="interface">Vérifie si cette personne est déjà entrée ou non</h1>
	<h1 class="finito">Cherche son prenom</h1>
	<h2 class="finito">Valide UNIQUEMENT si la personne n'est pas déjà entrée.<br> 
	
	
	

<form action="#" method="post">
<input style="font-size:1.5em;font-family:'CaviarDreams';" type="text" name="pseudo"> 
<input style="font-size:1.5em;font-family:'CaviarDreams';" type="submit" name="Rechercher"> 
</form> </h2>
		
		<?php 
if(isset($_POST['Rechercher'])) // Si il clique sur valider
{
$_SESSION["search"] = $_POST['pseudo']; // Ici on va defenire que la session bla bla bla va être définie comme ce que il a écrit dans pseudo

?><?php
// Si tout va bien, on peut continuer

$reponse = $pdo->query("SELECT * FROM nanoween WHERE prenom LIKE '".$_SESSION["search"]."%' ");
?><?php
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p class="liste">
    <!--<strong class="nom">Nom</strong> : --><?php echo $donnees["prenom"]." ".$donnees["nom"]; ?><br /><br />
    <!--Statut entrée : <br/>--><?php if ($donnees["entree"]=='non'){
						echo "Pas encore entré(e)"; 
					}
	    				else{
						echo "DÉJÀ ENTRÉ(E)";
					}?><br>
	    <form action="valide.php?prenom=<?php echo $donnees['prenom'];?>&nom=<?php echo $donnees['nom'];?>" method="POST" class="valide">
     		<input type="submit" name="valider" value="Faire entrer">
  		</form>
		
   </p>

	
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
	
}

?>
	
	
	</h2>
	
	<!-- <div href="#" onClick="window.location='index.php'" id="reload">&#8635; Recharger</div> -->

</body>

</html>
