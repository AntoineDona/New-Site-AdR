<?php
session_start();
$redirect_uri = "https://adr.cs-campus.fr/papybang/index.php";
$client_id = "47e7231e6e5c333459f9280e6d3c7eef96b38ce6";
$client_secret = "0dee01e0437f6b07c784ae54af60b790d83fbcb0";
$response_type = "code";
$state = bin2hex(random_bytes(8));
$_SESSION["state"] = $state;
$scope = "default";
$url = "https://auth.viarezo.fr/oauth/authorize?redirect_uri=".$redirect_uri
        ."&client_id=".$client_id."&response_type=".$response_type
        ."&state=".$state."&scope=".$scope;
$_SESSION["redirectUrlAfterLogin"] = $_GET["redirect"];
header("Location: ".$url);
?>
