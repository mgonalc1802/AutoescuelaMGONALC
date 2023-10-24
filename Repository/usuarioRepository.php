<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/usuario.php';


    class usuarioRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM usuario WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Encontrar por objeto
        public static function findObject($usuario)
        {
            findById($usuario.getID());
        }

        //Por nombre
        public static function findByName($nombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM usuario WHERE nombre = '$nombre';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Por rol
        public static function findByRol($rol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT nombre FROM usuario WHERE rol = '$rol';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['nombre']."<br>";
            }
        }

        //Por Url
        public static function findByUrlFoto($urlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT nombre FROM usuario WHERE urlFoto = '$urlFoto';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['nombre']."<br>";
            }
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM usuario;");
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
            $resultado = $conexion->exec("DELETE FROM usuario WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar un objeto
        public static function deleteObject($usuario)
        {
            deleteById($usuario.getID());
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
            $resultado = $conexion->exec("INSERT INTO usuario(nombre, contrasenia, rol, urlFoto) values (" . $usuario.getNombre() . ", " . $usuario.getContrasenia() . ", " . $usuario.getRol() . ", " . $usuario.getUrlFoto() . ");");
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
            $resultado = $conexion->exec("UPDATE usuario SET nombre = " . $usuario.setNombre($nuevoNombre) . " WHERE id = $id;");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //contrasenia
        public static function updateContrasenia($usuario, $nuevaContrasenia)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET contrasenia = " . $usuario.setContrasenia($nuevaContrasenia) . " WHERE id = " . $usuario.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //urlFoto
        public static function updateUrlFoto($usuario, $nuevoUrlFoto)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET urlFoto = " . $usuario.setUrlFoto($nuevoUrlFoto) . " WHERE urlFoto = " . $usuario.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //rol
        public static function updateRol($usuario, $nuevoRol)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE usuario SET rol = " . $usuario.setNombre($nuevoRol) . " WHERE id = " . $usuario.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>