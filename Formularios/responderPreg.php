<main id = "respoderPreg">
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        if(Login::estaLogueado('user') == 0)
        {
            header("Location: ?menu=login");
            exit;
        }
    ?>
    <script src="JS/mostrarExamen.js"></script>
    <form action = "examen" id = "formRes" method = "POST">
        <div id = "examen">

        </div>

        <button id = "Enviar">Enviar Examen</button>
    </form>
    
</main>