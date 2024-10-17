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