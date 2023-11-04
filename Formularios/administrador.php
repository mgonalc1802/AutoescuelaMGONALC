<main>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        if(Login::estaLogueado('user'))
        {
            echo "Estas logueadooo";
        }
        else
        {
            header("Location: ?menu=login");
            exit;
        }
    ?>
    <h1>Hola Administrador</h1>
</main>