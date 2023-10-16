<?PHP
require "index.php";
if(isset($_REQUEST["name"])){

$name = $_REQUEST["name"];
$email= $_REQUEST["email"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];


//Comprovem les dades introduides
if($name == ""){
    $errores[] = "El nombre es requerido";
}
elseif(!preg_match('/^[a-zA-Z0-9]{5,16}$/', $name)){
    $errores[] = "El nombre no tiene el formato válido, utilice letras de la a-z y numeros, evitando carácteres especiales. También tiene que contener entre 5 y 16 carácteres";
}


if($email == ""){
    $errores[] = "El email es requerido";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errores[] = "El email no tiene el formato válido";
}

if($password == ""){
    $errores[] = "La contraseña es requerida";
}
elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,18}$/', $password)){
    $errores[] = "La contraseña no tiene el formato válido, tiene que contener al menos un número, al menos una letra o algun caracter especial de estos: !@#$% y entre 8 y 18 carácteres";
}

if ($password != $password2){
    $errores[] = "Las contraseñas no coinciden";
}

$password = password_hash($password, PASSWORD_BCRYPT);

if (isset($_POST['submit']) && empty($errores)) {
registerUserBBDD($conn, $name, $email, $password);
}
elseif(isset($_POST['submit']) && !empty($errores)){
    echo "<div class='alert alert-danger'>";
    foreach ($errores as $error){
        echo "<li>$error</li>";
    }
    echo "</div>";
}
}
include "register.vista.php";
?>