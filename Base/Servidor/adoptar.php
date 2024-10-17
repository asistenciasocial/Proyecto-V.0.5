<?php
// Conexión a la base de datos
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$tipoMascota = $_POST['tipoMascota'];

// Insertar datos en la base de datos
$sql = "INSERT INTO adopciones (nombre, email, telefono, direccion, tipo_mascota) VALUES ('$nombre', '$email', '$telefono', '$direccion', '$tipoMascota')";

if ($conn->query($sql) === TRUE) {
    // Solicitud de adopción enviada correctamente
    // Redireccionar o mostrar mensaje de éxito
} else {
    // Error al enviar la solicitud
    // Mostrar mensaje de error
}

$conn->close();
?>