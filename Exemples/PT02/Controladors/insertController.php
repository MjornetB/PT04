<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require "../env.php";
require "../Vistes/insert.php";
require "mainFunctions.php";
//Inicialitzem la connexió.
try {

  $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

  $dni = test_input($_POST["dni"]);
  $nom = test_input($_POST["FirstName"]);
  $adreca = test_input($_POST["adreca"]);
  //Comprovem que el DNI sigui introduit.
  if ($dni == "") {
    $errores[] = "El DNI es requerido";
  } //Comprovem que el DNI tingui el format correcte.
  elseif (!preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
    $errores[] = "El DNI no tiene el formato válido";
  } //Comprovem que el nom sigui introduit.
  if ($nom == "") {
    $errores[] = "El nombre es requerido";
  } //Comprovem que l'adreça sigui introduida.
  if ($adreca == "") {
    $errores[] = "La dirección es requerida";
  }
  //Quan l'usuari ha clickat el submit i no hi ha cap error, insertem l'usuari.
  if (isset($_POST['submit']) && empty($errores)) {
    insertarBBDD($conn, $dni, $nom, $adreca);
  } else {
    echo "Error al insertar el usuario <br>";
    echo $errores[0];
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>