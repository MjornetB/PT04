<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="estil_register.css">
</head>

<body>
<div class="topnav">
  <a href="index.php">Home</a>
  <a class="active" href="register.vista.php">Register</a>
  <div class="login-container">
    <form action="login.php" method="POST">
      <input type="text" placeholder="Username" name="username">
      <input type="text" placeholder="Password" name="psw">
      <button type="submit">Login</button>
    </form>
  </div>
</div>
    <div class="container">
        <form action="register.php" method="post" id="form">
            <div class="mt-5 mb-5 flex-column text-center">
                <div class="mx-auto d-block">
                    <h3>Articulos</h3>
                </div>
                <h4>Registro</h4>
            </div>

            <div class="form-group">
                <label>Introduzca su usuario: </label>
                <input type="text" class="form-control mb-4" placeholder="name" name="name">
            </div>
            <div class="form-group">
                <label>Introduzca su email</label>
                <input type="email" class="form-control mb-4" placeholder="email" name="email">
            </div>
            <div class="form-group">
                <label>Introduzca una contraseña segura: </label>
                <input type="password" class="form-control mb-4" placeholder="Pass" name="password">
            </div>
            <div class="form-group">
                <label>Repita su contraseña: </label>
                <input type="password2" class="form-control mb-4" placeholder="Pass" name="password2">
            </div>
            <input type="submit" name="submit" value="Registre"></input>
        </form>
    </div>
</body>

</html>