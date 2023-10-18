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


?>