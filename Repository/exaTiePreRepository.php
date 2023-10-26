<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/examentienepregunta.php';


    class exaTiePreRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, idExamen, idPregunta FROM examentienepregunta WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                exaTiePreRepository::mostrarSelect($registro);
            }
        }

        public static function findObject($examentienepregunta)
        {
            exaTiePreRepository::findById($examentienepregunta->getID());
        }

        //Por idExamen
        public static function findByIdExamen($idExamen)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, idExamen, idPregunta FROM examentienepregunta WHERE idExamen = '$idExamen';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                exaTiePreRepository::mostrarSelect($registro);
            }
        }

        //Por idPregunta
        public static function findByIdPregunta($idPregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, idExamen, idPregunta FROM examentienepregunta WHERE idPregunta = '$idPregunta';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                exaTiePreRepository::mostrarSelect($registro);
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, idExamen, idPregunta FROM examentienepregunta;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                exaTiePreRepository::mostrarSelect($registro);
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
            exaTiePreRepository::deleteById($examentienepregunta->getID());
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
            $resultado = $conexion->exec("INSERT INTO examentienepregunta(idExamen, idPregunta) values ('" . $examentienepregunta->getIdExamen() . "', '" . $examentienepregunta->getIdPregunta() . "');");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //idExamen
        public static function updateIdPregunta($examentienepregunta, $nuevaIdPregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examentienepregunta SET idPregunta = '$nuevaIdPregunta' WHERE id = '". $examentienepregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //idPregunta
        public static function updateIdExamen($examentienepregunta, $nuevoIdExamen)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examentienepregunta SET idExamen = '$nuevaIdExamen' WHERE id = '". $examentienepregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }



        //-----------------------------FUNCIONES PROPIAS-------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "IDExamen: ".$registro['idExamen']."<br>";
            echo "IDPregunta: ".$registro['idPregunta']."<br>";
        }
    }
?>