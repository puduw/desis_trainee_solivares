document.addEventListener("DOMContentLoaded", function () {
  loadGrilla();
});
function getFiltro(arreglo) {
  let filtro = "";
  for (let i = 0; i < arreglo.length; i++) {
    const elemento = arreglo[i];
    filtro += "&" + elemento.id + "=" + elemento.value;
  }
  return filtro;
}

function limpiarCampos(arreglo) {
  for (let i = 0; i < arreglo.length; i++) {
    const elemento = arreglo[i];
    console.log(elemento.id);
    // Verificar si el nombre del campo contiene "idpersona"
    if (elemento.id && elemento.id.toLowerCase().includes("idpersona")) {
      elemento.value = "0";
    } else {
      elemento.value = "";
    }
  }
}
function validaciones() {
  const idpersona = document.getElementById("idpersona");
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const idprofesion = document.getElementById("idprofesion");
  const idcomuna = document.getElementById("idcomuna");
  const arreglo = [idpersona, nombre, apellido, idprofesion, idcomuna];
  insertUpdate(arreglo);
}
function insertUpdate(arreglo){
  filtro = getFiltro(arreglo)
  let xhr = new XMLHttpRequest();
  xhr.open("GET","command.php?cmd=personas"+filtro);
  xhr.send();
  xhr.onload = function(){
    if(xhr.status != 200){
      alert("Error "+ xhr.status + ":" + xhr.statusText);
    }else{
      const data = JSON.parse(xhr.response)[0];
      if(data.error){
        alert(data.error);
      }else{
        alert(data.resultado);
        limpiarCampos(arreglo);
        loadGrilla();

      }
    }
  };
  xhr.onerror = function(){
    alert("solicitud fallida");
  };
}

function getPersona(idpersona){
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const idprofesion = document.getElementById("idprofesion");
  const idcomuna = document.getElementById("idcomuna");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getOne&idpersona=" + idpersona);
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      if (data.lenght == 0) {
        alert("No existe");
        return;
      }
      nombre.value = data.nombre;
      apellido.value = data.apellido;
      idprofesion.value = data.idprofesion;
      idcomuna.value = data.idcomuna;
      document.getElementById("idpersona").value=idpersona;
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}

function loadGrilla() {
  const idtablebody = document.getElementById("idtable-body");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getAll");

  xhr.send();

  xhr.onload = function () {
    
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      idtablebody.innerHTML = "";
      let datosHtml = "";
      //console.log(data);
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          datosHtml +=
            "<tr><td>" +
            data[i].nombre +
            "</td><td>" +
            data[i].apellido +
            "</td><td>" +
            data[i].idprofesion +
            "</td><td>" +
            data[i].idcomuna +
            "</td><td><button onclick='getPersona(" +
            data[i].idpersona +
            ")'>Editar</button></td></tr>";
            
        }
        idtablebody.innerHTML = datosHtml;
      }
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}