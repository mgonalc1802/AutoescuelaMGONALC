<main id = "validarFor">
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';
        if(Login::estaLogueado('user') )
        { 
            $user = Sesion::leerSesion('user');
            $rol = $user->getRol();

            if($rol == "administrador")
            {    $contadorBtn = 0;
                $contador = 1;
                $usuarios = uservalidRepository::findAll();

            
            
        
        
    ?>
    <form action = "?menu=validar" method = "POST">
        <h1>Gestión De Usuarios</h1>

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
                                echo "<td>" . $usuario->getRol() ."</td>";
                                echo "<td>
                                        <input class = 'validarUser' type = 'submit' value = 'Validar' name = 'validarUser" . $contador ."'>
                                        <input class = 'denegarUser' type = 'submit' value = 'Denegar' name = 'denegarUser" . $contador ."'>
                                    </td>";
                                $contador = $contador+ 1;
                            }

                            for($i = 0; $i < $contador; $i++)
                            {
                                if(isset($_POST['validarUser' . $i]))
                                {
                                    $user = uservalidRepository::findById(13);
                                    echo $user;
                                    // usuarioRepository::insert($user);
                                    // uservalidRepository::deleteObject($user);
                                    echo "<h2>Validado con éxito.</h2>";
                                }

                                if(isset($_POST['denegarUser' . $i]))
                                {
                                    $user = uservalidRepository::findById();
                                    uservalidRepository::deleteObject($user);

                                    echo "adios";
                                }
                            }
                        }
                    }
                    else
                    {
                        header("Location: ?menu=login");
                        exit;
                    }
                ?>

            </tbody>
        </table>
    </form>
</main>