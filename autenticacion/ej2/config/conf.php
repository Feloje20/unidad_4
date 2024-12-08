<?php
/**
 * Archivo de configuración para ej1 de autentificación
 * @author Jesús Ferrer López
 * @date 08/12/2024
 */

 $users = [["usuario", "password"], ["admin", "12345"], ["pepe", "pepa"]];

function clearData($cadena) {
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = htmlspecialchars($cadena);
    return $cadena;
}