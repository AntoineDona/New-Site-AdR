<?php
session_start();
include('database.php');

$sqlQuery='UPDATE astronano SET form=:form WHERE email=:email';
$exempleStatement=$pdo->prepare($sqlQuery);
$exempleStatement->execute([
    'form'=>1,
    'email'=>$_SESSION['email'],
]) or die(print_r($pdo->errorInfo()));

// pour modifier le form : https://docs.google.com/forms/d/1wo_GXXkILCGkFXvD8xCGLggwC45lcUuMrlw5jnmTS4w/edit?usp=drivesdk
header('Location:https://docs.google.com/forms/d/e/1FAIpQLScAyzQSRIwSSnlsZfBm0ORc5x1-EXX0OewOLQDtZZ54d7mRdA/viewform?usp=sf_link')
?>