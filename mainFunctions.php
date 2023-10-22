<?php
require "env.php";
try {
    $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD); // Connexió a la base de dades
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

function registerUserBBDD($conn, $name, $email, $password){
    try {
      $stmt = $conn->prepare("INSERT INTO usuaris (nom, contrasenya, email) VALUES (:nom, :contrasenya, :email)");
      $stmt->bindParam(':nom', $name);
      $stmt->bindParam(':contrasenya', $password);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      return "Usuario creado correctamente";
  } catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        // Codi d'error 1062: 'Duplicate entry' (entrada duplicada) per a la clau primària
        return "El usuario $name ya existe.";
    } else {
        return "Error al insertar el usuario: " . $e->getMessage();
    }
  }
}

function realitzarLogin($conn, $nameToLogin, $passwordToLogin){
    try {
        $stmt = $conn->prepare("SELECT contrasenya FROM usuaris WHERE nom = :nom");
        $stmt->bindParam(':nom', $nameToLogin);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($passwordToLogin, $resultat['contrasenya'])) {
            return "Correcto";
        } else {
            return "Login incorrecto";
        }
    } catch (PDOException $e) {
        return "Error al realizar el login: " . $e->getMessage();
    }
}

function mostrarArticulosUsersBBDD($conn, $articulosPorPagina, $offset, $usuariLogat){
  $stmtTemp = $conn->prepare("SELECT id FROM usuaris WHERE nom = :nom");
  $stmtTemp->bindParam(':nom', $usuariLogat);
  $stmtTemp->execute();
  $resultatTemp = $stmtTemp->fetch(PDO::FETCH_ASSOC);
  $_SESSION['idUser'] = $resultatTemp["id"];

  $stmt = $conn->prepare("SELECT * FROM articles WHERE id_usuaris = :idUser LIMIT :offset, :articulosPorPagina");
  $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
  $stmt->bindParam(':articulosPorPagina', $articulosPorPagina, PDO::PARAM_INT);
  $stmt->bindParam(':idUser', $resultatTemp['id']);
  $stmt->execute();
  

  echo '<ul>';
  
  while ($resultat = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<li>' . $resultat['id'] . ' ' . htmlspecialchars($resultat['article']) . '</li>';
  }
  
  echo '</ul>';
}

function crearArticle($conn, $article){
    $idUser = $_SESSION['idUser'];
    $stmt = $conn->prepare("INSERT INTO articles (article, id_usuaris) VALUES (?, ?)");
      $stmt->bindParam(1, $article);
      $stmt->bindParam(2, $idUser);
      $stmt->execute();
        return true;
}

function verificarSiArticleEsPropi($conn, $id){
  $idUser = $_SESSION['idUser'];
  $stmtTemp = $conn->prepare("SELECT * FROM articles WHERE id = ?");
  $stmtTemp->bindParam(1, $id);
  $stmtTemp->execute();
  $resultat = $stmtTemp->fetch(PDO::FETCH_ASSOC);

    if ($resultat && isset($resultat['id_usuaris']) && $resultat['id_usuaris'] == $idUser){
      return true;
    }
    else return false;
}

function borrarArticle($conn, $id){
  $stmtTemp = $conn->prepare("SELECT * FROM articles WHERE id = ?");
  $stmtTemp->bindParam(1, $id);
  $stmtTemp->execute();
  $resultat = $stmtTemp->fetch(PDO::FETCH_ASSOC);

  if ($resultat == ""){
      return false;
  }else{
  $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
  $stmt->bindParam(1, $id);
  $stmt->execute();
    return true;
  }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>