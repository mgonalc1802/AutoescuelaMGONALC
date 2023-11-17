<main>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';
        if(Login::estaLogueado('user') )
        { 
            $user = Sesion::leerSesion('user');
            $rol = $user->getRol();

            // if($rol == "administrador" && $rol == "estudiante" && $rol == "profesor")
            // {    
                $contador = 0;
                $examenes = examenRepository::findAll();    
    ?>
    <form action = "?menu=realizar" method = "POST">
        <h1>EXÁMENES</h1>
        <table>
            <thead>
                <tr>
                    <th id = "id">ID</th>
                    <th id = "fecha">FECHA CREACIÓN</th>
                    <th id = "profesorT">PROFESOR</th>
                    <th id = "accion">ACCION</th>
                </tr>
            </thead>

            <tbody id = "cuerpoTab">
                <?php            
                    foreach($examenes as $examen) 
                    {
                        echo "<tr>
                                <td>" . $examen->getId() . "</td>
                                <td>" . $examen->getFechaCreacion() . "</td>
                                <td>" . $examen->getIdProfesor() . "</td>
                                <td>
                                    <center>
                                        <input class = 'realizarExa' type = 'submit' value = 'Realizar' name = 'realizarExa" . $contador ."'>
                                    </center>
                                </td>
                            </tr>";
                        $contador = $contador+ 1;
                    }

                    for($i = 0; $i < $contador; $i++)
                    {
                        // if(isset($_POST['realizarExa' . $i]))
                        // {
                        //     header("Location: ?menu=validar?idExamen = $examen->getId()");
                        //     exit;
                        // }
                    }
                ?>
            </tbody>
        </table>
        <br>
        <input id = 'volverAd' type = "submit" value = "Volver" name = 'volverAd'>
    </form>
    <?php
        if(isset($_POST['volverAd' . $i]))
        {
            header("Location: ?menu=alumno");
            exit;
        }
            // }
            // else
            // {
            //     header("Location: ?menu=login");
            //     exit;
            // }
        }
    ?>
</main>