<main id = "listadoUser">
    <script src = "JS/listadoUser.js"></script>
    <form action = "?menu=preguntaMan" method = "POST">
        <h1>Mantenimiento Usuarios</h1>

        <table>
            <thead>
                <tr>
                    <th id = "ordEnunciado">NOMBRE</th>
                    <th id = "ordRespuesta1">Respuesta 1</th>
                    <th id = "ordRespuesta2">Respuesta 2</th>
                    <th id = "ordRespuesta3">Respuesta 3</th>
                    <th id = "ordCorrecta">Correcta</th>
                    <th id = "tipoURL">Tipo URL</th>
                    <th id = "URL">URL</th>
                    <th id = "categoria">Categoria</th>
                    <th id = "dificultad">Dificultad</th>
                    <th id = "accion">ACCION</th>
                </tr>
            </thead>

            <tbody id = "cuerpoTab">

            </tbody>
        </table> <br>
        <input class = "agregar" type = "submit" value = "Agregar">
    </form>
</main>