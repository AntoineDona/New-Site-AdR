<!DOCTYPE html>
<?php   
session_start();
session_destroy();
setcookie(
    'is_connected',
    false,
    time() + 24*3600,
);
header("location:index.php");
exit();
?>
