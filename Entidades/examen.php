<?php
    class Examen
    {
        public $id;
        public $fechaCreacion;
        public $idProfesor;

        //Constructor
        public function __construct($id, $fechaCreacion, $idProfesor)
        {
            $this->id = $id;
            $this->fechaCreacion = $fechaCreacion;
            $this->idProfesor = $idProfesor;
        }

        //GETTER'S
        //Devuelve el id
        public function getId() 
        { 
            return $this->id; 
        }

        //Devuelve fechaCreacion
        public function getFechaCreacion() 
        { 
            return $this->fechaCreacion; 
        }

        //Devuelve idProfesor
        public function getIdProfesor() 
        { 
            return $this->idProfesor; 
        }

        //SETTER'S
        //Asigna fechaCreacion
        public function setFechaCreacion($nuevaFechaCreacion)
        {
            $this->fechaCreacion = $nuevaFechaCreacion;
        }

        //Asigna idProfesor
        public function setIdProfesor($nuevaidProfesor)
        {
            $this->idProfesor = $nuevaidProfesor;
        }

        public function __toString()
        {
            return "Examen => ID: " . $this->id . " Fecha: " . $this->fechaCreacion;
        }
    }
?>