<?php
session_start();

// Verifica si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Realiza la conexión a la base de datos (reemplaza con tus propios datos de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "heladeriaH";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar el cliente
    $sql = "INSERT INTO cliente (Nombre, Dirección, Teléfono, CorreoElectronico) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $direccion, $telefono, $email);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        $_SESSION['cliente_registrado'] = true; // Establece la variable de sesión
        header('Location: formulario.php'); // Redirige a la página de registro de clientes
    } else {
        echo "Error al registrar el cliente: " . $stmt->error;
    }

    // Cierra la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no permitido.";
}
?>
