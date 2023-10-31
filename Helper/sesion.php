<?php
    //Objeto sesion
    //Estática
    class Sesion
    {
        public static function iniciarSesion()
        {
            session_start();
        }

        public static function cierraSesion()
        {
            session_destroy();
        }

        public static function guardaSesion($clave, $valor)
        {
            $_SESSION[$clave] = $valor;
        }

        public static function leerSesion($clave)
        {
            return $_SESSION[$clave];
        }

        public static function existeValorSesion($clave)
        {
            return isset($_SESSION[$clave]);
        }

        // public static function logOutF($ruta)
        // {
        //     logOut($ruta);
        // }
    }
?>