<?php
if (isset($_GET['menu'])) 
{
    $rutaBase = $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/';
    
    if ($_GET['menu'] == "inicio") 
    {
        require_once $rutaBase.'/Formularios/inicio.php';
    }
    if ($_GET['menu'] == "examenes") 
    {
        require_once $rutaBase.'/Formularios/examen.php';
    }
    if ($_GET['menu'] == "registro") 
    {
        require_once $rutaBase.'/Formularios/registroFormu.php';
    }
    if ($_GET['menu'] == "responderPreg") 
    {
        require_once $rutaBase.'/Formularios/responderPreg.php';
     
    }
    if ($_GET['menu'] == "admin") 
    {
        require_once $rutaBase.'/Formularios/administrador.php';
     
    }
    if ($_GET['menu'] == "usuarioMan") 
    {
        require_once $rutaBase.'/Formularios/usuarioMan.php';
     
    }
    if ($_GET['menu'] == "preguntaMan") 
    {
        require_once $rutaBase.'/Formularios/preguntaMan.php';
     
    }
    if ($_GET['menu'] == "intentoMan") 
    {
        require_once $rutaBase.'/Formularios/intentoMan.php';
     
    }
    if ($_GET['menu'] == "profesor") 
    {
        require_once $rutaBase.'/Formularios/profesor.php';
     
    }
    if ($_GET['menu'] == "alumno") 
    {
        require_once $rutaBase.'/Formularios/alumno.php';
    }    
    if ($_GET['menu'] == "login") 
    {
        require_once $rutaBase.'/Formularios/loginFormu.php';
    }  
    if ($_GET['menu'] == "visualizar") 
    {
        require_once $rutaBase.'/Formularios/visualizar.php';
    } 
    if ($_GET['menu'] == "realizar") 
    {
        require_once $rutaBase.'/Formularios/realizar.php';
    }
    if ($_GET['menu'] == "generarAle") 
    {
        require_once $rutaBase.'/Formularios/generarAle.php';
    }
    if ($_GET['menu'] == "manual") 
    {
        require_once $rutaBase.'/Formularios/manual.php';
    }
    if ($_GET['menu'] == "porDificultad") 
    {
        require_once $rutaBase.'/Formularios/porDificultad.php';
    }
    if ($_GET['menu'] == "validar") 
    {
        require_once $rutaBase.'/Formularios/validar.php';
    }
    if ($_GET['menu'] == "gestion") 
    {
        require_once $rutaBase.'/Formularios/validar.php';
    }
    if ($_GET['menu'] == "alumno") 
    {
        require_once $rutaBase.'/Formularios/alumno.php';
    }
    if ($_GET['menu'] == "genPre") 
    {
        require_once $rutaBase.'/Formularios/generarPre.php';
    }
}
