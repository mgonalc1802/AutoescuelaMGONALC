window.addEventListener("load", function()
{
    var divExamen = document.getElementById("examen");
    var preguns = new Array();

    fetch("Plantillas/preguntas.html")
        .then(x => x.text())
        .then(y => 
            {
                var contenedor = document.createElement("div");
                contenedor.innerHTML = y;
                var pregunta = contenedor.firstChild;
                fetch("JSON/preguntas.json")
                    .then(x => x.json())
                    .then(y =>
                        {
                            for(let i = 0; i < y.length; i++)
                            {
                                var pregAux = pregunta.cloneNode(true);
                                pregAux.getElementsByClassName("id")[0].innerHTML = y[i].id;
                                pregAux.getElementsByClassName("enunciado")[0].innerHTML = y[i].enunciado;
                                pregAux.getElementsByClassName("respuesta1")[0].innerHTML = y[i].respuesta1;
                                pregAux.getElementsByClassName("respuesta2")[0].innerHTML = y[i].respuesta2;
                                pregAux.getElementsByClassName("respuesta3")[0].innerHTML = y[i].respuesta3;

                                var respuestas = pregAux.getElementsByClassName("resp");
                                for(let j = 0; j < respuestas.length; j++)
                                {
                                    respuestas[j].name += i;
                                }

                                var recurso; 
                                if(y[i].tipoURL == "foto")
                                {
                                    recurso = document.createElement("img");
                                }
                                else if(y[i].tipoURL == "video")
                                {
                                    recurso = document.createElement("video");
                                }

                                recurso.src = y[i].url;

                                pregAux.getElementsByClassName("recurso")[0].appendChild(recurso);
                                pregAux.getElementsByClassName("idCategoria")[0].innerHTML = y[i].idCategoria;
                                pregAux.getElementsByClassName("idDificultad")[0].innerHTML = y[i].idDificultad;

                                pregAux.getElementsByClassName("borrar")[0].onclick = function(ev)
                                {
                                    ev.preventDefault();
                                    var auxPadre = this;
                                    while (!auxPadre.classList.contains("pregunta")) 
                                    {
                                        auxPadre = auxPadre.parentNode; 
                                    }

                                    var respuestasMar = auxPadre.getElementsByClassName("resp");
                                    for(let i = 0; i < respuestasMar.length; i++)
                                    {
                                        respuestasMar[i].checked = false;
                                    }
                                }
                                divExamen.appendChild(pregAux);

                                //Guarda un array de preguntas
                                preguns[i] = pregAux;
                            }
                            preguns[0].style.display = "";
                            preguns[1].style.display = "none";
                            preguns[2].style.display = "none";

                        })
            })
})