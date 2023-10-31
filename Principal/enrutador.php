<?php
if (isset($_GET['menu'])) 
{
    $rutaBase = $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/';
    
    if ($_GET['menu'] == "inicio") 
    {
        require_once 'index.php';
    }
    if ($_GET['menu'] == "login") 
    {
        require_once $rutaBase.'/Formularios/loginFormu.php';
    }
    if ($_GET['menu'] == "registro") 
    {
        require_once $rutaBase.'/Formularios/registroFormu.php';
    }
    if ($_GET['menu'] == "mantenimiento") 
    {
        require_once $rutaBase.'/Vistas/mantenimiento/mantenimiento.php';
     
    }
    if ($_GET['menu'] == "listadoanimales") 
    {
        require_once $rutaBase.'/Vistas/Mantenimiento/listadoanimales.php';
     
    }
    if ($_GET['menu'] == "listadovacunas") 
    {
        require_once $rutaBase.'/Vistas/Mantenimiento/listadovacunas.php';
     
    }    
}
