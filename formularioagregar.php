<?php
// Conectar a la base de datos (ajusta los detalles de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heladeriaH";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$inventario = $_POST['inventario'];

// Preparar la consulta SQL para agregar el nuevo helado
$sql = "INSERT INTO helado (Nombre, Descripcion, Precio, CantidadInventario) VALUES (?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $inventario);

    if ($stmt->execute()) {
        echo "Helado agregado con éxito.";
    } else {
        echo "Error al agregar el helado: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
