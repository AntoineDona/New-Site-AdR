<?php
session_start();
session_destroy();
$_SESSION['prev_page'] == "logout.php";
header("Location: /marjotest/");
?>