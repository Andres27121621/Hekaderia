<!DOCTYPE html>
<html>
<head>
    <title>Compra de Helado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CDFAFA;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
        }
        footer {
             background-color: #333;
             text-align: center;
             padding: 10px;
             position: absolute;
             bottom: 0; /* Asegura que el pie de página esté en la parte inferior */
             width: 100%; /* Ocupa todo el ancho de la ventana */color: #fff;
        }     
    </style>
</head>
<body>
    <h2>Compra de Helado</h2>
    <form action="formularioV.php" method="post">
        <label for="cliente">Cliente:</label>
        <select name="cliente" required>
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

            // Consulta para obtener la lista de clientes
            $clientesSQL = "SELECT IDCliente, Nombre FROM cliente";
            $clientesResult = $conn->query($clientesSQL);

            if ($clientesResult->num_rows > 0) {
                while ($clienteRow = $clientesResult->fetch_assoc()) {
                    echo '<option value="' . $clienteRow['IDCliente'] . '">' . $clienteRow['Nombre'] . '</option>';
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="helado">Helado:</label>
        <select name="helado" required>
            <?php
            // Conexión a la base de datos (ajusta los detalles de conexión)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener la lista de helados
            $heladosSQL = "SELECT IDSabor, Nombre FROM helado";
            $heladosResult = $conn->query($heladosSQL);

            if ($heladosResult->num_rows > 0) {
                while ($heladoRow = $heladosResult->fetch_assoc()) {
                    echo '<option value="' . $heladoRow['IDSabor'] . '">' . $heladoRow['Nombre'] . '</option>';
                }
            }
            $conn->close();
            ?>
        </select>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" min="1" required>

        <input type="submit" value="Realizar Compra">
    </form>
    <footer>
        <p>&copy; 2023 Heladería. Todos los derechos reservados.</p>
    </footer>
</body>
</htm