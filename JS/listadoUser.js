// import Usuario from '../JS/Usuario.js';

function Usuario(id, nombre, contrasenia, rol, urlFoto)
{
    this.id = id;
    this.nombre = nombre;
    this.contrasenia = contrasenia;
    this.rol = rol;
    this.urlFoto = urlFoto;
}

//Consiste en cambiar el color del coche
Usuario.prototype.setId = function(nuevoId)
{
//Pinta el coche de un color dado
return this.id = nuevoId;
}

//Consiste en cambiar el color del coche
Usuario.prototype.setNombre = function(nuevoNombre)
{
   //Pinta el coche de un color dado
   return this.color = nuevoNombre;
}

//Consiste en cambiar el color del coche
Usuario.prototype.setContrasenia = function(nuevaContrasenia)
{
   //Pinta el coche de un color dado
   return this.contrasenia = nuevaContrasenia;
}

//Consiste en cambiar el color del coche
Usuario.prototype.setRol = function(nuevaRol)
{
    //Pinta el coche de un color dado
    return this.rol = nuevaRol;
}

window.addEventListener("load", function ()
{
    //Obtiene las variables necesarias que van a intervenir
    var cuerpo = document.getElementById("cuerpoTab");

    //Variables para ordenar
    var ordNombre = document.getElementById("ordNombre");
    var ordRol = document.getElementById("ordRol");
    var ordUrl = document.getElementById("ordUrl");

    ordNombre.sentido = 1;
    ordRol.sentido = 1;
    ordUrl.sentido = 1;

    const usuarios = [];
    const btnsEditar = [];
    const btnsEliminar = [];

    fetch("API/usuarioApi.php")
        .then(x => x.json()) //Trae la información en JSON
        .then(y => 
            {
                //Crea un for para manejar cada usuario como propio
                for(let i = 0; i < y.length; i++)
                {
                    var usuario = new Usuario(y[i].id, y[i].nombre, y[i].contrasenia, y[i].rol, y[i].urlFoto);
                    usuarios[i] = usuario;
                }

                cuerpo.innerHTML = muestra(usuarios);
                for(let i = 0; i < y.length; i++)
                {
                    btnsEditar[i] = document.getElementsByClassName("editar")[i];
                    btnsEliminar[i] = document.getElementsByClassName("eliminar")[i];
                }
                
            })


    //Función que muestra en el HTML los elementos necesarios
    function muestra(usuarios)
    {
        return usuarios.reduce(function(total, value, index, arr)
                            {
                                return total + "<tr><td>" + value.nombre + "</td>" +
                                            "<td>" + value.rol + "</td>" +
                                            "<td>" + value.urlFoto + "</td>" +
                                            "<td><button class = 'editar'>Editar</button><button class = 'eliminar'>Eliminar</button></td></tr>";
                            }, "")
    }

    //Función que ordena por un valor y en sentido
    function ordenarPor(valor, sentido)
    {
        return function(a, b)
            {
                    return a[valor].localeCompare(b[valor]) * sentido;
            }
    }
})