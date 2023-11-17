<main id = "mante">
<?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        if(Login::estaLogueado('user') )
        {
            $usuario = Sesion::leerSesion('user');
            $nombre = $usuario->getNombre();
            
            //Acción que se produce cuando pulsas el botón Visualizar
            if(isset($_POST['manCat']))
            {
                header("Location: ?menu=categoriaMan");
                exit;
            }
            
            //Acción que se produce cuando pulsas el botón Registrar
            if(isset($_POST['manDif']))
            {
                header("Location: ?menu=dificultadMan");
                exit;
            }

            //Acción que se produce cuando pulsas el botón Generar Aleatorio
            if(isset($_POST['manEx']))
            {
                header("Location: ?menu=examenMan");
                exit;
            }

            //Acción que se produce cuando pulsas el botón Validar User
            if(isset($_POST['manUser']))
            {
                header("Location: ?menu=validar");
                exit;
            }      
            
            //Acción que se produce cuando pulsas el botón Volver
            if(isset($_POST['volverAd']))
            {
                header("Location: ?menu=admin");
                exit;
            }
    ?>
    <form action = "?menu=mantenimiento" method = "POST">
        <h1>Mantenimiento</h1>
        <div class = "opciones">
            <div>
                <h2>Usuarios</h2>
                <input type = "submit" value = "Validar"  name = "manUser">
            </div>

            <div>
                <h2>Examen</h2>
                <input type = "submit" value = "Validar"  name = "manEx">
            </div>

            <div>
                <h2>Dificultad</h2>
                <input type = "submit" value = "Validar"  name = "manDif">
            </div>

            <div>
                <h2>Categoria</h2>
                <input type = "submit" value = "Validar"  name = "manCat">
            </div>
        </div><br><br><br><br><br><br>
        <input id = 'volverAd' type = "submit" value = "Volver" name = 'volverAd'>
    </form>
    <?php
        }
        else
        {
            header("Location: ?menu=login");
            exit;
        }
    ?>
</main>