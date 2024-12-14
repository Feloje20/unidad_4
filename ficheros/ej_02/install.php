<?php
/**
 * Script de instalación de la galería de fotos
 * @author Jesús Ferrer López
 */

session_start();

// Comprobar el espacio libre en disco (10 GB)
$disco = disk_free_space("/");
$espacioRequerido = 10 * 1024 * 1024 * 1024; // 10 GB en bytes

if ($disco < $espacioRequerido) {
    die("Error: El sistema necesita al menos 10GB de espacio libre.");
}

// Solicitar las credenciales del administrador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = $_POST['usuario'];
    $password = $_POST['contrasenia'];

    // Guardar las credenciales en un archivo (debe protegerse adecuadamente en producción)
    file_put_contents('config/admin_credentials.txt', json_encode([
        'usuario' => $admin,
        'contrasenia' => $password
    ]));

    // Crear el directorio para almacenar imágenes
    if (!is_dir('images')) {
        mkdir('images', 0777, true);
    }

    // Redireccionar al inicio de la galería
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej 02</title>
</head>
<body>
    <h2>Instalación de la Galería de Fotos</h2>
    <form action="install.php" method="POST">
        <label for="usuario">Usuario Administrador:</label>
        <input type="text" name="usuario" required><br>

        <label for="contrasenia">Contraseña Administrador:</label>
        <input type="password" name="contrasenia" required><br>

        <button type="submit">Instalar</button>
    </form>
</body>
</html>

<?php
// Eliminar el script de instalación después de la primera ejecución
if (file_exists(__FILE__)) {
    unlink(__FILE__);
}
?>
