 <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Helper/autocargador.php';

        Autocargador::autocargar();
    
        if(Login::estaLogueado('user'))
        {
            $usuario = Sesion::leerSesion('user');
            $rol = $usuario->getRol();

            if($rol == "profesor")
            {
?>

<nav>
    <ul>
        <li><a href = "?menu=inicio">Inicio</a></li>
        <li><a href = "?menu=generarExamen">Generar Examen</a></li>
        <li><a href = "?menu=examenes">Examenes</a></li>
        <li><a href = "?menu=responderPreg">Examen</a></li>
        <li><a href = "?menu=responderPreg">Mantenimiento</a></li>
    </ul>
    <!-- Introducir php para comprobar el rol y mostrar una u otra opción -->
   
</nav>

<?php
            }
            if($rol == "administrador")
            {
?>

<nav>
    <ul>
        <li><a href = "?menu=inicio">Inicio</a></li>
        <li><a href = "?menu=gestion">Gestión</a></li>
        <li><a href = "?menu=examenes">Generar</a></li>
        <li><a href = "?menu=responderPreg">Realizar Examen</a></li>
        <li><a href = "?menu=responderPreg">Mantenimiento</a></li>
    </ul>
   
</nav>

<?php
            }
            if($rol == "estudiante")
            {
?>

<nav>
    <ul>
        <li><a href = "?menu=inicio">Inicio</a></li>
        <li><a href = "?menu=generarExamen">Generar</a></li>
        <li><a href = "?menu=examenes">Realizar</a></li>
        <li><a href = "?menu=responderPreg">Visualizar</a></li>
    </ul>
    <!-- Introducir php para comprobar el rol y mostrar una u otra opción -->
   
</nav>

<?php
            }
        }
?>