<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/intento.php';


    class intentoRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM intento WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        public static function findObject($intento)
        {
            findById($intento.getID());
        }

        //Por Fecha
        public static function findByFecha($fecha)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM intento WHERE fecha = '$fecha';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Por JSONIntento
        public static function findByJSONIntento($JSONIntento)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT fecha FROM intento WHERE JSONIntento = '$JSONIntento';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['fecha']."<br>";
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM intento;");
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
            $resultado = $conexion->exec("DELETE FROM intento WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        public static function deleteObject($intento)
        {
            deleteById($intento.getID());
        }

        //Por Fecha
        public static function deleteByFecha($fecha)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM intento WHERE fecha = '$fecha';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por JSONIntento
        public static function deleteByJSONIntento($JSONIntento)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM intento WHERE JSONIntento = '$JSONIntento';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM intento;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($intento)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO intento(fecha, JSONIntento) values (" . $intento.getFecha() . ", " . $intento.getJSONIntento() . ";");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //fecha
        public static function updateFecha($intento, $nuevaFecha)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE intento SET fecha = " . $intento.setFecha($nuevaFecha) . " WHERE id = ". $intento.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //JSONIntento
        public static function updateJSONIntento($intento, $nuevoJSON)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE intento SET JSONIntento = " . $intento.setJSONIntento($nuevoJSON) . " WHERE id = " . $intento.getID() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>