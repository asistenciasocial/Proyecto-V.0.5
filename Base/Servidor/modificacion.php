<?php
function conectar_db() {
    // Datos de conexión a la base de datos
    $servername = "tu_servidor";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tu_base_de_datos";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Función para insertar un usuario
function insertar_usuario($nombre, $email, $password) {
    $conn = conectar_db();

    // Preparar sentencia
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);

    // Ejecutar sentencia
    if ($stmt->execute()) {
        // Éxito
    } else {
        // Error
    }

    $stmt->close();
    $conn->close();
}

// ... (funciones similares para iniciar sesión y registrar adopción)