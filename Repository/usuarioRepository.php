<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Principal/enrutador.php';

    class usuarioRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto'], $registro['validado']);
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
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto'], $registro['validado']);
                
            }
        }

        //Por rol
        public static function findByRol($rol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario WHERE rol = '$rol';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto'], $registro['validado']);
            }
        }

        //Por Url
        public static function findByUrlFoto($urlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario WHERE urlFoto = '$urlFoto';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // usuarioRepository::mostrarSelect($registro);
                return $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto'], $registro['validado']);
            }
        }

        //Por Validado
        public static function findByValidado($validado)
        {
            $conexion = DB::conecta();
            $usuarios;
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario WHERE validado = '$validado';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // usuarioRepository::mostrarSelect($registro);
                $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto'], $registro['validado']);
                $usuarios[] = $usuario;
            }

            return $usuarios;
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $usuarios;
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // usuarioRepository::mostrarSelect($registro);
                $usuario = new Usuario($registro['id'], $registro['nombre'], $registro['contrasenia'], $registro['rol'], $registro['urlFoto'], $registro['validado']);
                $usuarios[] = $usuario;
                
            }
            
            return $usuarios;
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

        //Por urlFoto
        public static function deleteByValidado($validado)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM usuario WHERE validado = '$validado';");
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
            $resultado = $conexion->exec("INSERT INTO usuario(nombre, contrasenia, rol, urlFoto, validado) values ('" . $usuario->getNombre() . "', '" . $usuario->getContrasenia() . "', '" . $usuario->getRol() . "', '" . $usuario->getUrlFoto() . "', '" . $usuario->getValidado() . "');");
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
            // if ($resultado) 
            // {
            //     header("Location: $ruta");
            // }
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
            // if ($resultado) 
            // {
            //     print "<p> Se han actualizado $resultado registros.</p>";
            // }
        }

        //rol
        public static function updateValidado($usuario, $nuevoValidado)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET validado = '$nuevoValidado' WHERE id = '" . $usuario->getId() . "';");
            // if ($resultado) 
            // {
            //     print "<p> Se han actualizado $resultado registros.</p>";
            // }
        }

        

        //_----------------------------FUNCIONES PROPIAS----------------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "Nombre: ".$registro['nombre']."<br>";
            echo "Contraseña: ".$registro['contrasenia']."<br>";
            echo "Rol: ".$registro['rol']."<br>";
            echo "Foto: ".$registro['urlFoto']."<br><br>";
            echo "Validado: ".$registro['validado']."<br><br>";
        }


        //Comprobar que el usuario existe
        public static function existeUsuario($nombre, $contraseña)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, nombre, contrasenia, rol, urlFoto, validado FROM usuario WHERE nombre like '$nombre' and  contrasenia like '$contraseña' ;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // echo "Entra en existe Usuario";
                $respuesta = true;
            }

            return $respuesta;
        }

        
    }
?>