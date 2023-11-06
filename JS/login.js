window.addEventListener("load", function()
{
    var mostrarCon = document.getElementById("mostrarContrasenia");
    var contadorClics = 1;

    mostrarCon.onclick = function(ev)
    {
        ev.preventDefault();
        contadorClics++;
        if(contadorClics%2 == 0)
        {
            mostrarContrasenia();
        }
        else
        {
            ocultarContrasenia();
        }
    }

    function mostrarContrasenia()
    {
        var contr = document.getElementsByName("contrasenia")[0];
        contr.type = "text";
    }

    function ocultarContrasenia()
    {
        var contr = document.getElementsByName("contrasenia")[0];
        contr.type = "password";
    }
})