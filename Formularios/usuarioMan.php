<main id = "listadoUser">
    <script src = "JS/listadoUser.js"></script>
    <form action = "?menu=validar" method = "POST">
        <h1>Mantenimiento Usuarios</h1>

        <table>
            <thead>
                <tr>
                    <th id = "ordNombre">NOMBRE</th>
                    <th id = "ordRol">ROL</th>
                    <th id = "ordUrl">URL</th>
                    <th id = "accion">ACCION</th>
                </tr>
            </thead>

            <tbody id = "cuerpoTab">

            </tbody>
        </table> <br>
        <input class = "agregar" type = "submit" value = "Agregar">
    </form>
</main>