<main id = "respoderPreg">
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
    <script src="JS/autoescuela.js"></script>
    <form action = "examen" id = "formRes">
        <div id = "examen">

        </div><br>

        <button id = "Enviar">Enviar Examen</button>
    </form>
    
</main>