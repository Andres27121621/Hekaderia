<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administrador</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        
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
    
    <header>
        <h1>Bienvenido</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="agregarH.php">Agregar Helado</a></li>
            <li><a href="eliminarC.php">Eliminar Cliente</a></li>
            <li><a href="index.php">Cerrar sesión</a></li>
            <!-- Agrega más enlaces de navegación según tus necesidades -->
        </ul>
    </nav>

    <section>
        <!-- Contenido del panel de administrador -->
    </section>

    <footer>
        <p>&copy; 2023 Heladería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
