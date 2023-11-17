<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Database/DB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Entidades/pregunta.php';


    class preguntaRepository
    {
        private static $conexion;

        //-------------------------------ENCONTRAR--------------------------------------
        //Por ID
        public static function findById($id)
        {
            $conexion = DB::conecta();
            $preguntas;
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE id = '$id';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
                $preguntas[] = $pregunta;
            }
            return $preguntas;
        }

        public static function findObject($pregunta)
        {
            findById($pregunta->getID());
        }

        //Por enunciado
        public static function findByEnunciado($enunciado)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE enunciado = '$enunciado';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        //Por respuesta1
        public static function findByRespuesta1($respuesta1)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE respuesta1 = '$respuesta1';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        //Por respuesta2
        public static function findByRespuesta2($respuesta2)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE respuesta2 = '$respuesta2';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        //Por respuesta3
        public static function findByRespuesta3($respuesta3)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE respuesta3 = '$respuesta3';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        //Por correcta
        public static function findByCorrecta($correcta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE correcta = '$correcta';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        //Por respuesta2
        public static function findByUrl($url)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE respuesta2 = '$respuesta2';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        //Por tipoUrl
        public static function findByTipoUrl($tipoUrl)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE tipoUrl = '$tipoUrl';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                return $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
            }
        }

        public static function findByDificultad($dificultad)
        {
            $conexion = DB::conecta();
            $preguntas;
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE idDificultad = '$dificultad';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
                $preguntas[] = $pregunta;
            }

            return $preguntas;
        }

        //Encontrar a todos
        public static function findAll()
        {
            $conexion = DB::conecta();
            $preguntas;
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta;");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                // preguntaRepository::mostrarSelect($registro);
                $pregunta = new Pregunta($registro['id'], $registro['enunciado'], $registro['respuesta1'], $registro['respuesta2'], $registro['respuesta3'], $registro['correcta'], $registro['url'], $registro['tipoURL'], $registro['idCategoria'], $registro['idDificultad']);
                $preguntas[] = $pregunta;
            }

            return $preguntas;
        }






        //-------------------------------------BORRAR-----------------------------
        //Por ID
        public static function deleteById($id)
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
            preguntaRepository::deleteById($pregunta->getID());
        }

        //Por Enunciado
        public static function deleteByEnunciado($enunciado)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE enunciado = '$enunciado';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por Correcta
        public static function deleteByRespuesta1($respuesta1)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE respuesta1 = '$respuesta1';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por respuesta2
        public static function deleteByRespuesta2($respuesta2)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE respuesta2 = '$respuesta2';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por respuesta3
        public static function deleteByRespuesta3($respuesta3)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE respuesta3 = '$respuesta3';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por correcta
        public static function deleteByCorrecta($correcta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE correcta = '$correcta';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Por url
        public static function deleteByUrl($url)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE url = '$url';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }
        
        //Por tipoUrl
        public static function deleteByTipoUrl($tipoUrl)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta WHERE tipoUrl = '$tipoUrl';");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }

        //Borrar todos
        public static function deleteAll()
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("DELETE FROM pregunta;");
            if ($resultado) 
            {
                print "<p> Se han borrado $resultado registros.</p>";
            }
        }






        //----------------------------------INSERTAR-----------------------------
        public static function insert($pregunta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("INSERT INTO pregunta(enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoUrl, idCategoria, idDificultad) values ('" . $pregunta->getEnunciado() . "', '" . $pregunta->getRespuesta1() . "', '" . $pregunta->getRespuesta2() . "', '" . $pregunta->getRespuesta3() . "', '" . $pregunta->getCorrecta() . "', '" . $pregunta->getUrl() . "' , '" . $pregunta->getTipoUrl() . "', '" . $pregunta->getIdCategoria() . "', '" . $pregunta->getIdDificultad() . "');");
            if ($resultado) 
            {
                print "<p> Se han insertado $resultado registros.</p>";
            }
        }





        //--------------------------------ACTUALIZAR-----------------------------
        //enunciado
        public static function updateEnunciado($pregunta, $nuevoNombre)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET enunciado = '$nuevoNombre' WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //respuesta1
        public static function updateRespuesta1($pregunta, $nuevaResp1)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET respuesta1 = '$nuevaResp1'  WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //respuesta2
        public static function updateRespuesta2($pregunta, $nuevaResp2)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET respuesta2 = '$nuevaResp2'  WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //respuesta3
        public static function updaterespuesta3($pregunta, $nuevaResp3)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET respuesta3 = '$nuevaResp3'  WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //correcta
        public static function updatecorrecta($pregunta, $nuevaCorrecta)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET correcta = '$nuevaCorrecta' WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //url
        public static function updateUrl($pregunta, $nuevaURL)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET url = '$nuevaUR' WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }

        //tipoUrl
        public static function updateTipoUrl($pregunta, $nuevaTipoUrl)
        {
            $conexion = DB::conecta();
            $resultado = $conexion->exec("UPDATE pregunta SET tipoUrl = '$nuevaTipoUrl' WHERE id = '" . $pregunta->getId() . "';");
            if ($resultado) 
            {
                print "<p> Se han actualizado $resultado registros.</p>";
            }
        }


        //-----------------------------FUNCIONES PROPIAS-------------------
        public static function mostrarSelect($registro)
        {
            echo "ID: ".$registro['id']."<br>";
            echo "Enunciado: ".$registro['enunciado']."<br>";
            echo "Respuesta1: ".$registro['respuesta1']."<br>";
            echo "Respuesta2: ".$registro['respuesta2']."<br>";
            echo "Respuesta3: ".$registro['respuesta3']."<br>";
            echo "Correcta: ".$registro['correcta']."<br>";
            echo "URL: ".$registro['url']."<br>";
            echo "TipoUrl: ".$registro['tipoURL']."<br>";
            echo "ID Categoria: ".$registro['idCategoria']."<br>";   
            echo "ID Dificultad: ".$registro['idDificultad']."<br><br>";
        }

        //Comprobar que el usuario existe
        public static function existePregunta($enunciado, $correcta)
        {
            $respuesta = false;

            $conexion = DB::conecta();
            $resultado = $conexion->query("SELECT id, enunciado, respuesta1, respuesta2, respuesta3, correcta, url, tipoURL, idCategoria, idDificultad FROM pregunta WHERE enunciado like '$enunciado' and  correcta like '$correcta';");
            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) 
            {
                //Entra si existe la pregunta
                $respuesta = true;
            }

            return $respuesta;
        }
    }
?>