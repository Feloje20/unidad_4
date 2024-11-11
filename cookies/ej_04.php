<?php
    /**
    * 4. Contador que almacena el número de visitas a una página web.
    * @autor = Jesús Ferrer López
    * @date = 17/10/2024
    */

    if (!isset($_COOKIE["galleta_contadora"])) {
        // Si la galleta no existe, inicializamos el contador.
        setcookie("galleta_contadora", 0 , time()+120);
    }
    // En caso de que exista, recuperamos el valor del contador y lo aumentamos.
    else {
        // Vamos sumando 1 al valor de la galleta.
        /*
        $valor = $_COOKIE["galleta_contadora"] + 1;
        setcookie("galleta_contadora", $valor , time()+120);
        */
        setcookie("galleta_contadora", $_COOKIE["galleta_contadora"] + 1 , time()+120);
    }
    // Mostramos la cookie
    echo "Has visitado la página " . $_COOKIE["galleta_contadora"] . " veces";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/Feloje20/unidad_4/blob/main/cookies/ej_04.php">Ver código</a></button>
    </div> 
</body>
</html>