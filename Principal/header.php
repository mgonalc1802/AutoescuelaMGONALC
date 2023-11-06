<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Helper/autocargador.php';

    Autocargador::autocargar();

    Sesion::iniciarSesion();

    if(Login::estaLogueado('user'))
    {
        $usuario = Sesion::leerSesion('user');
        $nombre = $usuario->getNombre();
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
            <label>Usuario: <?php echo($nombre);?></label>
            <button id = "cerSes" name = "cerrarSesion">Cerrar Sesion</button> 
        </form>
            
    </div>
</header>