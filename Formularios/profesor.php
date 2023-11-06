<main id = "profesor">
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        if(Login::estaLogueado('user') )
        {
            $usuario = Sesion::leerSesion('user');
            $nombre = $usuario->getNombre();
            //Acción que se produce cuando pulsas el botón Visualizar
            if(isset($_POST['visualizar']))
            {
                header("Location: ?menu=visualizar");
                exit;
            }
             //Acción que se produce cuando pulsas el botón Registrar
            if(isset($_POST['registrar']))
            {
                header("Location: ?menu=registro");
                exit;
            }

            //Acción que se produce cuando pulsas el botón Generar Aleatorio
            if(isset($_POST['generarAle']))
            {
                header("Location: ?menu=generarAle");
                exit;
            }

            //Acción que se produce cuando pulsas el botón Manual
            if(isset($_POST['manual']))
            {
                header("Location: ?menu=manual");
                exit;
            }

            //Acción que se produce cuando pulsas el botón Por Dificultad
            if(isset($_POST['porDificultad']))
            {
                header("Location: ?menu=porDificultad");
                exit;
            }
        }
        else 
        {
            header("Location: ?menu=login");
            exit;
        }
    ?>

    <form action = "?menu=profesor" method = "POST">
        <h1>Bienvenid@ <?php echo($nombre);?></h1>

        <div class = "opciones">
            <div>
                <h2>Examen</h2>
                <input type = "submit" id = "visualizar" value = "Visualizar"  name = "visualizar">
                <input type = "submit" id = "realizar" value = "Realizar"  name = "realizar">
                <input type = "submit" id = "generarAle" value = "Generar Aletorio"  name = "generarAle">
            </div>

            <div>
                <h2>Generar Examen</h2>
                <input type = "submit" id = "manual" value = "Manual"  name = "manual">
                <input type = "submit" id = "dificultad" value = "Por Dificultad"  name = "porDificultad">
            </div>
        </div>
        
    </form>
    
</main>