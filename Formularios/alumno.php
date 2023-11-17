<main id = "alumno">
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        if(Login::estaLogueado('user'))
        {
            $usuario = Sesion::leerSesion('user');
            //Acción que se produce cuando pulsas el botón Visualizar
            if(isset($_POST['visualizar']))
            {
                header("Location: ?menu=visualizar");
                exit;
            }
             //Acción que se produce cuando pulsas el botón Registrar
            if(isset($_POST['realizar']))
            {
                header("Location: ?menu=realizar");
                exit;
            }

            //Acción que se produce cuando pulsas el botón Generar Aleatorio
            if(isset($_POST['generarAle']))
            {
                header("Location: ?menu=generarAle");
                exit;
            }
        }
        else 
        {
            header("Location: ?menu=login");
            exit;
        }
    ?>

    <form action = "?menu=alumno" method = "POST">
        <h1>Bienvenid@ <?php echo($usuario);?></h1>

        <div>
            <h2>Examen</h2>
            <input type = "submit" id = "visualizar" value = "Visualizar"  name = "visualizar">
            <input type = "submit" id = "realizar" value = "Realizar"  name = "realizar">
            <input type = "submit" id = "generarAle" value = "Generar Aletorio"  name = "generarAle">
        </div>
    </form>
    
</main>