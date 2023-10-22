<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require_once "env.php";
require_once "mainFunctions.php";
$article = "";
$errores = array();
session_start();
//Inicialitzem la connexió.
if ((isset($_POST['enviaArticle']))){
  $article = test_input($_POST["article"]);


  if ($article == "") {
    $errores[] = "El articulo es requerido";
  } 
  elseif (!preg_match('/^[a-zA-Z0-9\s,.-]*$/', $article)) {
    $errores[] = "El artículo contiene caracteres no permitidos";
    };
  
  if (empty($errores)) {
    $crearArticle = crearArticle($conn, $article);
    if ($crearArticle){
      $successMessage = "El artículo se ha creado correctamente!";
    } else {
      $errores[] = "Error al crear el artículo";
    }
  }
}
include_once "insertVista.php";
?>