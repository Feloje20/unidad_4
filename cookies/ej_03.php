<?php
    /**
    * 3. Galleta con formulario para recordar los datos del usuario.
    * @autor = Jesús Ferrer López
    * @date = 17/10/2024
    */

    $lprocesaformulario = false;

    if((isset($_POST["enviar"]))){
        $lprocesaformulario = true;
    }

    // Si ya existe la galleta recogemos los datos de ella
    if ((isset($_COOKIE["usuario_recordar"])) && (isset($_COOKIE["password_recordar"])) && (!$lprocesaformulario)){
        $usuario = $_COOKIE["usuario_recordar"];
        $password = $_COOKIE["password_recordar"];
        $recordar = $_COOKIE["recordar_recordar"];
    }

    if ($lprocesaformulario){
        // Recoger datos
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        // validamos los datos
        if (($usuario == "")||($password == "")) {
            $lprocesaformulario = false;
        }
        $recordar = $_POST["recordar"];
        // Si el usuario ha marcado la casilla de recordar, creamos las galletas.
        if ($recordar) {
            setcookie("usuario_recordar", $usuario , time()+120);
            setcookie("password_recordar", $password , time()+120);
            setcookie("recordar_recordar", $recordar , time()+120);
            echo "test";
        }
        // Si el usuario no ha marcado la casilla de recordar, las destruimos.
        else {
            setcookie("usuario_recordar", $usuario , time()-120);
            setcookie("password_recordar", $password , time()-120);
            setcookie("recordar_recordar", $recordar , time()-120);
        }
    }

?>
<!-- VISTA -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($lprocesaformulario) {
        // Mostrar datos
        echo "Usuario: $usuario</br>";
        echo "Contraseña: $password</br>";
        echo "Recordar: $recordar</br>";
    } else {
    ?>
    <h1> Formulario con cookies</h1>
    <form action="" method="post"> 
        <!-- Si algún campo es incorrecto,  -->
        <input type="text" name="usuario" placeholder="usuario" value="<?php echo $usuario;?>"><?php if ($usuario == ""){echo "Requerido";}?></br>
        <input type="text" name="password" placeholder="contraseña" value ="<?php echo $password;?>"><?php if ($password == ""){echo "Requerido";}?></br>
        <label>Recordar datos</label>
        <input type="checkbox" name="recordar" <?php if ($recordar){echo "checked";}?>></br>
        <input type="submit" name="enviar" value="enviar formulario">
        <input type="reset" name="resetear" value="resetear">
    </form>
    <?php
    }
    ?>
    <div class="ver_codigo">
        <button type="button"><a href="https://github.com/Feloje20/unidad_3/blob/main/formularios/ej_04.php">Ver código</a></button>
    </div>   
</body>
</html>