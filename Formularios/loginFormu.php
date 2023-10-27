<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale =1.0">
        <title>Formulario Log In</title>
    </head>
    <body>
        <?php
            //Partes del proyecto que utiliza el login
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/login.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/usuario.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/usuarioRepository.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/validator.php';

            //Bucle que guarda los usuarios de la base de datos
            for($i = 0; $i < 7; $i++)
            {
                $usuarios[$i] = usuarioRepository::findbyId($i + 1);
            }

            //Acción que se produce cuando pulsas el botón iniciar Sesión
            if(isset($_POST['iniciarSesion']))
            {
                //Guarda los datos introducidos en las cajas de texto
                $nombre = $_POST['nombre'];
                $contrasenia = $_POST['contrasenia'];

                //Compruba que los campos anteriores no estén vacíos
                $erroresEnviar = validator::validarLogin($nombre, $contrasenia);

                //Condición que indica que no hay errores
                if(validator::hayErrores() == 0)
                {
                    //Condición que indica si el usuario introducido existe
                    if(usuarioRepository::existeUsuario($nombre, $contrasenia))
                    {
                        $usuario = usuarioRepository::findByName($nombre);
                        login::logIn($usuario);
                        header("Location: https://rickandmortyapi.com/documentation");
                        exit;
                    }
                    else
                    {
                        //Mensaje de error en caso de que no se encuentre el usuario.
                        $erroresEnviar = validator::usuarioNoEncontrado();
                    }
                }
            }

            //Acción que se produce cuando pulsas el botón Registrar
            if(isset($_POST['registrar']))
            {
                header("Location: http://localhost/ProyectoAutoescuela/Formularios/registroFormu.php");
                exit;
            }
        ?>

        <!-- Título -->
        <h1>Iniciar Sesión</h1>

        <!-- Inicio del formulario -->
        <form  action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
            <!-- Crea la caja de texto dónde el usuario podrá insertar datos -->
            <label>Usuario:<label>
            <input type = "text" name = "nombre" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['nombre'])) ? "" : "<span style = 'color: red' >".$erroresEnviar['nombre']."</span>");
            ?>
            <br>

            <!-- Crea la caja de texto dónde el usuario podrá insertar datos -->
            <label>Contraseña:<label> 
            <input type = "password" name = "contrasenia" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['contrasenia'])) ? "" : "<span style = 'color: red' >".$erroresEnviar['contrasenia']."</span>");
            ?>
            <br>

            <!-- Botón de enviar -->
            <input type = "submit" value = "Iniciar Sesión"  name = "iniciarSesion">
            <input type = "submit" value = "Registrar"  name = "registrar">

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['user'])) ? "" : "<span style = 'color: red' >".$erroresEnviar['user']."</span>");
            ?>

        </form>
        
    </body>
</html>