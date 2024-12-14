<?php
/**
 * Archivo php para procesar el formulario
 * @author Jesús Ferrer López
 */

$lProcesaFormulario = false;
$sistema = "";
$grupo = "";
$anio = "";
$fichero = "";

if(isset($_POST["enviar"])){
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if (($_FILES['file']['size'] < MAXSIZE) && in_array($_FILES['file']['type'], $allowedFormat) && in_array($extension, $allowedExt)){
        $lProcesaFormulario = true;
    } else{
        header("Location: ./test2.php");
    }
}

if ($lProcesaFormulario){
    $sistema = $_POST['sistema'];
    $grupo = $_POST['grupo'];
    $anio = $_POST['anio'];
    $fichero = $_FILES['file']['name'];
    if (file_exists(DIRUPLOAD .$fichero )) {
        echo $_FILES["file"]["name"] . " already exists. ";
       }
       else {
           move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $fichero);
           echo "Stored in: " . DIRUPLOAD . $fichero;
       }
       echo "<br/>";
       echo '<a href="javascript:history.back()">Volver</a>'; // Mejor.
}
