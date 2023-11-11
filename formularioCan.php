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

// Realizar una consulta para obtener los sabores de helado y la cantidad de cada sabor
$sql = "SELECT helado.Nombre AS sabor, SUM(DetallePedido.Cantidad) AS CantidadTotal
        FROM helado
        LEFT JOIN DetallePedido ON helado.IDSabor = DetallePedido.IDSabor
        GROUP BY helado.Nombre";

$result = $conn->query($sql);

// Comprobar si se encontraron resultados
if ($result->num_rows > 0) {
    echo "<h2>Cantidad de Sabores de Helado</h2>";
    echo "<table>";
    echo "<tr><th>Sabor de Helado</th><th>Cantidad Total</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Sabor"] . "</td>";
        echo "<td>" . $row["CantidadTotal"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron registros de sabores de helado en la base de datos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
