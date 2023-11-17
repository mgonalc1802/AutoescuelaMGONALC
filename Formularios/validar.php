<main id = "validarFor">
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';
        if(Login::estaLogueado('user') )
        { 
            $user = Sesion::leerSesion('user');
            $rol = $user->getRol();

            if(isset($_POST['volverAd']))
            {
                header("Location: ?menu=admin");
                exit;
            }

            if(isset($_POST['añadirVa']))
            {
                header("Location: ?menu=registro");
                exit;
            }

            if($rol == "administrador")
            {    
                $contador = 0;
                $contadorV = 0;
                $usuarios = usuarioRepository::findByValidado(0);
                $usuariosValidados = usuarioRepository::findByValidado(1);        
    ?>

    <form action = "?menu=validar" method = "POST">
        <h1>Gestión De Usuarios</h1>

        <div id = "containerVal">
            <div>
                <h2>Validar</h2>

                <table>
                    <thead>
                        <tr>
                            <th id = "ordNombre">NOMBRE</th>
                            <th id = "ordRol">ROL</th>
                            <th id = "accion">ACCION</th>
                        </tr>
                    </thead>

                    <tbody id = "cuerpoTab">
                        <?php            
                            foreach($usuarios as $usuario) 
                            {
                                echo "<tr><td>" . $usuario->getNombre() . "</td>";
                        ?>

                                <td>
                                    <select name = 'rol'>
                                        <option value = 'profesor' <?php if ($usuario->getRol() == 'profesor') echo 'selected'; ?>>Profesor</option>
                                        <option value = 'estudiante' <?php if ($usuario->getRol() == 'estudiante') echo 'selected'; ?>>Estudiante</option>
                                    </select>
                                </td>
                            <?php

                                echo "<td><center>
                                        <input class = 'validarUser' type = 'submit' value = 'Validar' name = 'validarUser" . $contador ."'>
                                        <input class = 'denegarUser' type = 'submit' value = 'Denegar' name = 'denegarUser" . $contador ."'>
                                        </center>
                                    </td>";
                                $contador = $contador+ 1;
                            }

                            for($i = 0; $i < $contador; $i++)
                            {
                                if(isset($_POST['validarUser' . $i]))
                                {
                                    usuarioRepository::updateValidado($usuarios[$i], '1');
                                    header("Location: ?menu=validar");
                                    exit;
                                }

                                if(isset($_POST['denegarUser' . $i]))
                                {
                                    usuarioRepository::deleteObject($usuarios[$i]);
                                    header("Location: ?menu=validar");
                                    exit;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div>
                <h2>Controlar</h2>

                <table>
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>ROL</th>
                            <th>URL</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php        
                        foreach($usuariosValidados as $usuarioVal) 
                        {    
            ?>
                        <tr>
                            <td>
                                <input name = "nombre<?php echo $contadorV ?>" type = "text" value = '<?php echo $usuarioVal->getNombre() ?>'>
                            </td> 
                            <td>
                                <select name = 'rol<?php echo $contadorV ?>'>
                                    <option value = 'profesor' <?php if ($usuarioVal->getRol() == 'profesor') echo 'selected'; ?>>Profesor</option>
                                    <option value = 'estudiante' <?php if ($usuarioVal->getRol() == 'estudiante') echo 'selected'; ?>>Estudiante</option>
                                </select>
                            </td>
                            <?php

                                $rutaCompleta = $usuarioVal->getUrlFoto();
                            
                                // Encuentra la última barra diagonal (/) en la ruta
                                $ultimaBarra = strrpos($rutaCompleta, '/');
                            
                                // Extrae la parte de la ruta después de la última barra diagonal
                                $nombreArchivo = substr($rutaCompleta, $ultimaBarra + 1);
                            
                                echo "<td>" . $nombreArchivo . "</td>";
                            ?>
                            <td>
                                <center>
                                    <input class = 'modificar' type = 'submit' value = 'Modificar' name = 'modificarUser<?php echo $contadorV ?>'>
                                    <input class = 'borrar' type = 'submit' value = 'Borrar' name = 'borrarUser<?php echo $contadorV ?>'>
                                </center>
                            </td>
                        <?php
                            $contadorV = $contadorV + 1;
                        }

                        for($i = 0; $i < $contadorV; $i++)
                        {
                            if(isset($_POST['modificarUser' . $i]))
                            {
                                $nombre = $_POST['nombre'.$i];
                                $rol = $_POST['rol'.$i];
                                usuarioRepository::updateNombre($usuariosValidados[$i], $nombre); 
                                usuarioRepository::updateRol($usuariosValidados[$i], $rol); 

                                // header("Location: ?menu=validar");
                                // exit;
                            }

                            if(isset($_POST['borrarUser' . $i]))
                            {
                                usuarioRepository::deleteObject($usuariosValidados[$i]);
                                // header("Location: ?menu=validar");
                                // exit;
                            }
                        }
                    }
                    else
                    {
                        header("Location: ?menu=login");
                        exit;
                    }
                }
            ?>

                    </tbody>
                </table>
                <br>
                <input id = 'añadirVa' type = "submit" value = "Añadir" name = 'añadirVa'>

            </div>

        </div>
        <input id = 'volverAd' type = "submit" value = "Volver" name = 'volverAd'>
    </form>
</main>