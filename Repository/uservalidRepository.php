<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/Uservalid.php';


    class uservalidRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM uservalid WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //uservalidRepository::mostrarSelect($registro);
                return $uservalid = new uservalid($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
            }
        }

        //Encontrar por objeto
        public static function findObject($uservalid)
        {
            uservalidRepository::findById($uservalid->getID());
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM uservalid WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //uservalidRepository::mostrarSelect($registro);
                return $uservalid = new uservalid($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
                
            }
        }

        //Por rol
        public static function findByRol($rol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM uservalid WHERE rol = '$rol';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //uservalidRepository::mostrarSelect($registro);
                return $uservalid = new uservalid($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
            }
        }

        //Por Url
        public static function findByUrlFoto($urlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM uservalid WHERE urlFoto = '$urlFoto';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // uservalidRepository::mostrarSelect($registro);
                return $uservalid = new uservalid($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $uservalids;
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM uservalid;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // uservalidRepository::mostrarSelect($registro);
                $uservalid = new uservalid($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
                $uservalids[] = $uservalid;
                
            }
            
            return $uservalids;
        }






        //-------------------------------------BORRAR-----------------------------
        //Por ID
        public static function deleteById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM uservalid WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar un objeto
        public static function deleteObject($uservalid)
        {
            uservalidRepository::deleteById($uservalid->getID());
        }

        //Por Nombre
        public static function deleteByNombre($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM uservalid WHERE nombre = '$nombre';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por Rol
        public static function deleteByRol($rol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM uservalid WHERE rol = '$rol';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por urlFoto
        public static function deleteByUrlFoto($urlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM uservalid WHERE urlFoto = '$urlFoto';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM uservalid;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($uservalid)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO uservalid(id, nombre, contrasenia, rol, urlFoto) values ('" . $uservalid->getId() . "', '" . $uservalid->getNombre() . "', '" . $uservalid->getContrasenia() . "', '" . $uservalid->getRol() . "', '" . $uservalid->getUrlFoto() . "');");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //nombre
        public static function updateNombre($uservalid, $nuevoNombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE uservalid SET nombre = '$nuevoNombre' WHERE id = '" . $uservalid->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //contrasenia
        public static function updateContrasenia($uservalid, $nuevaContrasenia)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE uservalid SET contrasenia = '$nuevaContrasenia' WHERE id = '" . $uservalid->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //urlFoto
        public static function updateUrlFoto($uservalid, $nuevoUrlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE uservalid SET urlFoto = '$nuevoUrlFoto' WHERE id = '" . $uservalid->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //rol
        public static function updateRol($uservalid, $nuevoRol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE uservalid SET rol = '$nuevoRol' WHERE id = '" . $uservalid->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //_----------------------------FUNCIONES PROPIAS----------------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "Nombre: ".$registro['nombre']."<br>";
            echo "Contraseña: ".$registro['contrasenia']."<br>";
            echo "Rol: ".$registro['rol']."<br>";
            echo "Foto: ".$registro['urlFoto']."<br><br>";
        }


        //Comprobar que el uservalid existe
        public static function existeuservalid($nombre, $contraseña)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM uservalid WHERE nombre like '$nombre' and  contrasenia like '$contraseña' ;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // echo "Entra en existe uservalid";
                $respuesta = true;
            }

            return $respuesta;
        }

        
    }
?>