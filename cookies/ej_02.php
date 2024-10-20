<?php
    /**
    * 2. Borrar la cookie.
    * @autor = Jesús Ferrer López
    * @date = 17/10/2024
    */

    // Mostrar cookie y comprobar si existe
    if (isset($_COOKIE["cookie"])) {
        setcookie("cookie", "Hola mundo", time()-60);
        echo "borrar cookie";
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
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/Feloje20/unidad_4/blob/main/cookies/ej_02.php">Ver código</a></button>
    </div> 
</body>
</html>