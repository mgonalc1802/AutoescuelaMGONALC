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
        public $idCategoria;
        public $idDificultad;


        //Constructor
        public function __construct($id, $enunciado, $respuesta1, $respuesta2, $respuesta3, $correcta, $url, $tipoUrl, $idCategoria, $idDificultad)
        {
            $this->id = $id;
            $this->enunciado = $enunciado;
            $this->respuesta1 = $respuesta1;
            $this->respuesta2 = $respuesta2;
            $this->respuesta3 = $respuesta3;
            $this->correcta = $correcta;
            $this->url = $url;
            $this->tipoUrl = $tipoUrl;
            $this->idCategoria = $idCategoria;
            $this->idDificultad = $idDificultad;
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

        //Devuelve correcta
        public function getCorrecta() 
        { 
            return $this->correcta; 
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

        //Devuelve idCategoria
        public function getIdCategoria() 
        { 
            return $this->idCategoria; 
        }

        //Devuelve idCDificultad
        public function getIdDificultad() 
        { 
            return $this->idDificultad; 
        }


        //SETTER'S
        //Asigna enunciado
        public function setEnunciado($enunciado) 
        { 
            $this->enunciado = $enunciado ; 
        }

        //Devuelve respuesta1
        public function setRespuesta1($respuesta1) 
        { 
            $this->respuesta1 = $respuesta1; 
        }

        //Devuelve respuesta2
        public function setRespuesta2($respuesta2) 
        { 
            $this->respuesta2 = $respuesta2; 
        }

        //Devuelve respuesta3
        public function setRespuesta3($respuesta3) 
        { 
            $this->respuesta3 = $respuesta3; 
        }

        //Devuelve url
        public function setUrl($url) 
        { 
            $this->url = $url; 
        }

        //Devuelve tipoUrl
        public function setTipoUrl($tipoUrl) 
        { 
            $this->tipoUrl = $tipoUrl; 
        }

        //Devuelve tipoUrl
        public function setIdCategoria($idCategoria) 
        { 
            $this->idCategoria = $idCategoria; 
        }

        //Devuelve idDificultad
        public function setIdDificultad($idDificultad) 
        { 
            $this->idDificultad = $idDificultad; 
        }
        

        public function __toString()
        {
            return "Pregunta => ID: " . $this->id . " Enunciado: " . $this->enunciado;
        }
    }
?>