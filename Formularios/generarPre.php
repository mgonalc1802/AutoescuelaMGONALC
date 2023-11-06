<main id = "genPreg">
    
    <?php
        //Partes del proyecto que utiliza el login
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        //Acción que se produce cuando pulsas el botón registrar
        if(isset($_POST['agregarPre']))
        {
            //Guarda los datos introducidos en las cajas de texto
            $enunciado = $_POST['enunciado'];
            $respuesta1 = $_POST['respuesta1'];
            $respuesta2 = $_POST['respuesta2'];
            $respuesta3 = $_POST['respuesta3'];
            $correcta = $_POST['correcta'];
            // $url = $_POST['url'];
            $tipoUrl = $_POST['tipoUrl'];
            $categoria = $_POST['categoria'];
            $dificultad = $_POST['dificultad'];

            if($correcta == "respuesta1")
            {
                $respCorr = $respuesta1;
            }

            if($correcta == "respuesta2")
            {
                $respCorr = $respuesta2;
            }

            if($correcta == "respuesta3")
            {
                $respCorr = $respuesta3;
            }

            //Comprueba que los campos anteriores no estén vacíos
            $erroresEnviar = validator::validarGenPre($enunciado, $respuesta1, $respuesta2, $respuesta3);

            if(validator::hayErrores() == 0)
            {
                if(!preguntaRepository::existePregunta($enunciado, $respCorr))
                {
                    $url = "https://practicatest.com/views/layout/default/img/tests/B/8d84f46c4eca0ff0ab072c31094cd539.jpg";
                    $preguntaNuevo = new pregunta("", $enunciado, $respuesta1, $respuesta2, $respuesta3, $respCorr, $url, $tipoUrl, $categoria, $dificultad);
                    preguntaRepository::insert($preguntaNuevo);
                }
                else
                {
                    //Mensaje de error en caso de que se encuentre el pregunta.
                    $erroresEnviar = validator::preguntaExistente();
                }
            }
        }

        //Acción que se produce cuando pulsa el botón redirigir
        if(isset($_POST['volver']))
        {
            $user = Sesion::leerSesion('user');

            if($user->getRol() == 'profesor')
            {        
                header("Location: ?menu=profesor");
                exit;
            }
            if($user->getRol() == 'administrador')
            {        
                header("Location: ?menu=admin");
                exit;
            }

        }
        
    ?>


    <form id = "generarPre" enctype = "multipart/form-data" action = "?menu=genPre" method = "POST">

        <h1>Generar Pregunta</h1>
        <div id = "global">
            <label>Enunciado:</label>
            <input class = "pregInput" type = "text" name = "enunciado" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['enunciado'])) ? "" : "<span class = 'errores'>".$erroresEnviar['enunciado']."</span>");
            ?>

            <br>
            <label>Respuesta 1: </label> 
            <input class = "pregInput" type = "text" name = "respuesta1" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['respuesta1'])) ? "" : "<span class = 'errores'>".$erroresEnviar['respuesta1']."</span>");
            ?><br>

            <label>Respuesta 2: </label>
            <input class = "pregInput" type = "text" name = "respuesta2" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['respuesta2'])) ? "" : "<span class = 'errores'>".$erroresEnviar['respuesta2']."</span>");
            ?>

            <br>
            <label>Respuesta 3: </label> 
            <input class = "pregInput" type = "text" name = "respuesta3" ><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['respuesta3'])) ? "" : "<span class = 'errores'>".$erroresEnviar['respuesta3']."</span>");
            ?><br>

            <div id = "corTipUrl">
                <div>
                    <label>Correcta: </label>
                    <select name = "correcta">
                        <option value = "respuesta1" selected>Respuesta 1</option>
                        <option value = "respuesta2">Respuesta 2</option>
                        <option value = "respuesta3">Respuesta 3</option>
                    </select>
                </div>
                
                <div>
                    <label>Tipo URL:</label> 
                    <select name = "tipoUrl">
                        <option value = "foto" selected>Foto</option>
                        <option value = "video">Video</option>
                    </select>
                </div>
            
                <div>
                    <label>URL: </label>
                    <input type = "hidden" name = "MAX_FILE_SIZE" value = "30000" />
                    <input name = "urlFoto" type = "file" /> <br><br>
                </div>
                
            </div>
            

            <div id = "catDif">
                <div>
                    <label>Categoria:</label>
                    <?php
                        
                        $categorias= categoriaRepository::findAll();

                        // Imprime el inicio del elemento <select>
                        echo '<select name = "categoria">';
                        
                        // Genera las opciones del select utilizando un bucle
                        foreach ($categorias as $categoria) 
                        {
                            echo '<option value = "' . $categoria->getId() . '">' . $categoria->getNombre() . '</option>';
                        }

                        echo "</select><br><br>";
                    ?>
                </div>
                
                <div>
                    <label>Dificultad:</label> 
                    <?php
                        
                        $dificultades = dificultadRepository::findAll();

                        // Imprime el inicio del elemento <select>
                        echo '<select name = "dificultad">';
                        
                        // Genera las opciones del select utilizando un bucle
                        foreach ($dificultades as $dificultad) 
                        {
                            echo '<option value = "' . $dificultad->getId() . '">' . $dificultad->getNombre() . '</option>';
                        }

                        echo "</select><br><br>";
                    ?>
                </div>
            </div>
            

            <!-- Botón de enviar -->
            <input id = "agregarPre" type = "submit" value = "Agregar"  name = "agregarPre">
            <input id = "volver" type = "submit" value = "Volver" name = "volver"><br>

            <?php
                //Comprueba que este correcto, si no, muestra mensaje de error en rojo
                echo((empty($erroresEnviar['preguntaE'])) ? "" : "<span class = 'errores'>".$erroresEnviar['preguntaE']."</span>");
            ?>
        </div>
    </form>
</main>