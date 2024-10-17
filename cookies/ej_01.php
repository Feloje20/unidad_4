<?php
    /**
    * 1. Crear cookie de duración limitada.
    * @autor = Jesús Ferrer López
    * @date = 17/10/2024
    */

    // Crear cookie
    setcookie("cookie", "Hola mundo", time()+60);

    echo "Inicio </br>";

    // Mostrar cookie
    if (isset($_COOKIE["cookie"])) {
        echo $_COOKIE["cookie"];
    }

    echo "</br> Fin";

    ?>