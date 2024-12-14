<?php
/**
 * Página de login para el administrador.
 * @author Jesús Ferrer López
 */
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Cargar las credenciales del archivo
    $credenciales = json_decode(file_get_contents('config/admin_credentials.txt'), true);

    if ($usuario === $credenciales['usuario'] && $contrasenia === $credenciales['contrasenia']) {
        $_SESSION['admin_authenticated'] = true;
        header("Location: admin.php");
        exit;
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
</head>
<body>
    <h1>Login Administrador</h1>
    <form action="login.php" method="POST">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasenia" required><br><br>

        <button type="submit">Acceder</button>
    </form>
</body>
</html>
