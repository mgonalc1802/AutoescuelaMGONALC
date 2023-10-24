<?php
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Database/DB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/Proyecto1/Entidades/pregunta.php';


    class preguntaRepositorio
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        function findById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM pregunta WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        public static function findObject($pregunta)
        {
            findById($pregunta.getID());
        }

        //Por enunciado
        function findByEnunciado($enunciado)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM pregunta WHERE enunciado = '$enunciado';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID ".$registro['id']."<br>";
            }
        }

        //Por respuesta1
        function findByRespuesta1($respuesta1)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT enunciado FROM pregunta WHERE respuesta1 = '$respuesta1';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['enunciado']."<br>";
            }
        }

        //Por respuesta2
        function findByRespuesta2($respuesta2)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT enunciado FROM pregunta WHERE respuesta2 = '$respuesta2';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['enunciado']."<br>";
            }
        }

        //Por respuesta3
        function findByRespuesta3($respuesta3)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT enunciado FROM pregunta WHERE respuesta3 = '$respuesta3';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['enunciado']."<br>";
            }
        }

        //Por correcta
        function findByCorrecta($correcta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT enunciado FROM pregunta WHERE correcta = '$correcta';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['enunciado']."<br>";
            }
        }

        //Por respuesta2
        function findByUrl($url)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT enunciado FROM pregunta WHERE respuesta2 = '$respuesta2';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['enunciado']."<br>";
            }
        }

        //Por respuesta2
        function findByTipoUrl($tipoUrl)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT enunciado FROM pregunta WHERE tipoUrl = '$tipoUrl';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "Nombre ".$registro['enunciado']."<br>";
            }
        }

        //Encontrar a todos
        function findAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id FROM pregunta;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                echo "ID: ".$registro['id']."<br>";
            }
        }






        //-------------------------------------BORRAR-----------------------------
        //Por ID
        function deleteById($id)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE id = '$id';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar un objeto
        public static function deleteObject($pregunta)
        {
            deleteById($pregunta.getID());
        }

        //Por Nombre
        function deleteByEnunciado($enunciado)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE enunciado = '$enunciado';")unciado
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por Rol
        function deleteByRespuesta1($respuesta1)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE respuesta1 = '$respuesta1';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por respuesta2
        function deleteByRespuesta2($respuesta2)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE respuesta2 = '$respuesta2';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por respuesta3
        function deleteByRespuesta3($respuesta3)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE respuesta3 = '$respuesta3';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por correcta
        function deleteByCorrecta($correcta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE correcta = '$correcta';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por url
        function deleteByUrl($url)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE url = '$url';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }
        
        //Por tipoUrl
        function deleteByTipoUrl($tipoUrl)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE tipoUrl = '$tipoUrl';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        function insert($pregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO pregunta(enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoUrl) values (" . $pregunta.getEnunciado() . ", " . $pregunta.getRespuesta1() . ", " . $pregunta.getRespuesta2() . ", " . $pregunta.getRespuesta3() . ", " . $pregunta.getCorrecta() . ", " . $pregunta.getUrl() . " , " . $pregunta.getTipoUrl() . ");")unciado
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }
z





        //--------------------------------ACTUALIZAR-----------------------------
        //enunciado
        function updateEnunciado($pregunta, $nuevoNombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET enunciado = " . $pregunta.setNombre($nuevoNombre) . " WHERE id = " . pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //respuesta1
        function updateRespuesta1($pregunta, $nuevaResp1)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET respuesta1 = " . $pregunta.setRespuesta1($nuevaResp1) . " WHERE id = " . $pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //respuesta2
        function updateRespuesta2($pregunta, $nuevaResp2)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET respuesta2 = " . $pregunta.setRespuesta2($nuevaResp2) . " WHERE respuesta2 = " . $pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //respuesta3
        function updaterespuesta3($pregunta, $nuevaResp3)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET respuesta3 = " . $pregunta.setRespuesta3($nuevaResp3) . " WHERE id = " . $pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //correcta
        function updatecorrecta($pregunta, $nuevaCorrecta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET correcta = " . $pregunta.setCorrecta($nuevaCorrecta) . " WHERE id = " . $pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //url
        function updateUrl($pregunta, $nuevaURL)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET url = " . $pregunta.setUrl($nuevaURL) . " WHERE id = " . $pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //tipoUrl
        function updateTipoUrl($pregunta, $nuevaTipoUrl)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET tipoUrl = " . $pregunta.setTipoUrl($nuevaTipoUrl) . " WHERE id = " . $pregunta.getId() . ";");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }
    }
?>