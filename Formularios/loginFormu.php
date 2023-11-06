<main id = "log">
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

    

    <!-- Inicio del formulario -->
    <form  action = "?menu=login" method = "POST">
        <!-- Título -->
        <script src = "JS/login.js"></script>

        <h1>Iniciar Sesión</h1>
        <!-- Crea la caja de texto dónde el usuario podrá insertar datos -->
        <div>
            <label>Usuario:</label>
            <input class = "logInput" type = "text" name = "nombre" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['nombre'])) ? "" : "<span class = 'errores' >".$erroresEnviar['nombre']."</span>");
            ?>
            <br>

            <!-- Crea la caja de texto dónde el usuario podrá insertar datos -->
            <label>Contraseña:</label> 
            <input class = "logInput" type = "password" name = "contrasenia" >
            <button id = "mostrarContrasenia" ></button><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['contrasenia'])) ? "" : "<span class = 'errores' >".$erroresEnviar['contrasenia']."</span>");
            ?>
            <br>

            <!-- Botón de enviar -->
            <input type = "submit" id = "inicio" value = "Iniciar Sesión"  name = "iniciarSesion">
            <input type = "submit" id = "registrar" value = "Crear una cuenta"  name = "registrar">

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['user'])) ? "" : "<span class = 'errores' >".$erroresEnviar['user']."</span>");
            ?>
        </div>
        

    </form>
        
</main>