<!DOCTYPE html>
<html>
<head>
    <title>Factura de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CDFAFA;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Factura de Compra</h2>
        <?php
        // Conexión a la base de datos (ajusta los detalles de conexión)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "heladeriaH";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Recopila los datos del formulario de compra
        $clienteID = $_POST['cliente'];
        $heladoID = $_POST['helado'];
        $cantidad = $_POST['cantidad'];

        // Obtiene el nombre del cliente y el precio del helado desde la base de datos
        $clienteNombre = "";
        $precioHelado = 0.0;

        $clienteSQL = "SELECT Nombre FROM cliente WHERE IDCliente = $clienteID";
        $clienteResult = $conn->query($clienteSQL);

        if ($clienteResult->num_rows > 0) {
            $clienteRow = $clienteResult->fetch_assoc();
            $clienteNombre = $clienteRow['Nombre'];
        }

        $heladoSQL = "SELECT Nombre, Precio FROM helado WHERE IDSabor = $heladoID";
        $heladoResult = $conn->query($heladoSQL);

        if ($heladoResult->num_rows > 0) {
            $heladoRow = $heladoResult->fetch_assoc();
            $heladoNombre = $heladoRow['Nombre'];
            $precioHelado = $heladoRow['Precio'];
        }

        // Calcula el precio total de la compra
        $precioTotal = $precioHelado * $cantidad;

        // Inserta la venta en la tabla de Ventas
        $insertVentaSQL = "INSERT INTO venta (IDCliente, IDSabor, FechaVenta, PrecioHelado) VALUES ($clienteID, $heladoID, NOW(), $precioTotal)";
        if ($conn->query($insertVentaSQL) === TRUE) {
            echo "Compra realizada con éxito.<br>";
        } else {
            echo "Error al registrar la compra: " . $conn->error;
        }

        // Genera la factura
        
        echo '<p><strong>Cliente:</strong>'.$clienteNombre . '</p>';
        echo '<p><strong>Helado:</strong>'.$heladoNombre . '</p>';
        echo '<p><strong>Cantidad:</strong>'.$cantidad . '</p>';
        echo '<p><strong>Precio Unitario:</strong>'.$precioHelado . '</p>';
        echo '<p><strong>Precio Total:</strong>'.$precioTotal . '</p>';

        $conn->close();
        ?>
    </div>
</body>
</html>
