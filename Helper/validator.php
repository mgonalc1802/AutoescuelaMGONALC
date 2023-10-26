<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/sesion.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/usuario.php';


    class Validator
    {
        private static $errores = array();

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
                validator::$errores[$clave] = "Número fuera de rango."; //Agrega mensaje de error
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
                validator::$errores[$clave] = "La cadena no puede estar vacía."; //Agrega mensaje de error
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
                validator::$errores[$clave] = "Patrón no válido.";
                $parametro = false; // No es válido
            }

            return $parametro;
        }

        public static function validarLogin($usuario, $contraseña)
        {
            //Si no hay ningún valor en el usuario
            if(empty($usuario))
            {
                validator::$errores['nombre'] = "Por favor, introduce un usuario.";
            }

            //Si no hay ningún valor en la contraseña
            if(empty($contraseña))
            {
                validator::$errores['contrasenia'] = "Por favor, introduzca su contraseña";
            }

            // if($user)
            // {
            //     //Si no existe un usuario
            //     $errores['user'] = "<h3>Usuario No Encontrado</h3>";
            // }

            //Devuelve el array con los errores introducidos.
            return validator::$errores;
        }

        public static function usuarioNoEncontrado()
        {
            //Si no existe un usuario
            validator::$errores['user'] = "<h3>Usuario No Encontrado</h3>";

            //Devuelve el array con los errores introducidos.
            return validator::$errores;
        }

        
        public static function hayErrores()
        {
            $parametro = false;
            
            // Verificar si hay errores en la última ejecución
            if(count(validator::$errores) > 0)
            {
                $parametro = true;
            }

            return $parametro;
        }

        public static function getErrores()
        {
            //Devuelve un array de errores
            return validator::$errores;
        }

        public static function getError($clave)
        {
            //devuelve el error de una clave
            return validator::$errores[$clave];
        }

    }

    