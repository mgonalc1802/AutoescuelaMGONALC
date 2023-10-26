<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Registro</title>
    </head>
    <body>
        <?php
            //Partes del proyecto que utiliza el login
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/login.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/usuario.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/usuarioRepository.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/validator.php';


            //Bucle que guarda los usuarios de la base de datos
            //PREGUNTAAAR
            for($i = 0; $i < 7; $i++)
            {
                $usuarios[$i] = usuarioRepository::findbyId($i + 1);
            }

            //Acción que se produce cuando pulsas el botón registrar
            if(isset($_POST['registrar']))
            {
                //Guarda los datos introducidos en las cajas de texto
                $nombre = $_POST['nombre'];
                $contrasenia = $_POST['contrasenia'];
                $rol = $_POST['rol'];
                // $urlFoto = $_POST['urlFoto'];

                //Comrpueba que los campos anteriores no estén vacíos
                $erroresEnviar = validator::validarLogin($nombre, $contrasenia);

                if(count($erroresEnviar) == 0)
                {
                    if(!usuarioRepository::existeUsuario($nombre, $contrasenia))
                    {
                        $usuarioNuevo = new Usuario("", $nombre, $contrasenia, $rol, 'myAvatar.png');
                        usuarioRepository::insert($usuarioNuevo);
                    }
                }
            }

            //Acción que se produce cuando pulsa el botón redirigir
            if(isset($_POST['redireccionar']))
            {
                header("Location: http://localhost/ProyectoAutoescuela/Formularios/loginFormu.php");
                exit;
            }
        ?>

        <h1>Registrarse</h1>

        <form enctype = "multipart/form-data" action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
            
            <label>Nombre:<label>
            <input type = "text" name = "nombre" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['nombre'])) ? "" : "<span style = 'color: red' >".$erroresEnviar['nombre']."</span>");
            ?>

            <br>
            <label>Contraseña:<label> 
            <input type = "password" name = "contrasenia" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['contrasenia'])) ? "" : "<span style = 'color: red' >".$erroresEnviar['contrasenia']."</span>");
            ?><br>

            <label>Rol:<label> 
            <select name = "rol">
                <option value = "profesor">Profesor</option>
                <option value ="estudiante" selected>Estudiante</option>
            </select><br><br>

            <label>Foto:<label>
            <input type = "hidden" name = "MAX_FILE_SIZE" value = "30000" />
            <input name = "urlFoto" type = "file" /> <br><br>

            <!-- Botón de enviar -->
            <input type = "submit" value = "Registrar"  name = "registrar">
            <input type = "submit" value = "Redireccionar" name = "redireccionar">
            

        </form>
    </body>
</html>