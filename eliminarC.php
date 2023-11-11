<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cliente</title>
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
        }

        footer {
            background-color: #333;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <h1>Eliminar Cliente</h1>
    </header>

    <form action="formularioelim.php" method="post">
        <input type="text" name="idcliente" placeholder="ID del Cliente a Eliminar" required>
        <input type="submit" value="Eliminar Cliente">
    </form>

    <footer>
        &copy; 2023 Heladería. Todos los derechos reservados.
    </footer>
</body>
</html>
