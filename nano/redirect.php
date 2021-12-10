<?php //fichier dans lequel on fait la requête Viarezo, on demande tout ce qu'on veut 
session_start();
$redirect_uri = "https://adr.cs-campus.fr/nano/index.php";
$client_id = "47e7231e6e5c333459f9280e6d3c7eef96b38ce6";
$client_secret = $_ENV['client_secret'];
$response_type = "code";
$state = bin2hex(random_bytes(8));
$_SESSION["state"] = $state;
$scope = "default";
$url = "https://auth.viarezo.fr/oauth/authorize?redirect_uri=".$redirect_uri //on crée la requete GET
        ."&client_id=".$client_id."&response_type=".$response_type
        ."&state=".$state."&scope=".$scope;
$_SESSION["redirectUrlAfterLogin"] = $_GET["redirect"];
header("Location: ".$url); //on envoie la requete GET, pour la connexion puis on est redirigé vers index.php
?>
