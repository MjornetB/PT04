<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require "../env.php";
require "../Vistes/show.php";
require "mainFunctions.php";
//Inicialitzem la connexió.
try {
    $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  //Quan l'usuari ha clickat el botó de submit, mostrem tots els usuaris.
    if (isset($_POST['submit'])){
        mostrarUsuariosBBDD($conn);
      }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>