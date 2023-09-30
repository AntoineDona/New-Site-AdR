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
    <h1>Vérification de la cotisation</h1>
    <form id="cotisationForm" method="post">
        <label for="email">Entrez votre e-mail :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Vérifier</button>
    </form>
    <p id="message">
    <?php
    require_once("database.php");

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        
        $query = $pdo->prepare("SELECT COUNT(*) as c FROM cotisants_23_24 WHERE email = ?");
        $query->execute(array($email));
        $result = $query->fetch();
        
        if ($result['c'] > 0) {
            echo "Tu es bien cotisant·e, tu peux shotgun !";
        } else {
            echo "Tu n'es pas cotisant·e, tu ne peux pas shotgun...<br/>Contacte nous pour y remédier !";
        }
    }
    ?>
    </p>
</body>
</html>
