<?php
if (isset($_GET['menu'])) 
{
    $rutaBase = $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/';
    
    if ($_GET['menu'] == "inicio") 
    {
        require_once 'index.php';
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
}
