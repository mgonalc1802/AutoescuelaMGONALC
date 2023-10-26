<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/dificultad.php';


    class dificultadRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM dificultad WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // dificultadRepository::mostrarSelect($registro);
                return $dificultad = new Dificultad($registro['id'], $registro['nombre']);
            }
        }

        //Encontrar por objeto
        public static function findObject($dificultad)
        {
            // dificultadRepository::findById($dificultad->getID());
            return $dificultad = new Dificultad($registro['id'], $registro['nombre']);
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM dificultad WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                dificultadRepository::mostrarSelect($registro);
                return $dificultad = new Dificultad($registro['id'], $registro['nombre']);
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM dificultad;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                return $dificultad = new Dificultad($registro['id'], $registro['nombre']);
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
            dificultadRepository::deleteById($dificultad->getID());
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
            $resultado = $conexion->exec("INSERT INTO dificultad(nombre) values ('" . $dificultad->getNombre() . "');");
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
            $resultado = $conexion->exec("UPDATE dificultad SET nombre = '$nuevoNombre' WHERE id = '" . $dificultad->getId() . "';");
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

        //Comprobar que el dificultad existe
        public static function existeDificultad($nombre)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre FROM dificultad WHERE nombre like = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //Entra si existe el dificultad
                $respuesta = true;
            }

            return $respuesta;
        }
    }
?>