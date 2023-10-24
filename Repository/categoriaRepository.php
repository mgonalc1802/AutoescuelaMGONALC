<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/categoria.php';


    class categoriaRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM categoria WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        public static function findObject($categoria)
        {
            findById($categoria.getID());
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM categoria WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM categoria;");
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
            $resultado = $conexion->exec("DELETE FROM categoria WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por Nombre
        public static function deleteByNombre($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM categoria WHERE nombre = '$nombre';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM categoria;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($categoria)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO categoria(nombre) values (" . $categoria.getNombre() . ");");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //nombre
        public static function updateNombre($categoria, $nuevoNombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE categoria SET nombre = " . $categoria.setNombre($nuevoNombre) . " WHERE id = " . $categoria.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>