<?php
session_destroy();
$_SESSION['prev_page'] == "logout.php";
header("Location: /nanolympique/");
?>