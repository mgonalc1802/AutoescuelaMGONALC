<?php
    class Validator
    {
        private  $errores = [];

        public static function rango($clave, $valor, $min, $max)
        {
            /*Valor el parámetro a comparar con un valor minimo y un maximo*/
            $parametro = false;

            //Condición a cumplir
            if($valor <= $max && $valor >= $min)
            {
                $parametro = true; //Si es correcto
            }
            else
            {
                $this->$errores[$clave] = "Número fuera de rango."; //Agrega mensaje de error
            }

            //Devuelves el parámetro
            return $parametro;
        }

        public static function validarEmail($email, $clave)
        {
            //Patrón de expresión regular para validar direcciones de correo de Gmail
            $patron = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
            return validator::match($email, $patron);
        }

        public static function vacio($cadena, $clave)
        {

            $parametro = false;
            // Utiliza la función trim para eliminar espacios en blanco al inicio y al final
            $cadena = trim($cadena);

            if(empty($cadena)) 
            {
                $this->$errores[$clave] = "La cadena no puede estar vacía."; //Agrega mensaje de error
                $parametro = true; // La cadena está vacía
            } 
            else 
            {
                $parametro = false; // La cadena no está vacía
            }

            return $parametro;
        }

        public static function match($valor, $patron, $clave)
        {
            $parametro = true;

            //Usar la función preg_match para verificar si el valor coincide con el patrón
            if (preg_match($patron, $valor)) 
            { 
                $parametro = true; // Es una válido
            } 
            else 
            {
                $this->$errores[$clave] = "Patrón no válido.";
                $parametro = false; // No es válido
            }

            return $parametro;
        }

        public static function hayErrores()
        {
            $parametro = false;
            
            // Verificar si hay errores en la última ejecución
            if(count($errores) > 0)
            {
                $parametro = true;
            }

            return $parametro;
        }

        public static function getErrores()
        {
            //Devuelve un array de errores
            return $errores;
        }

        public static function getError($clave)
        {
            //devuelve el error de una clave
            return $errores[$clave];
        }

    }

    