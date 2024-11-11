<?php
/**
 * 5. Página que devuelve un mensaje que indica el tiempo transcurrido desde la última sesión, usando una cookie.
 * @author Jesús Ferrer López
 * @date 11/11/2024
 */

// Si ya existe la galleta recogemos el tiempo de la última visita.
if (isset($_COOKIE["tiempo"])){
    $tiempo = $_COOKIE["tiempo"];
    $tiempo_transcurrido = strVal(time() - $tiempo) . " segundos desde tu primera visita.";
    setcookie("tiempo", time(), time()+120);
} else {
    setcookie("tiempo", time(), time()+120);
    $tiempo_transcurrido = "Es tu primera visita";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tiempo desde la última visita con cookies</h1>
    <p><?php echo $tiempo_transcurrido ?></p>
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/Feloje20/unidad_4/blob/main/cookies/ej_02.php">Ver código</a></button>
    </div> 
</body>
</html>