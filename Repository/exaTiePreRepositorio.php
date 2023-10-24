<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/examentienepregunta.php';


    class usuarioRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM examentienepregunta WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        public static function findObject($examentienepregunta)
        {
            findById($examentienepregunta.getID());
        }

        //Por idExamen
        public static function findByIdExamen($idExamen)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM examentienepregunta WHERE idExamen = '$idExamen';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Por idPregunta
        public static function findByIdPregunta($idPregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT idExamen FROM examentienepregunta WHERE idPregunta = '$idPregunta';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "IDExamen ".$registro['idExamen']."<br>";
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM examentienepregunta;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID: ".$registro['id']."<br>";
            }
        }






        //-------------------------------------BORRAR-----------------------------
        //Por ID
        public static function deleteById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examentienepregunta WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }        
        }

        //Por IdExamen
        public static function deleteByIdExamen($idExamen)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examentienepregunta WHERE idExamen = '$idExamen';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }        
        }

        public static function deleteObject($examentienepregunta)
        {
            deleteById($examentienepregunta.getID());
        }

        //Por IdPregunta
        public static function deleteByIdPregunta($idPregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examentienepregunta WHERE idPregunta = '$idPregunta';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }        
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examentienepregunta;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($examentienepregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO examentienepregunta(idExamen, idPregunta) values (" . $examentienepregunta.getIdExamen() . ", " . $examentienepregunta.getIdPregunta() . ");");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //idExamen
        public static function updateIdExamen($examentienepregunta, $nuevoIdExamen)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examentienepregunta SET idExamen = " . $examentienepregunta.setIdExamen($nuevoIdExamen) . " WHERE id = " $examentienepregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //idPregunta
        public static function updateUrlFoto($examentienepregunta, $nuevoUrlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examentienepregunta SET idPregunta = " . $examentienepregunta.setUrlFoto($nuevoUrlFoto) . " WHERE idPregunta = " $examentienepregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>