<?php
session_start();
if (!isset($_SESSION["isConnected"]) || !$_SESSION["isConnected"]) // Si isConnected pas défini ou faux
    
{
    header("Location: https://adr.cs-campus.fr/nanolympique/connexion.php"); //On redirige vers la page de connexion
	$_SESSION["isConnected"] = false; //On set isConnected à False (pour le cas ou pas défini)
	if (isset($_GET["code"]) && isset($_GET["state"])) {
	    if (strcmp($_SESSION["state"], $_GET["state"]) == 0) { //si le Get est égal la variable de session, 
		$_SESSION["code"] = $_GET["code"]; // On rentre le code tapé en variable de session
		// Parameters à envoyer à VR pour l'auth
		$grant_type = "authorization_code";
		$code = $_GET["code"];
		$redirect_uri = "https://adr.cs-campus.fr/nanolympique";
		$client_id = "47e7231e6e5c333459f9280e6d3c7eef96b38ce6";
		$client_secret = $_ENV['client_secret'];
		$data = array("grant_type" => $grant_type, "code" => $code, "redirect_uri" => $redirect_uri, "client_id" => $client_id, "client_secret" => $client_secret);
		$ch = curl_init();
		$url = "https://auth.viarezo.fr/oauth/token";
		$url_er = "erreur.php";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_POST, true);
		$headers = array(
		    'Accept: application/json',
		    'Content-Type: application/x-www-form-urlencoded'
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close($ch);
	 
		$responseObject = json_decode($response);
		$_SESSION["token"] = (array) $responseObject;
		if (isset($_SESSION["token"]["access_token"])) { //si VR nous a bien connecté, on passe isConnected à True et on save les données
		    $ch = curl_init();
		    $url = "https://auth.viarezo.fr/api/user/show/me";
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    $headers = array(
			'Content-Type: application/json',
			'Authorization: Bearer '.$_SESSION["token"]["access_token"]
		    );
		    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		    $response = curl_exec($ch);
		    curl_close($ch);
		    $responseObject = json_decode($response);
		    $_SESSION["user"] = (array) $responseObject;
		    
		    $_SESSION["isConnected"] = true;
		    $url = $_SESSION["redirectUrlAfterLogin"];
		    if (isset($_SESSION["preshotgun"]) && $_SESSION["preshotgun"]) {
		      $url = "https://adr.cs-campus.fr/nanolympique/action.php";
		    }
		    header("Location: ".$url);
		}
		else {
		}
	    }
	    else {
	    }
	}
	else {
	}
}
?>
