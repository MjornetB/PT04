<!DOCTYPE html>
<!-- Marc Jornet Boeira -->
<html lang="en">
<!-- Ficher principal HTML -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <link rel="stylesheet" type="text/css" href="../mainActions_Pt02.css">
</head>

<body>
    <!-- Formulari visible -->
    <form id="form" action="../Controladors/modifyController.php" method="POST">
        <label for="DNI">Introduzca el DNI del usuario que quiera modificar: </label><br>
        <input type="text" id="dni" name="dni" />
        <input type="submit" name="showUser" value="Comprueba los datos del usuario">
        <hr>
        <label for="FirstName">Nuevo nombre: </label>
        <input type="text" id="FirstName" name="FirstName" /><br><br>
        <label for="adreca">Nueva direcció: </label>
        <input type="text" id="adreca" name="adreca" value=""/><br>
        <input type="submit" name="submit" value="Enviar"></input>
        </form>
        <a href="../index.php"><button>Vuelve al menu inicio</button></a><br>

    </body>

    </html>