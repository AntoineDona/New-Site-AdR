<!DOCTYPE html>
<?php   
session_start();
session_destroy();
setcookie(
    'is_connected',
    false,
    [
        'expires' => time() + 24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);
header("location:index.php");
exit();
?>
