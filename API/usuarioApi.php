<?php
    require_once  $_SERVER['DOCUMENT_ROOT'].'/Helpers/autocargador.php';
    
    autocargar();
    
    if ($_SERVER['REQUEST_METHOD'] == "GET") 
    {
        $id = $_GET['id'];
        $user = usuarioRepository::findbyId($id);
    
        if ($user == false) 
        {
            echo json_encode(array("success" => false));
        } 
        else 
        {
            $userData = array
            (
                "id" => $user->getId(),
                "nombre" => $user->getNombre(),
                "contrasenia" => $user->getContrasenia(),
                "rol" => $user->getRol()
                "urlFoto" => $user->getUrlFoto();
            );
    
            echo json_encode($userData);
        }
    }
?>