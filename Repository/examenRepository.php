<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/examen.php';


    class examenRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fechaCreacion, idProfesor FROM examen WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // examenRepository::mostrarSelect($registro);
                return $examen = new Examen($registro['id'], $registro['fechaCreacion'], $registro['idProfesor']);
            }
        }

        public static function findObject($examen)
        {
            examenRepository::findById($examen->getID());
        }

        //Por fechaCreacion
        public static function findByFechaCreacion($fechaCreacion)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fechaCreacion, idProfesor FROM examen WHERE fechaCreacion = '$fechaCreacion';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // examenRepository::mostrarSelect($registro);
                return $examen = new Examen($registro['id'], $registro['fechaCreacion'], $registro['idProfesor']);
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fechaCreacion, idProfesor FROM examen;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // examenRepository::mostrarSelect($registro);
                return $examen = new Examen($registro['id'], $registro['fechaCreacion'], $registro['idProfesor']);
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
            examenRepository::deleteById($examen->getID());
        }

        //Por Fecha de creación
        public static function deleteByFechaCreacion($fechaCreacion)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examen WHERE fechaCreacion = '$fechaCreacion';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por Fecha de creación
        public static function deleteByIdProfesor($idProfesor)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM examen WHERE idProfesor = '$idProfesor';");
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
            // $resultado = $conexion->exec("INSERT INTO usuario(fechaCreacion, idProfesor) values ('" . $examen->getFechaCreacion() . "', '" . $usuario->getIdProfesor() . "');");
            $resultado = $conexion->exec("INSERT INTO examen(fechaCreacion, idProfesor)  values ('" . $examen->getFechaCreacion() . "', '" . $examen->getIdProfesor() . "');");
            // if ($resultado) 
            // {
            //     print "<p> Se han insertado $resultado registros.</p>";
            // }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //fechaCreacion
        public static function updateFechaCreación($examen, $nuevoFechaCreacion)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examen SET fechaCreacion = '$nuevoFechaCreacion' WHERE id = '" . $examen->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //fechaCreacion
        public static function updateIdProfesor($examen, $nuevoIdProfesor)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE examen SET idProfesor = '$nuevoIdProfesor' WHERE id = '" . $examen->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }




        //-----------------------------FUNCIONES PROPIAS-------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "Fecha de Creacion: ".$registro['fechaCreacion']."<br>";
            echo "ID Profesor: ".$registro['idProfesor']."<br><br>";
        }

        //Comprobar que el examen existe
        public static function existeExamen($fechaCreacion, $idProfesor)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, fecha, idProfesor FROM examen WHERE fechaCreacion = '$fechaCreacion' and idProfesor = '$idProfesor';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //Entra si existe el examen
                $respuesta = true;
            }

            return $respuesta;
        }
    }
?>