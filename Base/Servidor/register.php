
<?php
// Conexión a la base de datos (igual que en login.php)
include('../Model/usuario.php');
// Obtener datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insertar datos en la base de datos
$insertar = registrar_usuario($username, $email, $password);

if ($insertar == "Usuario registrado correctamente.") {
    header('Location: '.'../from/respuestas-server/respuestas-altas.php');
    exit();
}