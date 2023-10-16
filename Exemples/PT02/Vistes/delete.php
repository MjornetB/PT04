<!DOCTYPE html>
<!-- Marc Jornet Boeira -->
<html lang="en">
<!-- Ficher principal HTML -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" type="text/css" href="../mainActions_Pt02.css">
</head>

<body>
    <!-- Formulari visible -->
    <form id="form" action="../Controladors/deleteController.php" method="POST">
        <label for="dni">Introduzca el DNI del usuario que quiera borrar: </label><br>
        <input type="text" id="dni" name="dni" /><br>
        <input type="submit" name="submit" value="Enviar"></input>
    </form>
    <a href="../index.php"><button>Vuelve al menu inicio</button></a><br>

</body>

</html>