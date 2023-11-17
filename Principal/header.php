<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Helper/autocargador.php';

    Autocargador::autocargar();

    Sesion::iniciarSesion();

    if(Login::estaLogueado('user'))
    {
        $usuario = Sesion::leerSesion('user');
        $nombre = $usuario->getNombre();

        //Cogemos la ruta completa
        $rutaCompleta = $usuario->getUrlFoto();

        // Encuentra la última barra diagonal (/) en la ruta
        $ultimaBarra = strrpos($rutaCompleta, '/');

        // Extrae la parte de la ruta después de la última barra diagonal
        $nombreArchivo = substr($rutaCompleta, $ultimaBarra + 1);
    }
    else
    {
        $nombre = "¡Inicia Sesión!";
    }
    
    if(isset($_POST['cerrarSesion']))
    {
        Login::logOut("?menu=login");
    }
?>  

<header>
    <div id = "logo">
        <img src="/ProyectoAutoescuela/Recursos/logoPeque.png" width = "150px">
        <h1>Camino Al Volante</h1>
    </div>

    <div id = "btn">
        <form method = "POST">
            

            <?php
                if(Login::estaLogueado('user'))
                {
            ?>
            <img src = '/ProyectoAutoescuela/Fotos/FotosUsuarios/<?php echo $nombreArchivo ?>' width = "50px">
            <label><?php echo($nombre);?></label>
            <button id = "cerSes" name = "cerrarSesion">Cerrar Sesion</button> 
            <?php
                }
                else
                {
            ?>

            <button id = "cerSes" name = "cerrarSesion">Iniciar Sesion</button> 

            <?php
                }
            ?>

        </form>
            
    </div>
</header>