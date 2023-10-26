<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/usuario.php';


    class usuarioRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM usuario WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
            }
        }

        //Encontrar por objeto
        public static function findObject($usuario)
        {
            usuarioRepository::findById($usuario->getID());
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM usuario WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
                
            }
        }

        //Por rol
        public static function findByRol($rol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM usuario WHERE rol = '$rol';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
            }
        }

        //Por Url
        public static function findByUrlFoto($urlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM usuario WHERE urlFoto = '$urlFoto';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM usuario;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                for($i = 0; $i < count($registro); $i++)
                {
                    // echo count($registro);
                    return $usuario[$i] = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto']);
                }
            }
        }






        //-------------------------------------BORRAR-----------------------------
        //Por ID
        public static function deleteById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM usuario WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar un objeto
        public static function deleteObject($usuario)
        {
            usuarioRepository::deleteById($usuario->getID());
        }

        //Por Nombre
        public static function deleteByNombre($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM usuario WHERE nombre = '$nombre';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por Rol
        public static function deleteByRol($rol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM usuario WHERE rol = '$rol';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por urlFoto
        public static function deleteByUrlFoto($urlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM usuario WHERE urlFoto = '$urlFoto';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM usuario;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($usuario)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO usuario(nombre, contrasenia, rol, urlFoto) values ('" . $usuario->getNombre() . "', '" . $usuario->getContrasenia() . "', '" . $usuario->getRol() . "', '" . $usuario->getUrlFoto() . "');");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }






        //--------------------------------ACTUALIZAR-----------------------------
        //nombre
        public static function updateNombre($usuario, $nuevoNombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET nombre = '$nuevoNombre' WHERE id = '" . $usuario->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //contrasenia
        public static function updateContrasenia($usuario, $nuevaContrasenia)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET contrasenia = '$nuevaContrasenia' WHERE id = '" . $usuario->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //urlFoto
        public static function updateUrlFoto($usuario, $nuevoUrlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET urlFoto = '$nuevoUrlFoto' WHERE id = '" . $usuario->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //rol
        public static function updateRol($usuario, $nuevoRol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET rol = '$nuevoRol' WHERE id = '" . $usuario->getId() . "';");
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


        //Comprobar que el usuario existe
        public static function existeUsuario($nombre, $contraseña)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto FROM usuario WHERE nombre like '$nombre' and  contrasenia like '$contraseña' ;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // echo "Entra en existe Usuario";
                $respuesta = true;
            }

            return $respuesta;
        }

        
    }
?>