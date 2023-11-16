<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

    if(Login::estaLogueado('user') )
    {
        $usuario = Sesion::leerSesion('user');
        $nombre = $usuario->getNombre();
        $rol = $usuario->getRol();

        if($rol == 'administrador' || $rol == 'profesor')
        {
            if($rol == 'administrador')
            {
                if(isset($_POST['volver']))
                {
                    header("Location: ?menu=admin");
                    exit;
                }
            }

            if($rol == 'profesor')
            {
                if(isset($_POST['volver']))
                {
                    header("Location: ?menu=profesor");
                    exit;
                }
            }
            
?>

<main id = "genExaDif">
    <script src = "JS/examenDificultad.js"></script>
    <form id = "generarExaDif" enctype = "multipart/form-data" action = "?menu=porDificultad" method = "POST">
        <h1>Por Dificultad</h1>
        <div id = "completo">
            <label>Profesor: <label id = "nombreProf"><?php echo $nombre;?></label></label>
            <div>
                <label>Dificultad:</label> 
                <?php
                    
                    $dificultades = dificultadRepository::findAll();

                    // Imprime el inicio del elemento <select>
                    echo '<select id = "dificultadSel">';
                    
                    // Genera las opciones del select utilizando un bucle
                    foreach ($dificultades as $dificultad) 
                    {
                        echo '<option value = "' . $dificultad->getId() . '">' . $dificultad->getNombre() . '</option>';
                    }

                    //Imprime el final del elemento <select>
                    echo "</select><br><br>";
                ?>
            </div> <br>
        </div>

            <!-- Botón de enviar -->
            <input id = "agregarPre" type = "submit" value = "Agregar"  name = "agregarPre">
            <input id = "volver" type = "submit" value = "Volver" name = "volver"><br>
    </form>

</main>
<?php
            
        }
    }
?>