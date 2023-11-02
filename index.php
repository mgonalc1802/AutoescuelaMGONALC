<?php
    class Principal
    {
        public static function main()
        {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Helper/autocargador.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Helper/sesion.php';
            require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Principal/layout.php';
        }
    }
    Principal::main();
?>