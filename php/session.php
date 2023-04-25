<?php
require_once('conexion.php');

$username = $_POST['username'];
$password = $_POST['password'];

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '1234567', 'store');

// Verificando si la conexión es exitosa
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Consulta SQL para buscar un usuario con el nombre de usuario y contraseña proporcionados
$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Si se encuentra el usuario, crear una sesión y redirigirlo a la página de inicio de sesión
if ($result->num_rows > 0) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header('Location: ../index.php');
} else {
    header('Location: ../login.php?error=6969');
}

// Cerrar la conexión a la base de datos
$conn->close();
?>