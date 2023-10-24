<?php
    class Validator
    {
        private  $errores = [];

        public static function rango($clave, $valor, $min, $max, $mensaje)
        {
            /*Valor el parámetro a comparar con un valor minimo y un maximo*/
            $parametro = false;

            if()
            {
                $parametro = true;
            }
            else
            {
                $this->$errores[$clave] = $mensaje;
            }

            return $parametro;
        }

        public static function email($email)
        {

        }

        public static function vacio($cadena)
        {

        }

        public static function match($valor, $patron)
        {
            //Sirve para las expresiones regulares
            //Indica si el valor cumple el patrón
        }

        public static function hayErrores()
        {
            //comprueba si hay errores
        }

        public static function getErrores()
        {
            //Devuelve un array de errores

        }

        public static function getError($clave)
        {
            //devuelve el error de una clave
        }

    }

    