<?php
/**
 * Agenda de contactos con sesiones
 * @autor Jesús Ferrer López
 * @date 04/11/2024
 */

// Iniciamos sesión
session_start();

// Si no existe la variable de sesión, la inicializamos como array vacío.
if(!isset($_SESSION["contacts"])) {
    $_SESSION["contacts"] = array();
}

// Declaración de variables
$nombre = "";
$email = "";
$telefono = "";
$lprocesaformulario = true;

// Variables de mensaje de error.
$error_nombre = "";
$error_email = "";
$error_telefono = "";

// Determinamos si hemos pulsado el botón enviar.
if (isset($_POST["enviar"])) {
    // recogemos los datos
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    // Validamos los datos.
    if ($nombre == "") {
        $lprocesaformulario = false;
        $error_nombre = "Campo nombre vacío";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $lprocesaformulario = false;
        $error_email = "Email incorrecto";
    }

    if ($telefono == "") {
        $lprocesaformulario = false;
        $error_telefono = "Telefono vacío";
    }

    // Si los datos del formulario son correctos, agregamos los datos a la lista.
    if ($lprocesaformulario) {
        // Agregamos nuevo elemento al array. Ver array_push
        $_SESSION["contacts"][] = array("nombre" => $nombre, "email" => $email, "telefono" => $telefono);
        $nombre = "";
        $email = "";
        $telefono = "";
    }
    
}

// Trabajamos los datos desde una variable $data
$data = $_SESSION["contacts"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agenda</h1>
    <h2>Nuevo contacto</h2>
    <form action="" method="post">
        Nombre<input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"><?php echo $error_nombre;?></br>
        Email <input type="text" name="email" id="email" value="<?php echo $email; ?>"><?php echo $error_email;?></br>
        Telefono<input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>"><?php echo $error_telefono;?></br>
        <input type="submit" name="enviar" value="enviar">
    </form>
    <h2>Contactos</h2>
    <?php
    foreach($data as $contacto => $contacto_info){
        echo $contacto_info['nombre'] . "-" . $contacto_info['email'] . "-" . $contacto_info['telefono'] . "</br>";
    }
    ?>
    </br><a href="cierre.php">cerrar sesión</a>
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/Feloje20/unidad_4/blob/main/sesiones/ej_01.php">Ver código</a></button>
    </div> 
</body>
</html>
