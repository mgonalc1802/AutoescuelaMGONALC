<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';
    
    if ($_SERVER['REQUEST_METHOD'] == "GET") 
    {
        $examenes = examenRepository::findAll();

        $examenesData = [];
        
        foreach ($examenes as $examen) 
        {
            if ($examen == false) 
            {
                echo json_encode(array("success" => false));
            } 
            else 
            {
                $examenData = array
                (
                    "id" => $examen->getId(),
                    "enunciado" => $examen->getFechaCreacion(),
                    "respuesta1" => $examen->getIdProfesor()
                );
        
                $examenesData[] = $examenData;

            }
        }

        echo json_encode($examenesData);

    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {        
        header('Content-Type: application/json');
        $examenJSON = json_decode(file_get_contents("php://input"));
        
        $fecha = $examenJSON->fechaCreacion;
        $profe = $examenJSON->idProfesor;

        examenRepository::insert(new Examen('', $fecha, $profe));

        $examen = examenRepository::findByFechaCreacion($fecha);
        
        
        echo json_encode($examen);
        exit();
    }
?>