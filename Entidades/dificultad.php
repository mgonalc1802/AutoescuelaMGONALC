<?php
    class Dificultad
    {
        public $id;
        public $nombre;

        //Constructor
        public function __construct($id, $nombre)
        {
            $this->id = $id;
            $this->nombre = $nombre;
        }

        //GETTER'S
        //Devuelve el id
        public function getId() 
        { 
            return $this->id; 
        }

        //Devuelve nombre
        public function getNombre() 
        { 
            return $this->nombre; 
        }

        //SETTER'S
        //Asigna nombre
        public function setNombre($nuevoNombre)
        {
            $this->nombre = $nuevoNombre;
        }

        public function __toString()
        {
            return "Dificultad => ID: " . $this->id . " Nombre: " . $this->nombre;
        }
    }
?>