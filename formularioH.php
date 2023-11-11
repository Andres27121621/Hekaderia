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
    <h2>Sabores de Helado Disponibles</h2>
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

    // Realizar una consulta para obtener los sabores de helado disponibles
    $sql = "SELECT IDSabor, Nombre, Descripcion, Precio, CantidadInventario FROM Helado";
    $result = $conn->query($sql);

    // Comprobar si se encontraron resultados
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Inventario</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["IDSabor"] . "</td>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Descripcion"] . "</td>";
            echo "<td>$" . $row["Precio"] . "</td>";
            echo "<td>" . $row["CantidadInventario"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron sabores de helado disponibles.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
     <a href="index.php" class="buy-button">Volver</a>
</body>
</html>
