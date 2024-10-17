<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "mas");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipoAnimal = $_POST['animalType'];
    $edad = $_POST['age'];
    $descripcion = $_POST['description'];
    $foto = $_FILES['image']['tmp_name'];

    // Leer la imagen como binario
    $fotoContenido = addslashes(file_get_contents($foto));

    // Insertar en la base de datos
    $sql = "INSERT INTO mascotas (nombre_mas, edad, descripcion, foto) VALUES ('$tipoAnimal', '$edad', '$descripcion', '$fotoContenido')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo animal subido exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-inicio/paneladmin.css">
    <link rel="icon" href="crs-favicon/Icono.png">
    <title>Panel de Subida de Animales</title>
</head>
<body>
    <div class="container">
        <h1>Subir Animal</h1>
        <form id="animalForm" method="POST" enctype="multipart/form-data">
            <label for="animalType">Tipo de Animal:</label>
            <select id="animalType" name="animalType" required>
                <option value="" disabled selected>Selecciona un tipo</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
            </select>

            <label for="age">Edad (en años):</label>
            <input type="number" id="age" name="age" required min="0">

            <label for="description">Descripción:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="image">Imagen:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Subir Animal</button>
        </form>
    </div>
</body>
</html>
