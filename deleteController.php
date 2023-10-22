<?php
//MARC JORNET BOEIRA Incluim la connexió, les vistas i les funcions principals.
require_once "env.php";
require_once "mainFunctions.php";
$id = "";
$errores = array();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location: logout.php");
    exit; 
}
//Inicialitzem la connexió.
if ((isset($_POST['esborraArticle']))){
  $id = test_input($_POST["id"]);


    if ($id == "") {
        $errores[] = "El ID del artículo es requerido";
    } elseif (!preg_match('/^\d+$/', $id)) {
        $errores[] = "El ID del artículo debe ser un número";
    }

    //Comprova si l'article que l'usuari vol esborrar es seu
    $deleteVerificator = verificarSiArticleEsPropi($conn, $id);

    if (empty($errores)) {
        if ($deleteVerificator) {
            $borrarArticle = borrarArticle($conn, $id);
            if ($borrarArticle) {
                $successMessage = "El artículo se ha borrado correctamente!";
            } else {
                $errores[] = "El artículo que desea borrar no existe";
            }
        } else {
            $errores[] = "El artículo que intenta borrar o no existe o no es suyo";
        }
    }
    include_once "webLogada.php";
    //header("Location: webLogada.php");
}
?>
