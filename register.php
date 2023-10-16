<?PHP
require "index.php";
if(isset($_REQUEST["name"])){

$name = $_REQUEST["name"];
$email= $_REQUEST["email"];
$password = $_REQUEST["password"];
$password2 = $_REQUEST["password2"];
$password = password_hash($password, PASSWORD_BCRYPT);

registerUserBBDD($conn, $name, $email, $password);
}
?>