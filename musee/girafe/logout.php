<!DOCTYPE html>
<?php   
session_start();
session_destroy();
header("location:/musee/index.php");
exit();
?>
