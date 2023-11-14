window.addEventListener("load", function()
{
    //Inicializa las variables necesarias
    var divExamen = document.getElementById("examen"); //Coge el elemento cuya ID en html es "examen"
    var preguns = []; //Crea un array
    var contador = 0; 


    //Realizamos el AJAX
    fetch("Plantillas/preguntas.html")
        .then(x => x.text())
        .then(y => {
                //Crea el contenedor a introducir los datos obtenidos
                var contenedor = document.createElement("div");

                //Muestra los datos
                contenedor.innerHTML = y;

                //Crea un contenedor como primer hijo del ya creado
                var pregunta = contenedor.firstChild;

                //Realizamos el AJAX
                // var cuerpo = new FormData();
                // cuerpo.append('clave', $clave);
                fetch("API/preguntaApi.php",{method: "GET"}) 
                    .then(x => x.json()) //Lo trae en JSON
                    .then(y =>
                        {
                            //Creamos un for para manejar cada pregunta como propia
                            for(let i = 0; i < y.length; i++)
                            {
                                //Crea la preguntas
                                var pregAux = pregunta.cloneNode(true);
                                pregAux.getElementsByClassName("id")[0].innerHTML = y[i].id;
                                pregAux.getElementsByClassName("enunciado")[0].innerHTML = y[i].enunciado;
                                pregAux.getElementsByClassName("respuesta1")[0].innerHTML = y[i].respuesta1;
                                pregAux.getElementsByClassName("respuesta2")[0].innerHTML = y[i].respuesta2;
                                pregAux.getElementsByClassName("respuesta3")[0].innerHTML = y[i].respuesta3;

                                console.log("hola");
                                //Crea las respuestas
                                var respuestas = pregAux.getElementsByClassName("resp");
                                
                                //Les añade distinto nombre para que en los radio, no se mezclen con otras preguntas
                                for(let j = 0; j < respuestas.length; j++)
                                {
                                    respuestas[j].name += i;
                                }

                                //Crea un recurso
                                var recurso; 

                                //Se encarga de identificar que tipo de recurso es
                                if(y[i].tipoURL == "foto")
                                {
                                    //Si es imagen crea un elemento imagen
                                    recurso = document.createElement("img");
                                    recurso.style.width = "200px";
                                    recurso.style.height = "200px";
                                }
                                else if(y[i].tipoURL == "video")
                                {
                                    //Si es vídeo, crea un elemento video
                                    recurso = document.createElement("video");
                                }

                                //Añade url al recurso
                                recurso.src = y[i].url;

                                //Lo añade a la pregunta
                                pregAux.getElementsByClassName("recurso")[0].appendChild(recurso);

                                //Resto de atributos
                                pregAux.getElementsByClassName("idCategoria")[0].innerHTML = y[i].idCategoria;
                                pregAux.getElementsByClassName("idDificultad")[0].innerHTML = y[i].idDificultad;

                                //Acción que realiza el botón borrar
                                pregAux.getElementsByClassName("borrar")[0].onclick = function(ev)
                                {
                                    //Detiene el submit que tiene por defecto
                                    ev.preventDefault();

                                    //Crea un auxiliar que será el padre
                                    var auxPadre = this;

                                    //Si no contiene el contedor pregunta
                                    while (!auxPadre.classList.contains("pregunta")) 
                                    {
                                        //Añade un nuevo nodo
                                        auxPadre = auxPadre.parentNode; 
                                    }

                                    //Encuentra las respuestas que pueden ser marcadas
                                    var respuestasMar = auxPadre.getElementsByClassName("resp");
                                    
                                    //Comprueba las respuestas
                                    for(let i = 0; i < respuestasMar.length; i++)
                                    {
                                        //Si están marcadas, se desactivan
                                        respuestasMar[i].checked = false;
                                    }
                                }

                                //Se añade al div
                                divExamen.appendChild(pregAux);

                                //Guarda un array de preguntas
                                preguns[i] = pregAux;

                                //Acción que realiza el botón siguiente
                                preguns[i].getElementsByClassName("siguiente")[0].onclick = function(ev)
                                {
                                    //Detiene el submit que tiene por defecto
                                    ev.preventDefault();
                                    //Llama al método que se encarga de avanzar la pregunta
                                    avanzarPregunta();
                                }

                                preguns[i].getElementsByClassName("anterior")[0].onclick = function(ev)
                                {
                                    //Detiene el submit que tiene por defecto
                                    ev.preventDefault();
                                    //Llama al método que se encarga de retroceder la pregunta
                                   retrocederPregunta();
                                }

                                //Llama al método encargado de mostrar la pregunta necesaria
                                mostrarPregunta(contador);                                
                            }

                        })
            })

    //Método que avanza las preguntas
    function avanzarPregunta() 
    {
        // cont= cont +1;
        //Comprueba que el contador sea menor que el array de preguntas
        if (contador < preguns.length - 1) 
        {
            //Si es asi, se incrementa el contador
            contador++;
            
            //Muestra la pregunta
            mostrarPregunta(contador);
        }
    }
    
    //Método que retrocede las preguntas
    function retrocederPregunta() 
    {
        // cont= cont -1;

        //Si el contador es mayor de 0
        if (contador > 0) 
        {
            //Desincrementa el contador
            contador--;

            //Y muestra la pregunta anterior
            mostrarPregunta(contador);
        }
    }

    //Método que muestra las preguntas
    function mostrarPregunta(cont) 
    {
        for (var i = 0; i < preguns.length; i++) 
        {
            if (i == cont) 
            {
                preguns[i].style.display = "block";
            } 
            else 
            {
                preguns[i].style.display = "none";
            }
        }
    }
})