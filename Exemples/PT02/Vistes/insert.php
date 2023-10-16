<!DOCTYPE html>
<!-- Marc Jornet Boeira -->
<html lang="en">
<!-- Ficher principal HTML -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert User</title>
    <link rel="stylesheet" type="text/css" href="../mainActions_Pt02.css">
</head>

<body>
    <!-- Formulari visible -->
    <form id="form" action="../Controladors/insertController.php" method="POST">
        <label for="DNI">DNI: </label>
        <input type="text" id="dni" name="dni" /><br>
        <label for="FirstName">Nombre: </label>
        <input type="text" id="FirstName" name="FirstName" /><br>
        <label for="adreca">Dirección: </label>
        <input type="text" id="adreca" name="adreca" /><br>
        <input type="submit" name="submit" value="Enviar"></input>

    </form>
    <a href="../index.php"><button>Vuelve al menu inicio</button></a><br>

</body>

</html>