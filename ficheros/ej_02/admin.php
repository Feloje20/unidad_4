<?php
/**
 * Página de administración de imágenes.
 * @author Jesús Ferrer López
 */
session_start();

// Comprobar si el administrador está autenticado
if (!isset($_SESSION['admin_authenticated']) || $_SESSION['admin_authenticated'] !== true) {
    header("Location: login.php");
    exit;
}

// Funciones de gestión de imágenes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'subir':
            // Subir una nueva imagen
            if (isset($_FILES['nueva_imagen'])) {
                $file = $_FILES['nueva_imagen'];
                move_uploaded_file($file['tmp_name'], 'images/' . $file['name']);
            }
            break;

        case 'borrar':
            // Borrar una imagen
            unlink('images/' . $imagen);
            break;

        case 'copiar':
            // Copiar una imagen
            copy('images/' . $imagen, 'images/copied_' . $imagen);
            break;

        case 'renombrar':
            // Renombrar una imagen
            $nuevo_nombre = $_POST['nuevo_nombre'];
            rename('images/' . $imagen, 'images/' . $nuevo_nombre);
            break;
    }
}

// Obtener todas las imágenes
$imagenes = array_diff(scandir('images'), array('..', '.'));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
</head>
<body>
    <h1>Gestión de Imágenes</h1>

    <h2>Subir Nueva Imagen</h2>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="nueva_imagen" required>
        <button type="submit" name="accion" value="subir">Subir Imagen</button>
    </form>

    <h2>Operaciones sobre Imágenes</h2>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Vista Previa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imagenes as $imagen): ?>
            <tr>
                <td><?php echo $imagen; ?></td>
                <td><img src="images/<?php echo $imagen; ?>" alt="<?php echo $imagen; ?>" style="max-width: 100px; max-height: 100px;"></td>
                <td>
                    <form action="admin.php" method="POST" style="display:inline;">
                        <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                        <button type="submit" name="accion" value="borrar">Borrar</button>
                    </form>
                    <form action="admin.php" method="POST" style="display:inline;">
                        <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                        <button type="submit" name="accion" value="copiar">Copiar</button>
                    </form>
                    <form action="admin.php" method="POST" style="display:inline;">
                        <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                        <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre" required>
                        <button type="submit" name="accion" value="renombrar">Renombrar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="index.php" method="GET">
        <button type="submit">Volver al Índice</button>
    </form>
</body>
</html>
