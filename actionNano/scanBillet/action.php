<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <title>SCAN NANO</title>
</head>
<body class='align'>
    <div class="grid">
        <div class="form_field">
            <?php
            $password=$_POST['password'];
            if($password!='1969'){
                header('Location: index.php');
                $_SESSION['error']=true;
            }
            else{
                $_SESSION['is_connected']=true;
                echo '<p class="message">Tu es connecté(e), tu peux commencer à scanner les billets.</p>';
            }
            ?>
        </div>  
    </div>
</body>

</html>