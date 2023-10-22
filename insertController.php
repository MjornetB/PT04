<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require_once "env.php";
require_once "mainFunctions.php";
$article = "";
$erroresInsert = array();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['user'])) {
  header("Location: logout.php");
  exit; 
}
//Inicialitzem la connexió.
if ((isset($_POST['enviaArticle']))){
  $article = test_input($_POST["article"]);


  if ($article == "") {
    $erroresInsert[] = "El articulo es requerido";
  } 
  elseif (!preg_match('/^[a-zA-Z0-9\s,.-]*$/', $article)) {
    $erroresInsert[] = "El artículo contiene caracteres no permitidos";
    };
  
  if (empty($erroresInsert)) {
    $crearArticle = crearArticle($conn, $article);
    if ($crearArticle){
      $successMessageInsert = "El artículo se ha creado correctamente!";
    } else {
      $erroresInsert[] = "Error al crear el artículo";
    }
  }
  include_once "webLogada.php";
}
?>