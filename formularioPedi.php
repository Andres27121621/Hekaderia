<!DOCTYPE html>
<html>
<head>
    <title>Sabores de Helado Disponibles</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
           
            background-color: #CDFAFA;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Pedidos Realizados</h2>
<?php
// Conectar a la base de datos (reemplaza con tus propios datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heladeriaH";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Realizar la consulta
$sql = "SELECT pedido.*, cliente.Nombre AS NombreCliente
        FROM pedido
        INNER JOIN cliente ON pedido.IDCliente = cliente.IDCliente";

$result = $conn->query($sql);

// Comprobar si se encontraron resultados
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID Pedido</th><th>Fecha del Pedido</th><th>Hora</th><th> Total</th><th>IDCliente</th><th>Nombre del Cliente</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["NumeroPedido"] . "</td>";
        echo "<td>" . $row["Fecha"] . "</td>";
        echo "<td>" . $row["Hora"] . "</td>";
        echo "<td>" . $row["Total"] . "</td>";
        echo "<td>" . $row["IDCliente"] . "</td>";
        echo "<td>" . $row["NombreCliente"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron pedidos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
    <a href="index.php"><button>Volver</button></a>
    <footer>
        <p>&copy; 2023 Heladería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
