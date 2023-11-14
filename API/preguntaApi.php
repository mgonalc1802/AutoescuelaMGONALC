<?php
    // require_once '../API/preguntaApi.php';
    // require_once  '../Repository/preguntaRepository.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';
    
    if ($_SERVER['REQUEST_METHOD'] == "GET") 
    {
        $preguntas = preguntaRepository::findAll();

        $preguntasData = [];
        
        foreach ($preguntas as $pregunta) 
        {
            if ($pregunta == false) 
            {
                echo json_encode(array("success" => false));
            } 
            else 
            {
                $preguntaData = array
                (
                    "id" => $pregunta->getId(),
                    "enunciado" => $pregunta->getEnunciado(),
                    "respuesta1" => $pregunta->getRespuesta1(),
                    "respuesta2" => $pregunta->getRespuesta2(),
                    "respuesta3" => $pregunta->getRespuesta3(),
                    "correcta" => $pregunta->getCorrecta(),
                    "url" => $pregunta->getUrl(),
                    "tipoURL" => $pregunta->getTipoURL(),
                    "idCategoria" => $pregunta->getIdCategoria(),
                    "idDificultad" => $pregunta->getIdDificultad()
                );
        
                $preguntasData[] = $preguntaData;

            }
        }
        echo json_encode($preguntasData);

    }
?>