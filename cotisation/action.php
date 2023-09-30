<?php

try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=adr;charset=utf8', 'marjolaine', 'marjo');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

function is_cotisant($email, $pdo)
{
    $query = $pdo->prepare("SELECT COUNT(*) as c from cotisants_23_24 where email=?");
    $query->execute(array($email));
    $result = $query->fetch();
    if ($result['c'] == 0) {
        return false;
    } else {
        return true;
    }
}

?>
