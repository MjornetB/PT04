<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require "../env.php";
require "../Vistes/modify.php";
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
  }

  //Quan l'usuari ha clickat el botó de showUser ens mostra l'usuari si existeix a la BBDD i no hi han errors.
  if (isset($_POST['showUser'])) {
    if (empty($errores)) {
      mostrarUsuarioBBDD($conn, $dni);
      $dniMostrado = $dni;
    } else echo "Error al mostrar el usuario";
  }

  //Quan l'usuari ha clickat el botó de submit i no hi ha cap error, modifiquem l'usuari.
  if (isset($_POST['submit'])) {
    if (empty($errores)) {
      ModificarBBDD($conn, $dni, $nom, $adreca);
    } else echo "Error al modificar el usuario";
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>