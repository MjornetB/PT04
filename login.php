<?php
require_once "mainFunctions.php";
$nameToLogin = $_POST["username"];
$passwordToLogin = $_POST["psw"];


$ferLogin = realitzarLogin($conn, $nameToLogin, $passwordToLogin);

if ($ferLogin == "Correcto"){
    session_start();
    $_SESSION['user'] = $nameToLogin;
    header("Location: webLogada.php");
}
else {
    echo $ferLogin;
}







?>