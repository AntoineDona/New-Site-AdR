<?php //auth effectue les différentes étapes d'auth viarezo

if (!isset($_SESSION["isConnected"]) || !$_SESSION["isConnected"]) // Si isConnected pas défini ou faux
    
{
    header("Location: https://adr.cs-campus.fr/nano/connexion.php"); //On redirige vers la page de connexion
	$_SESSION["isConnected"] = false; //On set isConnected à False (pour le cas ou pas défini)
	if (isset($_GET["code"]) && isset($_GET["state"])) { // Si on est toujours pas connecté, mais qu'on s'est connecté à VR, on vérifie bien que les GET renvoyés par VR sont bons
	    if (strcmp($_SESSION["state"], $_GET["state"]) == 0) { //si le state renvoyé par VR est le même que celui initial (pas d'attaque)
		$_SESSION["code"] = $_GET["code"]; // On rentre le autorizaition code de VR en var de Session, utile pour demander des données à VR
		// Parameters à envoyer à VR pour l'auth
		$grant_type = "authorization_code";
		$code = $_GET["code"];
		$redirect_uri = "https://adr.cs-campus.fr/nano/index.php";
		$client_id = "47e7231e6e5c333459f9280e6d3c7eef96b38ce6";
		$client_secret = $_ENV['client_secret'];
		$data = array("grant_type" => $grant_type, "code" => $code, "redirect_uri" => $redirect_uri, "client_id" => $client_id, "client_secret" => $client_secret);
		$ch = curl_init();
		$url = "https://auth.viarezo.fr/oauth/token"; //url où on envoie la requête POST pour récup les infos de l'utilisateur
		$url_er = "erreur.php";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_POST, true);
		$headers = array( //On crée le header de la requete POST
		    'Accept: application/json',
		    'Content-Type: application/x-www-form-urlencoded'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch); //on lance la session cURL, ie on envoie la requete POST et on redirige vers l'auth
		curl_close($ch); //on ferme la session cURL
	 
		$responseObject = json_decode($response);
		$_SESSION["token"] = (array) $responseObject;
		if (isset($_SESSION["token"]["access_token"])) { //si VR nous a bien renvoyé le .json avec l'accesstoken après la requete POST,
		    $ch = curl_init();
		    $url = "https://auth.viarezo.fr/api/user/show/me"; //on fetch les infos du token par une requete GET
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    $headers = array(
			'Content-Type: application/json',
			'Authorization: Bearer '.$_SESSION["token"]["access_token"]
		    ); // on met la clé dans le token avec la valeur Bearer <token>
		    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		    $response = curl_exec($ch);
		    curl_close($ch);
		    $responseObject = json_decode($response); //on converti la réponse en truc lisible pour php
		    $_SESSION["user"] = (array) $responseObject; //On stock en sessions l'array responseObject
		    
		    $_SESSION["isConnected"] = true; //on passe au statut connecté
		    $url = $_SESSION["redirectUrlAfterLogin"]; // on redirige vers index.php
		    header("Location: ".$url); //on fait la requete vers VR pour les infos
		}
		else {
			//Sinon on ne redirige pas, on affiche le reste de la page index
		}
	    }
	    else {
			//Sinon on ne redirige pas, on affiche le reste de la page index
	    }
	}
	else {
		//Sinon on ne redirige pas, on affiche le reste de la page index
	}
}
?>