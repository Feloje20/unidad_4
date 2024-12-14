<?php
/**
 * @author Jesús Ferrer López
 */

// Definicion de constante
define("LINECABECERA", 1);
define("ANIOINICIO", 2020);
define("ANIOFINAL", 2030);

// Directorio donde se subiran los archivos
define("DIRUPLOAD", "./upload/");
// Tamaño maximo del archivo
define("MAXSIZE", 200000);

// Creamos dos arrays para reemplazar los caracteres
$caracteres = array("Á", "á", "É", "é", "Í", "í", "Ó", "ó", "Ú", "ú", "Ü", "ü", "Ñ", "ñ", ",");
$caracteresReemplazar = array("A", "a", "E", "e", "I", "i", "O", "o", "U", "u", "U", "u", "N", "n", "");

// Creamos los arrays para los campos del formulario
$grupos = array("1DAW", "2DAW", "1ASIR", "2ASIR");
$formato = array("Linux", "MySql");

// Declaro la extension y formato válido
$allowedExt = array("csv");
$allowedFormat = array("text/csv");
