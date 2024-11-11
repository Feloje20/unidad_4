<?php
/**
 * Agenda de contactos con sesiones
 * @autor Jesús Ferrer López
 * @date 04/11/2024
 */

// Iniciamos sesión
session_start();

// Si no existe la variable de sesión, la creamos
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = "";
}

// Inicializamos los índices de las imágenes si no están definidos
if (!isset($_SESSION['puzle_index1'])) {
    $_SESSION['puzle_index1'] = 0;
}
if (!isset($_SESSION['puzle_index2'])) {
    $_SESSION['puzle_index2'] = 0;
}

// Haz un array con las parejas de las piezas de los puzles
$puzles[] = ["piezas/a1.JPG", "piezas/a2.JPG"];
$puzles[] = ["piezas/b1.JPG", "piezas/b2.JPG"];
$puzles[] = ["piezas/c1.JPG", "piezas/c2.JPG"];
$puzles[] = ["piezas/d1.JPG", "piezas/d2.JPG"];
$puzles[] = ["piezas/e1.JPG", "piezas/e2.JPG"];
$puzles[] = ["piezas/f1.JPG", "piezas/f2.JPG"];

// Si se ha pulsado un botón, incrementamos el índice correspondiente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['imagen1'])) {
        $_SESSION['puzle_index1'] = ($_SESSION['puzle_index1'] + 1) % count($puzles);
    } elseif (isset($_POST['imagen2'])) {
        $_SESSION['puzle_index2'] = ($_SESSION['puzle_index2'] + 1) % count($puzles);
    }
}

$current_index1 = $_SESSION['puzle_index1'];
$current_index2 = $_SESSION['puzle_index2'];
?>

<!-- VISTA -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzle infantil</title>
</head>
<body>
    <h1>Puzles infantiles</h1>
    <form method="POST" action="">
        <button name="imagen1">
            <img src="<?php echo $puzles[$current_index1][0]; ?>" alt="imagen1" width="100" height="100">
        </button></br>
        <button name="imagen2">
            <img src="<?php echo $puzles[$current_index2][1]; ?>" alt="imagen2" width="100" height="100">
        </button>
    </form>
    </br><a href="cierre2.php">cerrar sesión</a>
    <div class="ver_codigo">
        <button type="button"><a href="">Ver código</a></button>
    </div> 
</body>
</html>