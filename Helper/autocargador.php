<?php
    class Autocargador
    {
        public static function autocargar()
        {
            spl_autoload_register(function ($clase) 
            {
                //Establece la ruta base del proyecto
                $rutaBase = $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/';

                //Indica los directorios existentes
                $directorios = 
                [
                    'Entidades',
                    'Formularios',
                    'Helper',
                    'Repository',
                    'Interfaces',
                    'API',
                    'Database',
                    'Fotos/FotosUsuarios',
                    'Fotos/FotosPreguntas',
                    'JS',
                    'JSON',
                    'Plantillas',
                    'Principal'
                ];

                //Recorre los directorios hasta que encuentre el necesitado
                foreach ($directorios as $directorio) 
                {
                    //Crea la ruta del archivo que se busca
                    $archivo = $rutaBase . '/' . $directorio . '/' . $clase . '.php';

                    //Si existe, se usa.
                    if (file_exists($archivo)) 
                    {
                        require_once $archivo;
                        return;
                    }
                }

                // Si no se encuentra la clase, lanza una excepción indicando cúal es la no encontrada.
                throw new Exception("No se puede encontrar la clase: $clase");
            });
        }
    }

    Autocargador::autocargar();
?>