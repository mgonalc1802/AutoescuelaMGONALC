<main>
    <?php
        //Partes del proyecto que utiliza el login
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

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

                    if($usuario->getRol() == "administrador")
                    {
                        header("Location: ?menu=admin");
                        exit;
                    }
                    if($usuario->getRol() == "profesor")
                    {
                        header("Location: ?menu=profesor");
                        exit;
                    }
                    if($usuario->getRol() == "estudiante")
                    {
                        header("Location: ?menu=alumno");
                        exit;
                    }
                    
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
            header("Location: ?menu=registro");
            exit;
        }
    ?>

    <!-- Título -->
    <h1>Iniciar Sesión</h1>

    <!-- Inicio del formulario -->
    <form  action = "?menu=login" method = "POST">
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
        <input type = "submit" value = "Crear una cuenta"  name = "registrar">

        <?php
            //Comprueba que este correcto, si no, muestra mensaje de error en rojo
            echo((empty($erroresEnviar['user'])) ? "" : "<span style = 'color: red' >".$erroresEnviar['user']."</span>");
        ?>

    </form>
        
</main>