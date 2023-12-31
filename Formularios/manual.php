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

<main id = "genExaMan">
    <script src = "JS/examenManual.js"></script>
    <form id = "generarExa" enctype = "multipart/form-data" action = "?menu=manual" method = "POST">
        <h1>Manual</h1>
        <div id = "global">
            <label>Profesor: <label id = "nombreProf"><?php echo $nombre;?></label></label> <br>
            <div id = "titulos">
                <h2>Todas Las Preguntas</h2> 
                <h2>Preguntas Seleccionadas</h2>
            </div>

            <div id = "tablas">
                <table id = "tabPreg">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ENUNCIADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>

                    <tbody id = "cuerpoTabEx">

                    </tbody>
                </table>
                
                <table id = "tabSel">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>ENUNCIADO</th>
                        </tr>
                    </thead>

                    <tbody id = "cuerpoTabSel">

                    </tbody>
                </table>
            </div>
            
            

            <!-- Botón de enviar -->
            <input id = "agregarPre" type = "submit" value = "Agregar"  name = "agregarPre">
            <input id = "volver" type = "submit" value = "Volver" name = "volver"><br>
        </div>
    </form>

</main>
<?php
            
        }
    }
?>