<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Heladería</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* Estilos para la barra de navegación */
        nav {
            background-color: #007BFF;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav li {
            display: inline;
            margin: 10px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a la Heladería Ice Cream Paradise</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#menu">Menú de Helados</a></li>
            <li><a href="formulario.php">Registrar Cliente</a></li>
            <li><a href="formularioH.php">Visualizar Sabores de Helado</a></li>
            <li><a href="formularioPedi.php">Mostrar Pedidos</a></li>
            <li><a href="venta.php">Comprar Helado</a></li>
            <li><a href="login.php">Administrador</a></li>
        </ul>
    </nav>

    <section id="menu">
        <h2>Menú de Helados</h2>
        <div class="ice-cream-list">
            <?php
    

// Array para almacenar las rutas de las imágenes de los helados
$imagenesHelados = array(
    "./img/chocolate.jpg",
    "./img/fresa.jpg",
    "./img/vainilla.jpg",
    "./img/mango.jpg",
    "./img/nues.jpg",
    "./img/ron.jpg",
    "./img/frambuesa.jpg",
    "./img/limon.jpg",
    "./img/coco.jpg",
    "./img/mora.jpg",
    "./img/pis.jpg"
    
    
);

// Conectar a la base de datos (reemplaza con tus propios datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heladeriaH";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los helados de la base de datos
$sql = "SELECT Nombre, Precio FROM helado";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $imagenIndex = 0; // Índice para acceder a las rutas de imágenes del array
   
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container" >';
        echo '<div class="ice-cream" >';
        echo '<img src="' . $imagenesHelados[$imagenIndex] . '" alt="' . $row["Nombre"] . '">';
        echo '<h3>' . $row["Nombre"] . '</h3>';
        echo '<p>Precio: $' . number_format($row["Precio"], 2) . '</p>';
        echo '<a href="venta.php" class="buy-button">Comprar</a>'; 
        echo '</div>';
        echo '</div>';

        $imagenIndex++; // Avanzar al siguiente índice del array de imágenes
    }
} else {
    echo "No se encontraron helados en la base de datos.";
}
$conn->close();
?>
        </div>
    </section>

    
</body>
</html>
