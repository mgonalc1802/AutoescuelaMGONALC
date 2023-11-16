//Crea el objeto pregunta
function Pregunta(id, enunciado, respuesta1, respuesta2, respuesta3, tipoURL, url, idDificultad, idCategoria)
{
    this.id = id;
    this.enunciado = enunciado;
    this.respuesta1 = respuesta1;
    this.respuesta2 = respuesta2;
    this.respuesta3 = respuesta3;
    this.tipoURL = tipoURL;
    this.url = url;
    this.idDificultad = idDificultad;
    this.idCategoria = idCategoria;
}

//Inicializa unas variables que serán contadores para manejar distintos bucles
var contador = -1;
var contadorSel = -1;
var contBoton = -1;

//Cuando se recargue la página
window.addEventListener("load", function()
{
    //Variable para guardar las preguntas
    const preguntas = [];
    //Genera la fecha actual para indicar cuando se creo los examenes.
    var f = new Date();
    var fechaActual = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate() + " " + f.getHours() + ":" + f.getMinutes() + ":" + f.getSeconds();

    //Variable de un boton
    var botonAgregar = document.getElementById("agregarPre");

    //Indica la acción del boton
    botonAgregar.onclick = function(ev)
    {
        //Detiene el submit que hace por defecto
        ev.preventDefault();

        //Obtenemos el valor de la dificultad deseada
        var datos = document.getElementById("dificultadSel").value;

        //AJAX que obtiene las preguntas de la API
        fetch("API/preguntaApi.php", 
        {
            method: "POST", //Indica el método
            body: JSON.stringify(datos), //Pasa a JSON el código JS de los datos anteriores
            headers: {"Content-Type": "application/json"} //Indica como llega
        })
            .then(x => x.json()) //Llega en JSON
            .catch((error) => console.error("Error:", error)) //En caso de que haya error
            .then(y =>
                {
                    //Crea un for para manejar cada pregunta como propio
                    for(let i = 0; i < y.length; i++)
                    {
                        //Crea la pregunta
                        var pregunta = new Pregunta(y[i].id, y[i].enunciado, y[i].respuesta1, y[i].respuesta2, y[i].respuesta3, y[i].tipoURL, y[i].url, y[i].idDificultad, y[i].idCategoria);
                        //Guarda en un array todas las preguntas.
                        preguntas[i] = pregunta;
                    }

                    //Obtenemos el nombre de usuario que está generando el examen
                    user = document.getElementById("nombreProf").textContent;

                    //AJAX que obtiene el usuario
                    fetch("API/usuarioApi.php", 
                    {
                        method: "POST",  //Indica el método
                        body: JSON.stringify(user), //Pasa a JSON el código JS de usuario.
                        headers: {"Content-Type": "application/json"} //Indica como llega
                    })
                        .then(x => x.json()) //Llega en json
                        .catch((error) => console.error("Error:", error)) //En caso de que haya error
                        .then(y =>
                            {
                                //Creación de datos para enviar a otra API
                                datos = {fechaCreacion: fechaActual, idProfesor: y};

                                //AJAX que añade examenes
                                fetch("API/examenApi.php", 
                                    {
                                        method: "POST", //Indica el método
                                        body: JSON.stringify(datos), //Pasa a JSON el código JS de los datos anteriores
                                        headers: {"Content-Type": "application/json"} //Indica como llega
                                    })
                                        .then(x => x.json()) //Llega en JSON
                                        .catch((error) => console.error("Error:", error)) //En caso de que haya error
                                        .then(y => 
                                            {
                                                //Variable que obtendrá la ID de las preguntas seleccionadas
                                                var idSeleccionada;

                                                //Bucle foreach que recorre las preguntas y las añade a la BDD
                                                preguntas.forEach(pregunta => 
                                                {
                                                    //Guarda la ID de las preguntas seleccionadas
                                                    idSeleccionada = pregunta.id;

                                                    //Creación de datos para enviar a otra API
                                                    datosPre = {idExamen: y.id, idPregunta: idSeleccionada};

                                                    //AJAX para añadir las preguntas a cada examen
                                                    fetch("API/exaTiePreApi.php", 
                                                    {
                                                        method: "POST", //Indica el método
                                                        body: JSON.stringify(datosPre), //Pasa a JSON el código JS de los datosPre
                                                        headers: {"Content-Type": "application/json"} //Indica como llega
                                                    })
                                                        .then((res) => res.json()) //Llega en JSON
                                                        .catch((error) => console.error("Error:", error)) //En caso de error
                                                        .then((response) => console.log("Success:", response));
                                                });                 
                                            })
                            }); 
                })
        
         
    }
})

function muestra(preguntas)
{
    return preguntas.reduce(function(total, value, index, arr)
        {
            contador++;
            return total + "<tr><td>" + value.id + "</td>" +
            "<td>" + value.enunciado + "</td>" +
            "<td><button class = 'selec'>Seleccionar</button></td></tr>";
        }, "")
}

function muestraSel(preguntasSelec)
{
    return preguntasSelec.reduce(function(total, value, index, arr)
        {
            contadorSel++;
            return total + "<td>" + value.id + "</td>" +
            "<td>" + value.enunciado + "</td></tr>";
        }, "")
}
