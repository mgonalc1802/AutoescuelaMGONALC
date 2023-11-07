<main id = "reg">
    
    <?php
        //Partes del proyecto que utiliza el login
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        //Bucle que guarda los usuarios de la base de datos
        $usuarios = usuarioRepository::findAll();

        $contador = count($usuarios) + 1;

        
            //Acción que se produce cuando pulsas el botón registrar
            if(isset($_POST['registrarReg']))
            {
                //Guarda los datos introducidos en las cajas de texto
                $nombre = $_POST['nombre'];
                $contrasenia = $_POST['contrasenia'];
                $rol = $_POST['rol'];
                // $urlFoto = $_POST['urlFoto'];

                //Comprueba que los campos anteriores no estén vacíos
                $erroresEnviar = validator::validarLogin($nombre, $contrasenia);

                if(validator::hayErrores() == 0)
                {
                    if(!usuarioRepository::existeUsuario($nombre, $contrasenia))
                    {
                        foreach($usuarios as $usuario)
                        {
                            $usuarioNuevo = new Usuario($contador, $nombre, $contrasenia, $rol, 'myAvatar.png');
                            $contador = $contador++;
                        }
                        uservalidRepository::insert($usuarioNuevo);
                    }
                    else
                    {
                        //Mensaje de error en caso de que se encuentre el usuario.
                        $erroresEnviar = validator::usuarioExistente();
                    }
                }
            }
            
       

        //Acción que se produce cuando pulsa el botón redirigir
        if(isset($_POST['redireccionar']))
        {
            header("Location: ?menu=login");
            // header("Location: ?menu=login&&usuario=" . $_GET["usuario"]);
            exit;
        }
        
    ?>


    <form enctype = "multipart/form-data" action = "?menu=registro" method = "POST">

        <h1>Registrarse</h1>
        <div>
            <label>Nombre:</label>
            <input class = "regInput" type = "text" name = "nombre" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['nombre'])) ? "" : "<span class = 'errores'>".$erroresEnviar['nombre']."</span>");
            ?>

            <br>
            <label>Contraseña:</label> 
            <input class = "regInput" type = "password" name = "contrasenia" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['contrasenia'])) ? "" : "<span class = 'errores'>".$erroresEnviar['contrasenia']."</span>");
            ?><br>

            <label>Rol:</label> 
            <select name = "rol">
                <option value = "profesor">Profesor</option>
                <option value ="estudiante" selected>Estudiante</option>
            </select><br><br>

            <label>Foto:</label>
            <input type = "hidden" name = "MAX_FILE_SIZE" value = "30000" />
            <input name = "urlFoto" type = "file" /> <br><br>

            <!-- Botón de enviar -->
            <input id = "registrarReg" type = "submit" value = "Registrar"  name = "registrarReg">
            <input id = "redireccionar" type = "submit" value = "Redireccionar" name = "redireccionar"><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['userE'])) ? "" : "<span class = 'errores'>".$erroresEnviar['userE']."</span>");
            ?>
        </div>
    </form>
</main>