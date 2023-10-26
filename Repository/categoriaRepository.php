<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/categoria.php';


    class categoriaRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM categoria WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // categoriaRepository::mostrarSelect($registro);
                return $categoria = new Categoria($registro['id'], $registro['nombre']);
            }
        }

        public static function findObject($categoria)
        {
            // categoriaRepository::findById($categoria->getID());
            return $categoria = new Categoria($registro['id'], $registro['nombre']);
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM categoria WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // categoriaRepository::mostrarSelect($registro);
                return $categoria = new Categoria($registro['id'], $registro['nombre']);
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

        //Borrar un objeto
        public static function deleteObject($categoria)
        {
            categoriaRepository::deleteById($categoria->getID());
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
            $resultado = $conexion->exec("INSERT INTO categoria(nombre) values ('" . $categoria->getNombre() . "');");
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
            $resultado = $conexion->exec("UPDATE categoria SET nombre = '$nuevoNombre' WHERE id = '" . $categoria->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }


        //_----------------------------FUNCIONES PROPIAS----------------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "Nombre: ".$registro['nombre']."<br><br>";
        }

        //Comprobar que el Categoria existe
        public static function existeCategoria($nombre)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM categoria WHERE nombre like = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //Entra si existe el Categoria
                $respuesta = true;
            }

            return $respuesta;
        }
    }
?>