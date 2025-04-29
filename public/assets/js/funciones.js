/* ================================================================
 | Autor   : Constanza Zapata, Julio Cesar Gonzalez, Mauricio Saez |
 | Fecha   : 07/04/2025                                            |
 | Versión : 1.5                                                   |
 | Semana  : Semana 4                                             |
 ================================================================== */


 /*Funcion para contar articulos o se puede reutilizar tambien para secciones ya que cuenta por etiquetas(tags*/

 /* DEJE COMENTADA LA ANTIGUA FUNCION DE CONTAR ARTICULOS  PORQUE ANTES SE HACIA CON LA ETIQUETA ARTICLE PERO AHORA COMO USA BOOTSTRAP CUENTA CARDS 
 function contarArticulos() {
  const contador = document.querySelectorAll('article').length;/*Busca todos las etiquetas "article" y da la cantidad  */
 // const CantidadArticulos = document.querySelector('#CantidadArticulos');
  //console.log('Cantidad de <article>:', contador);/*lo imprimo en consola para corroborar*/
 /* CantidadArticulos.textContent = "Cantidad de Artículos: " + contador;

  //agrego los estilos aca  
  CantidadArticulos.style.color = "#333"; // Texto más sobrio
  CantidadArticulos.style.backgroundColor = "#f0f4f8"; // Fondo claro
  CantidadArticulos.style.padding = "8px 16px";
  CantidadArticulos.style.borderRadius = "12px";
  CantidadArticulos.style.fontWeight = "bold";
  CantidadArticulos.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
  CantidadArticulos.style.display = "inline-block";
  CantidadArticulos.style.fontSize = "20px";

  return contador;
}*/
function contarArticulos() {
  // IDs de secciones válidas donde hay tarjetas .card   tuvimos que crear el array porque  o contaba todo los card  o se hacia engorroso 
  const secciones = ['generales', 'deporte', 'emprendimiento', 'multimedia'];

  let total = 0;
// asi que hacemos un foreach para recorrer todos los  id   y si tiene .card la seccion cuenta el total
  secciones.forEach(id => {
    const seccion = document.querySelector(`#${id} .row`);
    if (seccion) {
      const tarjetas = seccion.querySelectorAll('.card');
      total += tarjetas.length;
    }
  });

  // Mostrar resultado en consola
  console.log('Total de artículos en secciones:', total);

  // Mostrar visualmente en #CantidadArticulos (si existe)
  const CantidadArticulos = document.querySelector('#CantidadArticulos');
  if (CantidadArticulos) {
    CantidadArticulos.textContent = "Cantidad total de Artículos: " + total;

    // Estilos visuales
    CantidadArticulos.style.textAlign = "center";
    CantidadArticulos.style.color = "#333";
    CantidadArticulos.style.backgroundColor = "#f0f4f8";
    CantidadArticulos.style.padding = "8px 16px";
    CantidadArticulos.style.borderRadius = "12px";
    CantidadArticulos.style.fontWeight = "bold";
    CantidadArticulos.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.1)";
    CantidadArticulos.style.display = "inline-block";
    CantidadArticulos.style.fontSize = "20px";
  }

  return total;
}



// Llamar a la función para que se ejecute
contarArticulos();



/*ACA funcion reloj realtime*/ 
let horaOficialChile = null;
let yaAlerto = false; // evita mostrar el alert múltiples veces

// Reloj local
function mueveReloj(){
    const momentoActual = new Date();  /*obtengo fecha actual pero como es local del browser no es tan efectivo*/ 
    const hora = momentoActual.getHours().toString().padStart(2, "0");
    const minuto = momentoActual.getMinutes().toString().padStart(2, "0");
    const segundo = momentoActual.getSeconds().toString().padStart(2, "0");

    const horaImprimible = `${hora} : ${minuto} : ${segundo}`;
    document.form_reloj.reloj.value = horaImprimible;

    // Comparar si ya tenemos la hora oficial cargada
    if (horaOficialChile) {
        compararHoras(momentoActual);/*llamo a la funcion de comparar y le paso por parametros la hora que obtuve  desde local*/
    }

    setTimeout(mueveReloj, 1000);
}

// Obtener hora oficial de Chile
fetch("https://timeapi.io/api/Time/current/zone?timeZone=America/Santiago") /*pregunto a la Url*/ 
  .then(response => response.json()) /*obtengo la respuesta en json*/ 
  .then(data => {
    console.log("Hora oficial de Chile:", data.dateTime); /*imprimo por consola para debugear*/ 
    horaOficialChile = new Date(data.dateTime);
  })
  .catch(error => {
    console.error("Error al obtener la hora:", error);/*si no recibo respuesta manda error*/ 
  });

// Comparar hora local con hora oficial paso el parametro horaLocal 
function compararHoras(horaLocal) {
    if (!horaOficialChile || yaAlerto) return;

    const diferenciaEnMs = Math.abs(horaLocal.getTime() - horaOficialChile.getTime());
    const diferenciaEnMinutos = diferenciaEnMs / 60000;/*convierto esa diferencia para probar y forzarlo a que muestre en pantalla el mensaje si existe una diferencia*/

    if (diferenciaEnMinutos > 1) {
        alert("⚠️ La hora de tu PC no coincide con la hora oficial de Chile.");  /*Agrego un alert en pantalla para que el usuario vea si esta a la hora */
        yaAlerto = true;
    }
}



//funcion para utiliza el verdadero reloj 
Number.prototype.pad = function(n) {
  for (var r = this.toString(); r.length < n; r = 0 + r);
  return r;
};

function updateClock() {
  var now = new Date();
  var milli = now.getMilliseconds(), // se puede obtener desde los milisegundos en adeltante
    sec = now.getSeconds(),
    min = now.getMinutes(),
    hou = now.getHours(),
    mo = now.getMonth(),
    dy = now.getDate(),
    yr = now.getFullYear();
  //var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  // converti en español porque viene en ingles 
  var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  var tags = ["mon", "d", "y", "h", "m", "s", "mi"],
  
  //var tags = ["lun", "d", "a", "h", "m", "s", "ms"],// asumí que "y" es "year" (año), "mi" es "milisegundos"
  // utilizo el array para armar los datos 
    corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];
    // reccorro el array 
  for (var i = 0; i < tags.length; i++)
    document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
}
// aca inicializo y voy llamando a la funcion update cada cierto rato 
function initClock() {
  updateClock();
  window.setInterval("updateClock()", 1);

}

//fin de la funcion 

//NUEVA FUNCION PARA AGREGAR ARTICULOS 
function agregarArticulos() {
  const titulo = document.getElementById("titulo-articulo").value;
  const descripcion = document.getElementById("descripcion-articulo").value;
  const categoria = document.getElementById("categoria-articulo").value;

  if (titulo && descripcion && categoria) {
    const nuevoArticulo = document.createElement("div");
    nuevoArticulo.classList.add("col");

    nuevoArticulo.innerHTML = `
      <div class="card h-100 shadow-sm">
        <img src="img/emprendimiento3.jpg" class="card-img-top" alt="${titulo}">
        <div class="card-body">
          <h5 class="card-title">${titulo}</h5>
          <p class="text-muted mb-1"><strong>Categoría:</strong> ${categoria}</p>
          <p class="card-text">${descripcion}</p>
          <p class="text-end"><em>Periodista: PEPE</em></p>
        </div>
      </div>
    `;

    // Buscar dentro de la sección específica el div.row
    const contenedor = document.querySelector(`#${categoria} .row`);
    contenedor.appendChild(nuevoArticulo);

    // Alerta de éxito
    const alerta = document.createElement("div");
    alerta.className = "alert alert-success mt-3";
    alerta.setAttribute("role", "alert");
    alerta.innerText = "¡Artículo agregado exitosamente! TOTAL ARTICULOS: " + contarArticulos();
    document.getElementById("alert-container").appendChild(alerta);
 
    setTimeout(() => {
      alerta.remove();
    }, 3000);
  } else {
    alert("Por favor, complete todos los campos.");
  }
}



//COMENTO LA ANTIGUA FUNCION PARA AGREGAR ARTICULOS//
/*function agregarArticulos() {
  const titulo = document.getElementById("titulo-articulo").value;
  const descripcion = document.getElementById("descripcion-articulo").value;
  const categoria = document.getElementById("categoria-articulo").value;

  if (titulo && descripcion && categoria) {
    const nuevoArticulo = document.createElement("article");
    nuevoArticulo.classList.add("post");
    nuevoArticulo.innerHTML = `
      <div>
        <img src="img/emprendimiento3.jpg" alt="paisaje">
      </div>
      <h3>${titulo}</h3>
      <p>Categoria: <b>${categoria}</b></p>
      <p>${descripcion}</p>
      <p>Periodista: PEPE</p>
    `;
    document.querySelector(`#${categoria} .contenedor-articulos`).appendChild(nuevoArticulo);
    /*document.getElementById(categoria).appendChild(nuevoArticulo);*/
    
/*en este punto me parecio interesante agregar alguna alerta para avisarle al usuario que se agrego el articulo de manera existosa https://getbootstrap.com/docs/5.0/components/alerts/*/ 
    // Mostrar alerta de éxito
 /*   const alerta = document.createElement("div");
    alerta.className = "alert alert-success";
    alerta.setAttribute("role", "alert");
    alerta.innerText = "¡Artículo agregado exitosamente! TOTAL ARTICULOS: " + contarArticulos();
    document.getElementById("alert-container").appendChild(alerta);/*en este punto alert-container esta en header del html para mostrar la notificacion */

    // Ocultar luego de 5 segundos asi se alcanza a ver
/*    setTimeout(() => {
      alerta.remove();
    }, 3000);
  } else {
    alert("Favor de completar los campos necesarios");
  }
}*/

/*FUNCION PARA CAPTURAR FORMULARIOS DE CONTACTO*/
function enviarContacto() {
  const nombre = document.getElementById("nombre-contacto").value;
  const correo = document.getElementById("correo-contacto").value;
  const asunto = document.getElementById("asunto-contacto").value;
  const mensaje = document.getElementById("mensaje-contacto").value;

  // Mostrar en consola los datos capturados
  console.log("Formulario enviado:", { nombre, correo, asunto, mensaje });

  // Cerrar el modal
  const modal = bootstrap.Modal.getInstance(document.getElementById('modalContacto'));
  modal.hide();

  // Mostrar alerta nativa
  alert("¡Su mensaje se ha enviado con éxito!");
}


/*Esto lo copie de stackoverflow para subir mientras se realiza scroll*/

const btnGeneral = document.getElementById("btnGeneral");

window.onscroll = function () {
  if (window.scrollY > 300) {
    btnGeneral.style.display = "block";
  } else {
    btnGeneral.style.display = "none";
  }
};





