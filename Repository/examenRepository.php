<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/examen.php';


    class examenRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM examen WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        public static function findObject($examen)
        {
            findById($examen.getID());
        }

        //Por fechaCreacion
        public static function findByFechaCreacion($fechaCreacion)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM examen WHERE fechaCreacion = '$fechaCreacion';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM examen;");
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
            $resultado = $conexion->exec("DELETE FROM examen WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        public static function deleteObject($examen)
        {
            deleteById($examen.getID());
        }

        //Por Nombre
        public static function deleteByFechaCreacion($fechaCreacion)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examen WHERE fechaCreacion = '$fechaCreacion';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examen;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($examen)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO examen(fechaCreacion) values (" . $examen.getFechaCreacion() . ");");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //fechaCreacion
        public static function updateFechaCreación($examen, $nuevoFechaCreacion)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examen SET fechaCreacion = " . $examen.setFechaCreacion($nuevoFechaCreacion) . " WHERE id = " . $examen.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>