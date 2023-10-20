<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require_once "env.php";
require_once "mainFunctions.php";
$article;
session_start();
//Inicialitzem la connexió.
if (isset($article)){
try {

  $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

  $article = test_input($_POST["article"]);


  if ($article == "") {
    $errores[] = "El articulo es requerido";
  } 
  elseif (!preg_match('/^[a-zA-Z0-9\s,.-]*$/', $article)) {
    $errores[] = "El artículo contiene caracteres no permitidos";
    };
  
  if (isset($_POST['enviarArticle']) && empty($errores)) {
    crearArticle($conn, $article);
  } else {
    echo "Error al insertar el articulo <br>";
    echo $errores[0];
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
}
include_once "insertVista.php";
?>