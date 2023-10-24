<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/dificultad.php';


    class dificultadRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM dificultad WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Encontrar por objeto
        public static function findObject($dificultad)
        {
            findById($dificultad.getID());
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM dificultad WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM dificultad;");
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
            $resultado = $conexion->exec("DELETE FROM dificultad WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar un objeto
        public static function deleteObject($dificultad)
        {
            deleteById($dificultad.getID());
        }

        //Por Nombre
        public static function deleteByNombre($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM dificultad WHERE nombre = '$nombre';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM dificultad;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($dificultad)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO dificultad(nombre) values (" . $dificultad.getNombre() . ");");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }



        


        //--------------------------------ACTUALIZAR-----------------------------
        //nombre
        public static function updateNombre($dificultad, $nuevoNombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE dificultad SET nombre = " . $dificultad.setNombre($nuevoNombre) . " WHERE id = " . $dificultad.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>