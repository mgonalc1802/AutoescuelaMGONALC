<main>
    <h1>Visualizar</h1>

    <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/ProyectoAutoescuela/Helper/autocargador.php';

        $preguntas = preguntaRepository::findByDificultad(2);

        foreach ($preguntas as $pregunta) 
        {
            echo $pregunta->getEnunciado() . '<br><br>';
        }
    ?>
</main>