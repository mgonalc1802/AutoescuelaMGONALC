<?php
    class Usuario
    {
        public $id;
        public $nombre;
        public $contrasenia;
        public $rol;
        public $urlFoto;

        //Constructor
        public function __construct($id, $nombre, $contrasenia, $rol, $urlFoto)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->contrasenia = $contrasenia;
            $this->rol = $rol;
            $this->urlFoto = $urlFoto;
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

        //Devuelve ni
        public function getContrasenia() 
        { 
            return $this->ni; 
        }

        //Devuelve rol
        public function getRol() 
        { 
            return $this->rol; 
        }

        //Devuelve urlFoto
        public function getUrlFoto() 
        { 
            return $this->urlFoto; 
        }

        //SETTER'S
        //Asigna nombre
        public function setNombre($nuevoNombre)
        {
            $this->nombre = $nuevoNombre;
        }

        //Asigna contaseña
        public function setContrasenia($nuevoContrasenia)
        {
            $this->ni = $ni;
        }

        //Asigna rol
        public function setRol($nuevoRol)
        {
            $this->rol = $nuevoRol;
        }

        //Asigna rol
        public function setUrlFoto($nuevourlFoto)
        {
            $this->urlFoto = $nuevourlFoto;
        }

        public function __toString()
        {
            return "Nombre: " . $this->nombre . " Rol: " . $this->rol;
        }
    }
?>