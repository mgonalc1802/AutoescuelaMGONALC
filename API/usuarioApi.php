<?php
    // require_once  '../Repository/usuarioRepository.php';
    // require_once  '../Entidades/Usuario.php';
    // require_once '../API/usuarioApi.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';
    
    Autocargador::autocargar();
    
    if ($_SERVER['REQUEST_METHOD'] == "GET") 
    {
        // $id = $_GET['id'];
        $usuarios = usuarioRepository::findAll();
        $usuariosData = [];
    
        foreach($usuarios as $usuario)
        {
            if ($usuario == false) 
            {
                echo json_encode(array("success" => false));
            } 
            else 
            {
                $userData = array
                (
                    "id" => $usuario->getId(),
                    "nombre" => $usuario->getNombre(),
                    "contrasenia" => $usuario->getContrasenia(),
                    "rol" => $usuario->getRol(),
                    "urlFoto" => $usuario->getUrlFoto()
                );

                $usuariosData[] = $userData;
            }
        }

        echo json_encode($usuariosData);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        $usuarioObt = json_decode(file_get_contents("php://input"));
        
        $usuario = usuarioRepository::findByName($usuarioObt);

        echo json_encode($usuario->getID());
    }
?>