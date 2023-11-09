<main id = "listadoUser">
    <script src = "JS/listadoUser.js"></script>
    <form action = "?menu=intentoMan" method = "POST">
        <h1>Mantenimiento Usuarios</h1>

        <table>
            <thead>
                <tr>
                    <th id = "ordFecha">Fecha</th>
                    <th id = "ordJSON">JSON Intento</th>
                    <th id = "ordUsuario">Usuario</th>
                    <th id = "ordExamen">Examen</th>
                    <th id = "accion">ACCION</th>
                </tr>
            </thead>

            <tbody id = "cuerpoTab">

            </tbody>
        </table> <br>
        <input class = "agregar" type = "submit" value = "Agregar">
    </form>
</main>