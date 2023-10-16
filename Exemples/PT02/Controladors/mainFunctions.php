<?php
//MARC JORNET BOEIRA. Arxiu que conté les funcions principals.
// els bindParam són per a evitar SQL injection, es fa servir sempre.
//Normalment utilitzo $stmt per a fer la conexió a la base de dades i $stmtTemp per a fer les comprovacions.

//Funció per a introduir l'usuari a la base de dades.
function insertarBBDD($conn, $dni, $nom, $adreca){
    try {
      $stmt = $conn->prepare("INSERT INTO usuaris (dni, nom, adreca) VALUES (?, ?, ?)");
      $stmt->bindParam(1, $dni);
      $stmt->bindParam(2, $nom);
      $stmt->bindParam(3, $adreca);
      $stmt->execute();
      echo "Usuario insertado correctamente";
    } catch (PDOException $e) {
      if ($e->errorInfo[1] == 1062) {
          // Codi d'error 1062: 'Duplicate entry' (entrada duplicada) per a la clau primària
          echo "El usuario con el DNI $dni ya existe.";
      } else {
          echo "Error al insertar el usuario: " . $e->getMessage();
      }
    }
  }
  //Funció per a modificar l'usuari a la base de dades.
  function modificarBBDD($conn, $dni, $nom, $adreca){
    $stmtTemp = $conn->prepare("SELECT nom, adreca FROM usuaris WHERE dni = ?");
    $stmtTemp->bindParam(1, $dni);
    $stmtTemp->execute();
    $resultat = $stmtTemp->fetch(PDO::FETCH_ASSOC);
    $nomTemp = $resultat['nom'];
    $adrecaTemp = $resultat['adreca'];

    if ($nom == ""){
        $nom = $nomTemp;
    }
    if ($adreca == ""){
        $adreca = $adrecaTemp;
    }

    $stmt = $conn->prepare("UPDATE usuaris SET nom = ?, adreca = ? WHERE dni = ?");
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $adreca);
    $stmt->bindParam(3, $dni);

    $stmt->execute();
    echo "Usuario modificado correctamente";
}
//Funció per a mostrar tots els usuaris de la base de dades.
function mostrarUsuariosBBDD($conn){
    $stmt = $conn->prepare("SELECT * FROM usuaris");
    $stmt->execute();
    

    echo '<table>';
    echo '<tr><th>DNI</th><th>Nombre</th><th>Dirección</th></tr>';
    
    while ($resultat = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($resultat['dni']) . '</td>';
        echo '<td>' . htmlspecialchars($resultat['nom']) . '</td>';
        echo '<td>' . htmlspecialchars($resultat['adreca']) . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
//Funció per a mostrar un usuari de la base de dades.
function mostrarUsuarioBBDD($conn, $dni){
    $stmt = $conn->prepare("SELECT * FROM usuaris WHERE dni = ?");
    $stmt->bindParam(1, $dni);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultat == ""){
        echo "El usuario con el DNI $dni no existe.";
    }else{    

    echo '<table>';
    echo '<tr><th>DNI</th><th>Nombre</th><th>Dirección</th></tr>';
    
        echo '<tr>';
        echo '<td>' . htmlspecialchars($resultat['dni']) . '</td>';
        echo '<td>' . htmlspecialchars($resultat['nom']) . '</td>';
        echo '<td>' . htmlspecialchars($resultat['adreca']) . '</td>';
        echo '</tr>';

    
    echo '</table>';
}
}
//Funció per a borrar un usuari de la base de dades.
function borrarBBDD($conn, $dni){
    $stmtTemp = $conn->prepare("SELECT * FROM usuaris WHERE dni = ?");
    $stmtTemp->bindParam(1, $dni);
    $stmtTemp->execute();
    $resultat = $stmtTemp->fetch(PDO::FETCH_ASSOC);

    if ($resultat == ""){
        echo "El usuario con el DNI $dni no existe.";
    }else{
    $stmt = $conn->prepare("DELETE FROM usuaris WHERE dni = ?");
    $stmt->bindParam(1, $dni);
    $stmt->execute();
    echo "Usuario borrado correctamente";
    }
}
//Funció per a formatar les dades introduides per l'usuari.
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
