<!DOCTYPE html>
<html lang = "es">

<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>CAMINO AL VOLANTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/ProyectoAutoescuela/CSS/login.css">
    <link rel="stylesheet" type="text/css" href="/ProyectoAutoescuela/CSS/registro.css">
    <link rel="stylesheet" type="text/css" href="/ProyectoAutoescuela/CSS/nav.css">
</head>

<body>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Principal/header.php';
    ?>
    <section>
        <div id="cuerpo">
            <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Principal/enrutador.php';
            ?>
        </div>
    </section>

    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProyectoAutoescuela/Principal/footer.php';
    ?>
 
</body>

</html>