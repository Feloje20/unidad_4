<?php
/**
 * Archivo para comprobar manejor de ficheros de texto.
 * @autor Jesús Ferrer López
 */

// Importo un archivo
include "./config/conf.php";
include "./procesarForm.php";

// Desglose de alumnos
$desglose = array();
$aUsers = array();
$nombreUsuario = "";

// Verifica que el archivo ha sido subido
if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    // Ruta temporal del archivo subido
    $filePath = $_FILES['file']['tmp_name'];

    // Abrir fichero
    $file = fopen($filePath, "r");
    if (!$file) {
        die("Error al abrir el archivo.");
    }

    // Quitamos la cabecera
    for ($i = 0; $i < LINECABECERA; $i++) {
        fgets($file); // Avanzamos las líneas de cabecera
    }

    // Recorremos el fichero hasta el final feof
    while (!feof($file)) {
        // Leo la línea del fichero
        $alum = fgets($file);
        if (!$alum) continue; // Si la línea está vacía, la ignoramos

        // Uso el replace para quitar tildes, comas y las ñ
        $alumSt = str_replace($caracteres, $caracteresReemplazar, $alum);

        // Pasamos los alumnos a minúsculas
        $alum_minus = strtolower($alumSt);

        // Nos creamos un array con los nombres y apellidos
        $desglose = explode(" ", $alum_minus);

        // Substr para obtener solo los dos primeros caracteres
        if (count($desglose) >= 3) {
            $nombreUsuario = substr($desglose[0], 0, 2) . substr($desglose[1], 0, 2) . substr($desglose[2], 0, 2);

            // Control de usuarios repetidos
            $indice = 0;
            while (in_array($nombreUsuario, $aUsers)) {
                if (!in_array($nombreUsuario . ++$indice, $aUsers)) {
                    $nombreUsuario .= $indice;
                }
            }

            array_push($aUsers, $nombreUsuario);
        }
    }
    fclose($file);

    $contenido;

    // Crear los usuarios según el sistema operativo o base de datos.
    if ($sistema == "Linux") {
        $file = fopen("./Usuarios.sh", "w");
        foreach ($aUsers as $clave) {
            $contenido = "sudo groupadd $clave\nsudo useradd -m -g $clave -s /bin/bash $clave\n";
            fwrite($file, $contenido);
        }
        fclose($file);
    } else {
        $file = fopen("./Usuarios.sql", "w");
        foreach ($aUsers as $clave) {
            $contenido = "CREATE USER '$clave'@'localhost' IDENTIFIED BY '$clave';\n";
            fwrite($file, $contenido);
        }
        fclose($file);
    }
} else {
    die("No se ha subido ningún archivo o el archivo no es válido.");
}
