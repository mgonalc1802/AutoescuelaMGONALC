<?php
    class Examen
    {
        public $id;
        public $fechaCreacion;

        //Constructor
        public function __construct($id, $fechaCreacion)
        {
            $this->id = $id;
            $this->fechaCreacion = $fechaCreacion;
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

        //SETTER'S
        //Asigna nombre
        public function setFechaCreacion($nuevaFechaCreacion)
        {
            $this->fechaCreacion = $nuevaFechaCreacion;
        }

        public function __toString()
        {
            return "Examen => ID: " . $this->id . " Fecha: " . $this->fechaCreacion;
        }
    }
?>