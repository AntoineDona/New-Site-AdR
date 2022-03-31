<?php
session_start();
if(isset($_SESSION['is_connected']) and $_SESSION['is_connected']){
    header('Location: action.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCAN NANO</title>
</head>
<body>
    <form action="action.php" method='post'>
        <input type="password" name="code" id="code" required="required">
        <input type="submit" value="Valider">
    </form>
    <?php if(isset($_SESSION['error']) and $_SESSION['error']){
        echo "<p>Le mot de passe n'est pas le bon.</p>";
    } ?>
</body>
</html>