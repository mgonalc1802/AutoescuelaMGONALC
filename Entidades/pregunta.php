<?php
    class Pregunta
    {
        public $id;
        public $enunciado;
        public $respuesta1;
        public $respuesta2;
        public $respuesta3;
        public $correcta;
        public $url;
        public $tipoUrl;


        //Constructor
        public function __construct($id, $enunciado, $respuesta1, $respuesta2, $pregunta3, $correcta, $url, $tipoUrl)
        {
            $this->id = $id;
            $this->enunciado = $enunciado;
            $this->respuesta1 = $respuesta1;
            $this->respuesta2 = $respuesta2;
            $this->respuesta3 = $prespuesta;
            $this->correcta = $correcta;
            $this->url = $url;
            $this->tipoUrl = $tipoUrl;
        }

        //GETTER'S
        //Devuelve el id
        public function getId() 
        { 
            return $this->id; 
        }

        //Devuelve enunciado
        public function getEnunciado() 
        { 
            return $this->enunciado; 
        }

        //Devuelve respuesta1
        public function getRespuesta1() 
        { 
            return $this->respuesta1; 
        }

        //Devuelve respuesta2
        public function getRespuesta2() 
        { 
            return $this->respuesta2; 
        }

        //Devuelve respuesta3
        public function getRespuesta3() 
        { 
            return $this->respuesta3; 
        }

        //Devuelve url
        public function getUrl() 
        { 
            return $this->url; 
        }

        //Devuelve tipoUrl
        public function getTipoUrl() 
        { 
            return $this->tipoUrl; 
        }


        //SETTER'S
        //Asigna enunciado
        public function setEnunciado() 
        { 
            $this->enunciado = $enunciado ; 
        }

        //Devuelve respuesta1
        public function setRespuesta1() 
        { 
            $this->respuesta1 = $respuesta1; 
        }

        //Devuelve respuesta2
        public function setRespuesta2() 
        { 
            $this->respuesta2 = $respuesta2; 
        }

        //Devuelve respuesta3
        public function setRespuesta3() 
        { 
            $this->respuesta3 = $respuesta3; 
        }

        //Devuelve url
        public function setUrl() 
        { 
            $this->url = $url; 
        }

        //Devuelve tipoUrl
        public function setTipoUrl() 
        { 
            $this->tipoUrl = $tipoUrl; 
        }
        

        public function __toString()
        {
            return "Pregunta => ID: " . $this->id . " Enunciado: " . $this->enunciado;
        }
    }
?>