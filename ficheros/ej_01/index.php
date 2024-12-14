<?php
/**
 * Formulario de recogida de datos
 * @author Jesús Ferrer López
*/

// Importo un archivo
include "./config/conf.php";

// Creacion del array de los años academicos
$av_Anyos = [];
$ck = false;
$mActual = date("n");
$aActual = date("Y");
for ($i = ANIOINICIO; $i < ANIOFINAL; $i++){
    $ck = false;
    if(($i == $aActual && $mActual >= 9) || ($i + 1 == $aActual && $mActual < 9)){
      $ck = true;  
    }
    array_push($av_Anyos, array( $i . "/" . $i + 1, $ck));
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de creación de alumnos</title>
    </head>
    <body>
        <h1>Formulario de recogida de datos</h1>
        <form action="test1.php" method="POST" enctype="multipart/form-data"> <!-- Añadir el enctype -->
            <label>Grupo:</label>
            <select name="grupo">
                <?php
                    foreach ($grupos as $valor){
                        if ($valor == "2DAW"){
                            echo "<option selected name='$valor'>$valor</option>";
                        } else{
                            echo "<option name='$valor'>$valor</option>";
                        }
                    }
                ?>
            </select><br/>
            <label>Año academico:</label>
            <select name="anio">
                <?php
                    foreach ($av_Anyos as $clave => $valor){
                        $eleccion = $valor[1]?"selected":"";
                        echo "<option ". $eleccion ." name= '$valor' value=" . substr($valor[0], 2, 2) . substr($valor[0], 7, 8) . ">" . $valor[0] . "</option>";    
                    }
                ?>
            </select><br/>
            <label>Sistema:</label>
            <select name="sistema">
                <?php
                    foreach ($formato as $valor){
                        echo "<option name='$valor' value='$valor'>$valor</option>";
                    }
                ?>
            </select><br/>
            <label>Fichero:</label>
            <input type="file" name="file"/><br/>
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>