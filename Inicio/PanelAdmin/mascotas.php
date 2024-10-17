<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "mas");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recuperar las mascotas
$sql = "SELECT nombre_mas, edad, descripcion, foto FROM mascotas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-inicio/mascotitas.css">
    <title>Lista de Mascotas</title>
</head>
<body>
    <div class="mascota-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="mascota-card">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['foto']) . '" alt="Foto de ' . htmlspecialchars($row['nombre_mas']) . '">';
                echo '<h3>' . htmlspecialchars($row['nombre_mas']) . '</h3>';
                echo '<p>Edad: ' . htmlspecialchars($row['edad']) . ' años</p>';
                echo '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay mascotas disponibles.</p>';
        }
        ?>
    </div>
</body>
</html>
