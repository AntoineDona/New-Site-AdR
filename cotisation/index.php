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
    <form id="cotisationForm">
        <label for="email">Entrez votre e-mail :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Vérifier</button>
    </form>
    <p id="message"></p>

    <script>
        document.getElementById("cotisationForm").addEventListener("submit", function (e) {
            e.preventDefault();
            var email = document.getElementById("email").value;
            
            if (is_cotisant(email,$pdo)) {
                document.getElementById("message").textContent = "Tu es bien cotisant·e, tu peux shotgun !";
            } else {
                document.getElementById("message").textContent = "Tu n'est pas cotisant·e, tu ne peux pas shotgun...<br/>Contacte nous pour y remédier !";
            }
        });
    </script>
</body>
</html>