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
        <li><a href = "?menu=generarMan">Generar Examen</a></li>
        <li><a href = "?menu=genPre">Generar Pregunta</a></li>
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
        <li><a href = "?menu=mantenimiento">Mantenimiento</a></li>
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
        <li><a href = "?menu=examenes">Realizar</a></li>
        <li><a href = "?menu=responderPreg">Visualizar</a></li>
    </ul>
    <!-- Introducir php para comprobar el rol y mostrar una u otra opción -->
   
</nav>

<?php
            }
        }
?>