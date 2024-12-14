<?php
/**
 * Página principal de la galería de imágenes.
 * @author Jesús Ferrer López
 */
// Comprobar si existe el directorio de imágenes
$imagenes = [];
if (is_dir('images')) {
    $imagenes = array_diff(scandir('images'), array('..', '.'));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos</title>
</head>
<body>
    <h1>Galería de Fotos</h1>

    <div>
        <?php
        if (empty($imagenes)) {
            echo "<h2>No hay imágenes disponibles</h2>";
        } else {
            echo "<h2>Imágenes Disponibles</h2>";
            foreach ($imagenes as $imagen) {
                echo "<img src='images/$imagen' alt='$imagen' style='width:200px;margin:10px;'>";
            }
        }
        ?>
    </div>

    <br>
    <a href="admin.php">Gestión de imágenes</a><br/>
    <a href="https://github.com/Feloje20/unidad_4/tree/main/ficheros/ej_02">Ver código</a>
</body>
</html>
