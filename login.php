<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión - Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CDFAFA;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
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
    <div class="container">
        <h2>Iniciar Sesión - Administrador</h2>
        <?php if (isset($error_message)) { echo '<p>' . $error_message . '</p>'; } ?>
        <form action="paneladmin.php" method="POST">
            <label for="email">Correo Electrónico:</label>
            <input type="text" id="email" name="email" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
    <footer>
        <p>&copy; 2023 Heladería. Todos los derechos reservados.</p>
    </footer>
</body>
</html>