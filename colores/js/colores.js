// Capturar el formulario
const formInsert = document.forms["formInsert"];

formInsert.addEventListener("submit", (e) => {
  e.preventDefault(); // Evitar el reenvío del formulario
  document.getElementById("errorUsuario").textContent = "";
  document.getElementById("errorColor").textContent = "";

  // Capturar los valores de los campos
  const color = formInsert["color"].value.trim();
  const usuario = formInsert["usuario"].value.trim();
  const web = formInsert["web"].value;
  const sessionToken = formInsert["sessionToken"].value;
  //COMO FUNCIONA POR JAVASCRIPT, HEMOS DE AÑADIR idUsuario PARA QUE LO CAPTURE
  const idUsuario = formInsert["idUsuario"].value;

  // Validar los campos
  if (usuario === "" && color === "") {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    document.getElementById("errorColor").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  if (usuario === "") {
    document.getElementById("errorUsuario").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  if (color === "") {
    document.getElementById("errorColor").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  // Esta expresion valida caracteres de la a-z, de la A-Z, todos los descritos y espacio '\s'.
  // Con el '+' al final, indicamos que los carácteres pueden estar 0 o más veces
const regex = /[a-zA-ZÇáéíóúàèìòùÁÉÍÓÚÀÈÌÒÙñç\s]+/;
// Esta expresión valida caracteres no alfanuméricos y números
const regex1 = /\W+/;
// Esta expresión valida números
const regex2 = /\d+/;

  // Validamos que si se cumple alguna de las regex en alguno de los insert, nos muestre error en los dos campos
//   if ((regex1.test(usuario) || regex2.test(usuario)) && (regex1.test(color) || regex2.test(color))) {
//     document.getElementById("errorUsuario").textContent =
//       "Hay que poner un texto válido";
//     document.getElementById("errorColor").textContent =
//       "Hay que poner un texto válido";
//     return;
//   }
//   if (regex1.test(usuario) || regex2.test(usuario)) {
//     document.getElementById("errorUsuario").textContent =
//       "Hay que poner un texto válido";
//     return;
//   }
//   if (regex1.test(color) || regex2.test(color)) {
//     document.getElementById("errorColor").textContent =
//       "Hay que poner un texto válido";
//     return;
//   }
if ((regex1.test(usuario) || regex2.test(usuario)) && (!regex.test(usuario))) {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    return;
  }
  if ((regex1.test(color) || regex2.test(color))&& (!regex.test(color)) ) {
    document.getElementById("errorColor").textContent =
      "Hay que poner un texto válido";
    return;
  }

  if (web != "") {
    alert("Bot detectado");
    return;
  }

// PARA COMPROBACION DE RECEPCION E INSERCION DE DATOS 

// Se crea una constante que recoja los parametros de la página 
const datos = new URLSearchParams()
datos.append("color", color);
datos.append("usuario", usuario);
datos.append("sessionToken", sessionToken);
datos.append("web", web);
// Se añade el idUsuario a los datos para que lo recoja el servidor
datos.append("idUsuario", idUsuario);

// Se envian los datos al servidor
// Se crea una constante que recoja los parametros de la página
fetch ("insert.php", {
    // Se indica la dirección del servidor
    // Se indica el método de envío
    method: "POST",
    // Se indica el cuerpo de la petición pasado a string
    body: datos.toString(),
    // Se indica el tipo de contenido, en este caso, se envía como formulario HTML
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
})
.then((response) => response.text())
.then((data) => {
    // console.log(data);
    location.reload();
})
.catch((error) => {
    console.log(error);
    console.error("Error:", error);
});

//   alert("Hoy es viernes");


});

// Cerrar sesion por inactividad
// Declarar variable para el tiempo que se considera hasta inactividad
const tiempoInactividad = 300000; // 5 minutos (se mide en milisegundos - 60000 = 1 minuto)
// Declarar variable para el temporizador (con let)
let temporizador;
// Crear una funcion que redirija a la página de cierre de sesión, la cual lleva al index de nuevo.
function redirigir(){
  window.location.href = "../logout.php";
}
// Crear una función que reinicie el temporizador cuando haya actividad
function reiniciarTemporizador() {
  clearTimeout(temporizador); // Limpiar el temporizador anterior
  temporizador = setTimeout(redirigir, tiempoInactividad); // Reiniciar el temporizador
}

window.addEventListener("keydown", reiniciarTemporizador); // Reiniciar el temporizador al presionar una tecla
window.addEventListener("mousemove", reiniciarTemporizador); // Reiniciar el temporizador al mover el ratón
window.addEventListener("click", reiniciarTemporizador); // Reiniciar el temporizador al hacer clic
window.addEventListener("scroll", reiniciarTemporizador); // Reiniciar el temporizador al desplazar la página
// PARA PANTALLAS TACTILES:
window.addEventListener("touchstart", reiniciarTemporizador); // Reiniciar al tocar la pantalla (táctil)
window.addEventListener("touchmove", reiniciarTemporizador); // Reiniciar al mover el dedo (táctil)


reiniciarTemporizador(); // Iniciar el temporizador al cargar la página



