<?php
session_start();

// Verificar si ya hay una sesión activa, si es así, redirigir al panel de administrador
if (isset($_SESSION['admin_id'])) {
    header("Location: panel_admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (ajusta los detalles de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "heladeriaH";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Realizar una consulta para verificar las credenciales del administrador
    $sql = "SELECT IDAdministrador, Nombre, CorreoElectronico, Contrasena FROM administrador WHERE CorreoElectronico = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nombre, $correo, $contrasena);
            $stmt->fetch();

            // Verificar si la contraseña es correcta (debes usar password_verify)
            if (password_verify($password, $contrasena)) {
                // Las credenciales son válidas, iniciar sesión
                $_SESSION['admin_id'] = $id;
                $_SESSION['admin_nombre'] = $nombre;
                header("Location: paneladmin.php");
                exit();
            } else {
                // Contraseña incorrecta, mostrar un mensaje de error
                $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
            }
        } else {
            // Correo electrónico no encontrado, mostrar un mensaje de error
            $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>


