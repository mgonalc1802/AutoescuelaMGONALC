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
        <li><a>Mantenimiento</a></li>
            <ul class = "submenu">
                <li><a href = "?menu=manEx">Examen</a></li>
                <li><a href = "?menu=manEx">Usuario</a></li>
                <li><a href = "?menu=manEx">Categoria</a></li>
                <li><a href = "?menu=manEx">Pregunta</a></li>
                <li><a href = "?menu=manEx">Dificultad</a></li>
                <li><a href = "?menu=manEx">ExamenPreguntas</a></li>
                <li><a href = "?menu=manEx">Intento</a></li>
            </ul>
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