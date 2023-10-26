<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/usuarioRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/preguntaRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/examenRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/exaTiePreRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/intentoRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/categoriaRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/dificultadRepository.php';

    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/validator.php';

    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/usuario.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/pregunta.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/examen.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/examentienepregunta.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/intento.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/categoria.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/dificultad.php';

    //_---------------------------PRUEBAS----------------------------------

    $usuario1 = new Usuario("6", "Javier", "javir1234", "profesor", "myAvatar.png");
    // $examentienepregunta1 = new ExamenTienePregunta('1','1','2');
    // $categoria1 = new Categoria('5','Normas de Circulación');
    // $dificultad1 = new Dificultad('1', 'INICIAL');

    // $usuario1->setNombre("Alex");
    // echo $usuario1;
    // for($i = 0; $i < 7; $i++)
    // {
    //     $usuarios[$i] = usuarioRepository::findbyId($i + 1);
    //     echo $usuarios[$i] . '<br>';
    // }
    
    if(usuarioRepository::existeUsuario('Javier', 'javier1234'))
    {
        echo "Si existe";
    }
    else
    {
        echo "No existe";
    }
    

    // exaTiePreRepository::findObject($examentienepregunta1);

    //categoriaRepository::updateNombre($categoria1, $categoria1->getNombre());

    // dificultadRepository::findObject($dificultad1);

    // $numeroValidar = 4;
    // $numeroMax = 5;
    // $numeroMin = 0;

    //validator::rango('', $numeroValidar, $numeroMin, $numeroMax);
    // if(validator::validarEmail("mara@gmail.com", 'gmail'))
    // {
    //     echo "Gmail Válido";
    // }
    
    // if(validator::vacio('a'))
    // {
    //     echo "Cadena Vacía";
    // }
    // else
    // {
    //     echo "Cadena completa";
    // }




?>