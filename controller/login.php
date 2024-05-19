<?php
// Verificar si se han enviado datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el correo electrónico y la contraseña del formulario
    $nombre = $_POST["nombre"];
    $contra = $_POST["contra"];
    
    // Conectar a la base de datos (aquí debes colocar tus credenciales y detalles de conexión)
    $servername = "localhost";
    $username = "root";
    $password_bd = "";
    $database = "autolav";

    $conn = new mysqli($servername, $username, $password_bd, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
    }

    // Consultar la base de datos para encontrar al usuario con el correo electrónico proporcionado
    $sql = "SELECT id, nombre, contra FROM usuarios WHERE nombre = '$nombre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encontró el usuario, verificar la contraseña
        $row = $result->fetch_assoc();
        if (password_verify($contra, $row["contra"])) {
            // Contraseña válida, iniciar sesión o redirigir a una página de inicio de sesión exitosa
            echo "Inicio de sesión exitoso. Bienvenido " . $row["nombre"];
        } else {
            // Contraseña incorrecta, redirigir o mostrar un mensaje de error
            echo "Contraseña incorrecta";
        }
    } else {
        // No se encontró ningún usuario con el correo electrónico proporcionado, redirigir o mostrar un mensaje de error
        echo "Usuario no encontrado";
    }
    $conn->close();
}
?>
