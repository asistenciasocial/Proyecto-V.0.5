<?php
function registrar_usuario($nombre, $email, $password){
    // Validar datos
    if (empty($nombre) || empty($email) || empty($password)) {
        return "Por favor, completa todos los campos.";
    }

    // Encriptar contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Conectar a la base de datos
    $conn = conectar_db();

    // Preparar sentencia
    $stmt = $conn->prepare("INSERT INTO usuario (nombre_usu, mail, clave) VALUES (?, ?, ?,'null')");
    $stmt->bind_param("sss", $nombre, $email, $password_hash);

    // Ejecutar sentencia
    if ($stmt->execute()) {
        return "Usuario registrado correctamente.";
    } else {
        return "Error al registrar usuario: " . $stmt->error;
    }

    $conn->close();
}