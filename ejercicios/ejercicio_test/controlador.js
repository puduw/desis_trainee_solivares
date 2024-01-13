//import { validaRut, validaEmail, validaChk } from 'util.js';
document.addEventListener("DOMContentLoaded", function () {
  cargarRegion();
  cargaHorario();
  cargaGrilla();
  cargaGrillaPorcentaje();
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
  const tv = document.getElementById('tvCheckbox');
  const web = document.getElementById('webCheckbox');
  const amigos = document.getElementById('amigosCheckbox');
  const recordatorio = document.getElementById('recordatorio');
  const checks = [tv,web,amigos,recordatorio];
  checks.forEach(function(checkbox){ // revisar y hacer sin foreach
    checkbox.checked = false;
  })
  for (let i = 0; i < arreglo.length; i++) {
    const elemento = arreglo[i];
    elemento.value = "";
    }
}
function validarFormulario() {
  const idreserva = document.getElementById("idreserva");
  const nombre = document.getElementById("nombre");
  const nomMascota = document.getElementById("nomMascota");
  const rut = document.getElementById("rut");
  const email = document.getElementById("email");
  const fecha = document.getElementById("fecha");
  const horario = document.getElementById("horario");
  const region = document.getElementById("region");
  const comuna = document.getElementById("comuna");
  const chk = document.querySelectorAll('input[name="check"]:checked');
  const arreglo = [nombre, nomMascota, rut, email, fecha,
                  horario, region, comuna];
    for (let i = 0; i < arreglo.length;i++){
      if(arreglo[i].value === ""){
      
        alert('el campo '+arreglo[i].id+' esta vacio');
        return;
      }
  }
  if(!validaRut(rut.value)){
    return;
  }
  if(validaEmail(email.value)===false){
    return;
  }
  if(validaChk(chk)===false){
    return;
  }
  reservar(arreglo);
}

function reservar(arreglo){
  const tv = document.getElementById('tvCheckbox').checked;
  const web = document.getElementById('webCheckbox').checked;
  const amigos = document.getElementById('amigosCheckbox').checked;
  const recordatorio = document.getElementById('recordatorio').checkedchecked;
  let xhr = new XMLHttpRequest();
  filtro = getFiltro(arreglo);
  xhr.open("GET", "command.php?cmd=reservar"+filtro+'&web='+web+'&tv='+tv+'&amigos='+amigos+'&recordatorio='+recordatorio);
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response)[0];// accede directamente al primer valor del json que retorna
      alert(data.resultado);//imprime alerta de exito
      cargaGrilla();
      limpiarCampos(arreglo);
      
      
    }
  };
}
function eliminarReserva(idreserva){
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=dropReserva&idreserva="+idreserva);
  //console.log("GET", "command.php?cmd=dropReserva&idreserva="+idreserva)
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      console.log(xhr.response);
      const data = JSON.parse(xhr.response)[0];// accede directamente al primer valor del json que retorna
      alert(data.resultado);//imprime alerta de exito
      cargaGrilla();
      //limpiarCampos(arreglo);
      
      
    }
  };
}

function cargarRegion(){
  const region = document.getElementById("region");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getRegiones");
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      region.innerHTML = "";
      let datosHtml = "<option value=''selected>seleccione su region</option>";
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          datosHtml +=
          '<option value="' +data[i].idregion+ '">' + data[i].nombre + '</option>';
            
        }
        region.innerHTML = datosHtml;
      }
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}
function cargaHorario(){
  const horario = document.getElementById("horario");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getHorarios");
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      horario.innerHTML = "";
      let datosHtml = "<option value=''selected>seleccione un horario</option>";
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          datosHtml +=
          '<option value="' +data[i].idhorario+ '">' + data[i].descripcion + '</option>';
            
        }
        horario.innerHTML = datosHtml;
      }
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}
function cargarComuna(){
  const comuna = document.getElementById("comuna");
  const region = document.getElementById("region");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getComunas&region="+region.value);
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      comuna.innerHTML = "";
      let datosHtml = "<option value=''selected>seleccione su comuna</option>";
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          datosHtml +=
            '<option value="' +data[i].idcomuna+ '">' + data[i].nombre + '</option>';
            
        }
        comuna.innerHTML = datosHtml;
      }
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}
function cargaGrilla() {
  const idtablebody = document.getElementById("idtable-body");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getReservas");
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      idtablebody.innerHTML = "";
      let datosHtml = "";
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          let tag = (data[i].recordatorio === 'SI') ? 
          "<button class='btn-borrar'onclick='eliminarReserva(" + 
          data[i].idreserva+")'>borrar</button><button class='btn-recordar'>recordar</button>" : "<button class='btn-borrar'>borrar</button>";

          datosHtml +=
            "<tr><td>" +
            data[i].nombre +
            "</td><td>" +
            data[i].nombremascota +
            "</td><td>" +
            data[i].recordatorio +
            "</td><td>" +
            data[i].fecha+' '+data[i].horario +
            "</td><td>"+tag+"</td></tr>";

        }
        idtablebody.innerHTML = datosHtml;
      }
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}
function cargaGrillaPorcentaje() {
  const idporcentaje = document.getElementById("idporcentaje-body");
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "command.php?cmd=getPorcentajes");
  xhr.send();
  xhr.onload = function () {
    if (xhr.status != 200) {
      alert("Error " + xhr.status + ":" + xhr.statusText);
    } else {
      const data = JSON.parse(xhr.response);
      idporcentaje.innerHTML = "";
      let datosHtml = "";
      if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
          datosHtml +=
            "<tr><td>" +
            data[i].descripcion +
            "</td><td>" +
            data[i].total +
            "</td><td>" +
            data[i].porcentaje +
            "</td></tr>";
        }
        idporcentaje.innerHTML = datosHtml;
      }
    }
  };
  xhr.onerror = function () {
    alert("Solicitud fallida");
  };
}
