<?php
// Verificar si se recibió un ID de cliente válido
if (isset($_POST['idcliente']) && is_numeric($_POST['idcliente'])) {
    $clienteID = $_POST['idcliente'];

    // Conectar a la base de datos (ajusta los detalles de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "heladeriaH";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el cliente
    $eliminarClienteSQL = "DELETE FROM cliente WHERE IDCliente = $clienteID";

    if ($conn->query($eliminarClienteSQL) === TRUE) {
        // Cliente eliminado con éxito
        echo '<div class="message">Cliente eliminado con éxito.</div>';
    } else {
        // Error al eliminar el cliente
        echo "Error al eliminar el cliente: " . $conn->error;
    }

    $conn->close();
} else {
    // ID de cliente no válido
    echo "ID de cliente no válido. Introduce un número válido.";
}
?>
