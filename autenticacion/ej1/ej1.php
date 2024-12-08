<?php
/**
 * Ejercicio de autentificación con login de usuario para mostrar vistas públicas y privadas.
 * @autho Jesús Ferrer López
 * @date 08/12/2024
 */

 require_once "./config/conf.php";
 $auth = false; // Variable que determina si el usuario está logeado.
 $usuario = "";
 $password = "";
 $error = "";

 session_start();

 if (isset($_POST["enviar"])) {
    $usuario = clearData($_POST["usuario"]);
    $password = clearData($_POST["password"]);

    // Comprobamos que el usuario exista
    foreach ($users as $valor => $user) {
        if ($usuario === $user[0] && $password === $user[1]) {
            $auth = true;
            $_SESSION["usuario"] = $usuario;
            break;
        }
    }

    // Si la autenticación es incorrecta, ponemos un error.
    if (!$auth) {
        $error = "Credenciales incorrectas";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej1 autentificacion</title>
</head>
<body>
    <h1>Ejercicio 1 de autentificación</h1>
    <?php 
        if (!$auth) {
    ?>
    <form method="POST" action="">
        <label>Usuario</label>
        <input type="text" name="usuario">
        <label>Contraseña</label>
        <input type="text" name="password">
        <input type="submit" name="enviar">
        <?php echo $error; ?>
    </form>
    <?php
        } else {
            echo "<h2>Bienvenido " . $_SESSION["usuario"] . "</h2>";
    ?>
        <h3>Zona privada</h3>
        
        <p>Esto es una zona privada, significa que te has logeado con éxito.</p>
    <?php
        }
    ?>
    <h3>Zona pública</h3>
    <p>Todo el mundo puede ver esta zona, incluso si no se han logeado.</p>
    <?php
        if ($auth) {
            echo "<a href='./config/cerrarSesion.php'>Cerrar sesión</a>";
        }
    ?>
</body>
</html>