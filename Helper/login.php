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
            return existeValorSesion($clave);
        }

        public static function logOut($ruta)
        {
            cierraSesion();

            if(!empty($ruta))
            {
                header("Location: $ruta");
                exit;
            }
        }
    }
?>