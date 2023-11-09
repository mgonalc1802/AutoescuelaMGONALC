<?php
    class Usuario
    {
        public $id;
        public $nombre;
        public $contrasenia;
        public $rol;
        public $urlFoto;
        public $validado;

        //Constructor
        public function __construct($id, $nombre, $contrasenia, $rol, $urlFoto, $validado)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->contrasenia = $contrasenia;
            $this->rol = $rol;
            $this->urlFoto = $urlFoto;
            $this->validado = $validado;
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

        //Devuelve contrasenia
        public function getContrasenia() 
        { 
            return $this->contrasenia; 
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

        //Devuelve urlFoto
        public function getValidado() 
        { 
            return $this->validado; 
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
            $this->contrasenia = $contrasenia;
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

        //Asigna validado
        public function setValidado($nuevoValidado)
        {
            $this->validado = $nuevoValidado;
        }

        public function __toString()
        {
            return "Nombre: " . $this->nombre . " Rol: " . $this->rol;
        }
    }
?>