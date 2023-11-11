<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Helado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CDFAFA;
        }

        header {
            background-color: #ff9900;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        form {
            width: 300px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="email"] {
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
            color: #008000;
            /* Color verde para el mensaje de éxito */
        }

        footer {
            background-color: #333;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            /* Asegura que el pie de página esté en la parte inferior */
            width: 100%;
            /* Ocupa todo el ancho de la ventana */
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registro de Helado</h1>
    </header>

    <form action="formularioagregar.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre del Helado" required>
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="text" name="precio" placeholder="Precio" required>
        <input type="text" name="inventario" placeholder="Cantidad en Inventario" required>
        <input type="submit" value="Registrar Helado">
    </form>

    <footer>
        &copy; 2023 Heladería. Todos los derechos reservados.
    </footer>
</body>
</html>
