<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

    if ($_SERVER['REQUEST_METHOD'] == "PUT") 
    {
        $idExamen = json_decode(file_get_contents("php://input"));
        $exaTiePres = exaTiePreRepository::findByIdExamen($idExamen);

        $exaTiePreData = [];
        
        foreach ($exaTiePres as $exaTiePre) 
        {
            if ($exaTiePre== false) 
            {
                echo json_encode(array("success" => false));
            } 
            else 
            {
                $exaTiePreData = array
                (
                    "id" => $exaTiePre->getId(),
                    "idExamen" => $exaTiePre->getIdExamen(),
                    "idPregunta" => $exaTiePre->getIdPregunta()
                );
        
                $exaTiePresData[] = $exaTiePreData;

            }
        }
        echo json_encode($exaTiePresData);

    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        header('Content-Type: application/json');
        $exaTiePreJSON = json_decode(file_get_contents("php://input"));

        $idExamen = $exaTiePreJSON->idExamen;
        $idPregunta = $exaTiePreJSON->idPregunta;

        exaTiePreRepository::insert(new ExamenTienePregunta('', $idExamen, $idPregunta));
    };
?>