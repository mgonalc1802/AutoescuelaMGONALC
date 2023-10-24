<?php
    class Examen
    {
        public $id;
        public $fecha;
        public $JSONIntentos;

        //Constructor
        public function __construct($id, $fecha, $JSONIntentos)
        {
            $this->id = $id;
            $this->fecha = $fecha;
            $this->JSONIntentos = $JSONIntentos;
        }

        //GETTER'S
        //Devuelve el id
        public function getId() 
        { 
            return $this->id; 
        }

        //Devuelve fecha
        public function getFecha() 
        { 
            return $this->fecha; 
        }

        //Devuelve el JSON
        public function getJSONIntentos() 
        { 
            return $this->JSONIntentos; 
        }

        //SETTER'S
        //Asigna nombre
        public function setFecha($nuevaFecha)
        {
            $this->fecha = $nuevaFecha;
        }

        public function setJSONIntentos($nuevoJSONIntentos)
        {
            $this->JSONIntentos = $nuevoJSONIntentos;
        }

        public function __toString()
        {
            return "Intentos => ID: " . $this->id . " Fecha: " . $this->fecha . " JSONIntentos: " . $this->JSONIntentos;
        }
    }
?>