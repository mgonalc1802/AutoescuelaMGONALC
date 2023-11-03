<?php
    //Objeto login
    //Estática
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/sesion.php';

    class login
    {
        private static $usuarios = array();

        public static function logIn($objeto)
        {
            sesion::iniciarSesion();
            sesion::guardaSesion('user', $objeto); 
        }

        public static function estaLogueado($clave)
        {
            return sesion::existeValorSesion($clave);
        }

        public static function logOut($ruta)
        {
            sesion::cierraSesion();

            if(!empty($ruta))
            {
                header("Location: $ruta");
                exit;
            }
        }
    }
?>