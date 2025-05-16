
// PRIMERO VAMOS A DEFINIR UNA VARIABLE GLOBAL QUE CONTENDRÁ EL IDIOMA POR DEFECTO DEL NAVEGADOR O EN SU DEFECTO EL IDIOMA ESPAÑOL
var idioma = navigator.language || navigator.userLanguage || "es"; 



// OBTENER EL FORMULARIO
const formIdioma = document.forms["form-idioma"];


// CREAR EL LISTENER
formIdioma.addEventListener("change", () => {
    // OBTENER EL IDIOMA SELECCIONADO
    idioma = formIdioma["select-idioma"].value;
    // CAMBIAR EL IDIOMA
    cambiarIdioma(idioma);
    // MOSTRAR EN CONSOLA EL IDIOMA SELECCIONADO
    console.log(jsonIdiomas[idioma]['title']);
});

function cambiarIdioma(idioma) {
    jsonIdiomas = ""
    fetch ("data/idiomas.json")
    // CON .then SE OBTIENE LA RESPUESTA, LA TRANSFORMA EN JSON Y SE MANDA A LA CONSOLA
    .then(respuesta => respuesta.json())
    .then(data => {
        jsonIdiomas = data;
        document.querySelector("h1").textContent = jsonIdiomas[idioma]['title'];
        document.querySelector("html[lang]").setAttribute("lang", idioma); 

    })
    .catch(error => {
    alert("error en la petición");
    console.error("Error:", error);
});

}

