<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/intento.php';


    class intentoRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fecha, JSONIntento FROM intento WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // intentoRepository::mostrarSelect($registro);
                return $intento = new Intento($registro['id'], $registro['fecha'], $registro['JSONIntento']);
            }
        }

        public static function findObject($intento)
        {
            findById($intento->getID());
        }

        //Por Fecha
        public static function findByFecha($fecha)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fecha, JSONIntento FROM intento WHERE fecha = '$fecha';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // intentoRepository::mostrarSelect($registro);
                return $intento = new Intento($registro['id'], $registro['fecha'], $registro['JSONIntento']);
            }
        }

        //Por JSONIntento
        public static function findByJSONIntento($JSONIntento)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fecha, JSONIntento FROM intento WHERE JSONIntento = '$JSONIntento';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // intentoRepository::mostrarSelect($registro);
                return $intento = new Intento($registro['id'], $registro['fecha'], $registro['JSONIntento']);
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fecha, JSONIntento FROM intento;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // intentoRepository::mostrarSelect($registro);
                return $intento = new Intento($registro['id'], $registro['fecha'], $registro['JSONIntento']);
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
            intentoRepository::deleteById($intento.getID());
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
            $resultado = $conexion->exec("INSERT INTO intento(fecha, JSONIntento) values ('" . $intento->getFecha() . "', '" . $intento->getJSONIntento() . "';");
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
            $resultado = $conexion->exec("UPDATE intento SET fecha = '$nuevaFecha' WHERE id = '". $intento->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //JSONIntento
        public static function updateJSONIntento($intento, $nuevoJSON)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE intento SET JSONIntento = '$nuevoJSON' WHERE id = '" . $intento->getID() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //-----------------------------FUNCIONES PROPIAS-------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "Fecha y Hora: ".$registro['fecha']."<br>";
            echo "JSONIntento: ".$registro['JSONIntento']."<br>";
        }

        //Comprobar que el usuario existe
        public static function existeIntento($JSONIntento)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fecha, JSONIntento FROM pregunta WHERE JSONIntento like '$JSONIntento';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //Entra si existe el intento
                $respuesta = true;
            }

            return $respuesta;
        }
    }
?>