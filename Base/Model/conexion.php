<?php
function conectar_db($base = "mas") {
    // Datos de conexión por defecto, pero se pueden personalizar al llamar a la función
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $base);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>