<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/usuarioRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/preguntaRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/examenRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/exaTiePreRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/intentoRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/categoriaRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Repository/dificultadRepository.php';

    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/usuario.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/pregunta.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/examen.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/examentienepregunta.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/intento.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/categoria.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/dificultad.php';

    $usuario1 = new Usuario("6", "Javier", "javier1234", "profesor", "myAvatar.png");
    $examentienepregunta1 = new ExamenTienePregunta('1','1','2');
    $categoria1 = new Categoria('5','Normas de Circulación');
    $dificultad1 = new Dificultad('1', 'INICIAL');

    // $usuario1->setNombre("Alex");
    // echo $usuario1;
    //usuarioRepository::findById('1');

    // exaTiePreRepository::findObject($examentienepregunta1);

    //categoriaRepository::updateNombre($categoria1, $categoria1->getNombre());

    // dificultadRepository::findObject($dificultad1);




?>