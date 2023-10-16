<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require "../env.php";
require "../Vistes/delete.php";
require "mainFunctions.php";
//Inicialitzem la connexió.
try {
  $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  $dni = test_input($_POST["dni"]);

  //Comprovem que el DNI sigui introduit.
  if ($dni == "") {
    $errores[] = "El DNI es requerido";
  }
  //Comprovem que el DNI tingui el format correcte.
  elseif (!preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
    $errores[] = "El DNI no tiene el formato válido";
  }
  //Quan l'usuari ha introduit el DNI correctament i no hi ha cap error, esborrem l'usuari.
  if (isset($_POST['submit']) && empty($errores)) {
    borrarBBDD($conn, $dni);
  }
  //Si hi ha algun error, el mostrem.
  else {
    echo "Error al borrar el usuario <br>";
    echo $errores[0];
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>