<?php
    class ExamenTienePregunta
    {
        public $id;
        public $idExamen;
        public $idPregunta;

        //Constructor
        public function __construct($id, $idExamen, $idPregunta)
        {
            $this->id = $id;
            $this->idExamen = $idExamen;
            $this->idPregunta = $idPregunta;
        }

        //GETTER'S
        //Devuelve el id
        public function getId() 
        { 
            return $this->id; 
        }

        //Devuelve idExamen
        public function getIdExamen() 
        { 
            return $this->idExamen; 
        }

        //Devuelve el IdPregunta
        public function getIdPregunta() 
        { 
            return $this->idPregunta; 
        }

        //SETTER'S
        //Asigna IdExamen
        public function setIdExamen($nuevoIdExamen)
        {
            $this->idExamen = $nuevoIdExamen;
        }

        //Asigna IdPregunta
        public function setIdPregunta($nuevoIdPregunta)
        {
            $this->idPregunta = $nuevoIdPregunta;
        }

        public function __toString()
        {
            return "ExamenTienePregunta => ID: " . $this->id . " IDExamen: " . $this->idExamen . " IDPregunta: " . $this->idPregunta;
        }
    }
?>