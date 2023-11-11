<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro de Clientes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CDFAFA;
        }

        header {
            background-color: #ff9900;
             color: #fff;
             text-align: center;
            padding: 20px;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"], input[type="email"] {
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
        .message {
            font-size: 24px; 
            color: #008000; /* Color verde para el mensaje de éxito */
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
<div class="container">
        <h1>Registro de Clientes</h1>
        <?php
        session_start();
        if (isset($_SESSION['cliente_registrado']) && $_SESSION['cliente_registrado']) {
            echo '<p class="message">Cliente registrado con éxito.</p>';
            $_SESSION['cliente_registrado'] = false;
        }
        ?>
   
    <form action="conexion.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Registrar Cliente">
        
    </form>
    <footer>
        <p>&copy; 2023 Heladería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
