<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require_once "env.php";
require_once "mainFunctions.php";
$id = "";
$article = "";
$erroresModify = array();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: logout.php");
    exit; 
}
//Inicialitzem la connexió.
if ((isset($_POST['modificaArticle']))){
  $id = test_input($_POST["id"]);
  $article = test_input($_POST["article"]);

    if ($id == "") {
        $erroresModify[] = "El ID del artículo es requerido";
    } elseif (!preg_match('/^\d+$/', $id)) {
        $erroresModify[] = "El ID del artículo debe ser un número";
    }
    if ($article == "") {
        $erroresModify[] = "No puedes dejar el artículo resultante vacío";
      } 
      elseif (!preg_match('/^[a-zA-Z0-9\s,.-]*$/', $article)) {
        $erroresModify[] = "El artículo contiene caracteres no permitidos";
        };
      

    //Comprova si l'article que l'usuari vol modificar es seu
    $modifyVerificator = verificarSiArticleEsPropi($conn, $id);

    if (empty($erroresModify)) {
        if ($modifyVerificator) {
            $modificaArticle = modificaArticle($conn, $id, $article);
            if ($modificaArticle) {
                $successMessageModify = "El artículo se ha modificado correctamente!";
            } else {
                $erroresModify[] = "El artículo que desea modificar no existe";
            }
        } else {
            $erroresModify[] = "El artículo que intenta modificar o no existe o no es suyo";
        }
    }
    include_once "webLogada.php";
    //header("Location: webLogada.php");
}
?>
