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
    echo "Has visitado la página " + $_COOKIE["galleta_contadora"] + " veces";