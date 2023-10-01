<!DOCTYPE html>
<html lang="fr">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>COTISATION</title>
	<meta name="google-site-verification" content="cEbrs-eyoHMLzEcQwiEu5sHkC8N61J92Z_fElR1KTMQ" />
	<link rel="shortcut icon" sizes="96x96" type="image/png" href="/cotisation/img/icon.png">
	<link rel="stylesheet" type="text/css" href="styles.css"/>
	<script src="https://kit.fontawesome.com/6ede126102.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="principal">
    <h1>Es-tu cotisant ?</h1>
    <form id="cotisationForm" method="post">
        <input type="email" id="email" name="email" placeholder="Ton mail" required>
        <br/><button type="submit">Vérifier</button>
    </form>
	</div>
    <div class="pop"><p id="message"></div>
    <?php
    require_once("database.php");

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        $query = $pdo->prepare("SELECT COUNT(*) as c FROM cotisants_23_24 WHERE email = ?");
        $query->execute(array($email));
        $result = $query->fetch();
        
        if ($result['c'] > 0) {
            echo "<i class='fa-solid fa-user-check'></i> Tu es bien cotisant·e, tu peux shotgun !";
        } else {
            echo "<i class='fa-solid fa-user-xmark'></i> Tu n'es pas cotisant·e, tu ne peux pas shotgun...<br/>Contacte nous pour y remédier !";
        }
    }
    ?>
    </p>
</body>
</html>
