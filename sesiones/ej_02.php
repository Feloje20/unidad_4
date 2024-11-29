<?php
/**
 * Agenda de contactos con sesiones
 * @autor Jesús Ferrer López
 * @date 04/11/2024
 */

// Iniciamos sesión
session_start();

$resolucion = "<p>Presione en las fotos para resolver el puzzle.</p><br/>";  // Variable que muestra la resolución del puzzle.

// Haz un array con las parejas de las piezas de los puzles
$puzles[] = ["piezas/a1.JPG", "piezas/a2.JPG"];
$puzles[] = ["piezas/b1.JPG", "piezas/b2.JPG"];
$puzles[] = ["piezas/c1.JPG", "piezas/c2.JPG"];
$puzles[] = ["piezas/d1.JPG", "piezas/d2.JPG"];
$puzles[] = ["piezas/e1.JPG", "piezas/e2.JPG"];
$puzles[] = ["piezas/f1.JPG", "piezas/f2.JPG"];

// Inicializamos las variables de la sesión si no están definidas
if (!isset($_SESSION['puzle_index1']) || !isset($_SESSION['puzle_index2'])) {
    $_SESSION['puzle_index1'] = random_int(0, count($puzles) - 1);
    $_SESSION['puzle_index2'] = random_int(0, count($puzles) - 1);
    $_SESSION['intentos'] = 0;
    $_SESSION['aciertos'] = 0;
}

// Si el usuario ha presionado el botón de reiniciar, randomizamos los índices
if (isset($_POST['reiniciar'])) {
    $_SESSION['puzle_index1'] = random_int(0, count($puzles) - 1);
    $_SESSION['puzle_index2'] = random_int(0, count($puzles) - 1);
}

// Si se ha pulsado un botón, incrementamos el índice correspondiente
if (isset($_POST['imagen1'])) {
    $_SESSION['puzle_index1'] = ($_SESSION['puzle_index1'] + 1) % count($puzles);
} elseif (isset($_POST['imagen2'])) {
    $_SESSION['puzle_index2'] = ($_SESSION['puzle_index2'] + 1) % count($puzles);
}

// Comprobamos si la resolución del puzle es correcta al presionar el botón "resolver"
if (isset($_POST["resolver"])) {
    $current_index1 = $_SESSION['puzle_index1'];
    $current_index2 = $_SESSION['puzle_index2'];
    $_SESSION['intentos']++;
    if ($current_index1 === $current_index2) {
        $resolucion =  "<p>¡Enhorabuena! Has resuelto el puzle.</p><br/>";
        $_SESSION['aciertos']++;
        // Si se acierta el puzle, randomizamos los índices
        $_SESSION['puzle_index1'] = random_int(0, count($puzles) - 1);
        $_SESSION['puzle_index2'] = random_int(0, count($puzles) - 1);
    } else {
        $resolucion = "<p>Lo siento, no has resuelto el puzle.</p><br/>";
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
        </button><br/>
        <input type="submit" name="resolver" value="resolver"><br/>
        <input type="submit" name="reiniciar" value ="reiniciar"><br/>
    </form>
    <?php echo $resolucion; ?>
    <p>Intentos: <?php echo $_SESSION['intentos']; ?></p>
    <p>Aciertos: <?php echo $_SESSION['aciertos']; ?></p>
    </br><a href="cierre2.php">cerrar sesión</a>
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/Feloje20/unidad_4/blob/main/sesiones/ej_02.php">Ver código</a></button>
    </div> 
</body>
</html>