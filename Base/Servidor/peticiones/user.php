<?php
include '../../modelo/usuario.php';

function registrar_usuario($nombre, $email, $password) {
    // Validar datos (implementar validaciones más robustas)
    if (empty($nombre) || empty($email) || empty($password)) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // Encriptar contraseña (utilizar una función de encriptación segura)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Conectar a la base de datos
    $conn = conectar_db();

    // Preparar sentencia
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password_hash);

    // Ejecutar sentencia
    if ($stmt->execute()) {
        return true;
    } else {
        throw new Exception("Error al registrar usuario: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}

// ... (resto del código)

try {
    // Obtener datos del formulario o de la solicitud JSON
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    } else {
        // Datos del JSON
        $json = json_decode(file_get_contents('php://input'), true);
        $nombre = $json['nombre'];
        $email = $json['email'];
        $password = $json['password'];
    }

    // Registrar usuario
    registrar_usuario($nombre, $email, $password);

    // Enviar respuesta
    echo json_encode(['mensaje' => 'Usuario registrado correctamente']);
} catch (Exception $e) {
    // Manejar la excepción y enviar un mensaje de error
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}