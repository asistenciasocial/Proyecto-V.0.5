
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
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la base de datos
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, iniciar sesión
    // Redireccionar o mostrar mensaje de éxito
} else {
    // Usuario no encontrado, mostrar mensaje de error
}

$conn->close();
?>