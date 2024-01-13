document.addEventListener("DOMContentLoaded", function(){
    cargaGrilla();
})
//funcion permite validar los distintos campos del formulario.
function validacion(){
    const nombre = document.getElementById('nombre').value;
    const fecha = document.getElementById('fecha').value;

    if(nombre == ''){
        alert('El campo nombre es obligatorio');
        return;
   }
    //(nombre == '')  && alert('El campo nombre es obligatorio')
    //const variable1 =nombre||'';
    if(fecha == ''){
        alert('El campo fecha es obligatorio');
        return;
    }
    guardaroactualizar(nombre,fecha)
}
function guardaroactualizar(nombre,fecha){
    const idtrainee =  document.getElementById('idtrainee');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', "command.php?cmd=prueba2" + '&nombre='+nombre+'&fecha='+fecha+'&idtesttrainee='+idtrainee);
    xhr.send();
    xhr.onload = function() {
    if (xhr.status != 200) { 
        alert("Error "+xhr.status+":"+xhr.statusText); 
    } else { 
        const data = JSON.parse(xhr.response);
        if(data[0].error){
            alert(data[0].error)
        } else {
            idtrainee.value = '0';
            cargaGrilla();
            limpiar();
            alert(data[0].resultado);
        }      
    }
    };
    xhr.onerror = function() {
    alert("Solicitud fallida");
    };
}
//Funcion utilizada para limpiar los campos del formulario
function limpiar(){
     document.getElementById('nombre').value = '';
     document.getElementById('fecha').value = '';
     document.getElementById('idtrainee').value = '';
}
//Función ocupada para rellenar el formulario con los campos extraido desde una petición.
function obteneruntrainee(idtesttrainee){
    const nombre = document.getElementById('nombre');
    const fecha = document.getElementById('fecha');
    const idtrainee =  document.getElementById('idtrainee');
    let xhr = new XMLHttpRequest();

    xhr.open('GET', "command.php?cmd=pruebaGetOne&idtesttrainee="+idtesttrainee);

    xhr.send();

    xhr.onload = function() {
    if (xhr.status != 200) {
        alert("Error "+xhr.status+":"+xhr.statusText);
    } else {
        const data = JSON.parse(xhr.response);
        if(data.lenght == 0){
            alert('No existe');
            return;
        }
        nombre.value = data.nombre;
        fecha.value = data.fecha;
        idtrainee.value = data.idtesttrainee;
    }
    };
    xhr.onerror = function() {
    alert("Solicitud fallida");
    };
}
//Función para cargar los datos en el body de la tabla. No solo cuando se carga la pagina sino tambien cuando se guarda o actualiza un dato. 
function cargaGrilla(){
    const idtablebody = document.getElementById('idtable-body');
    let xhr = new XMLHttpRequest();

    xhr.open('GET', "command.php?cmd=prueba");

    xhr.send();

    xhr.onload = function() {
    if (xhr.status != 200) {
        alert("Error "+xhr.status+":"+xhr.statusText); 
    } else {
        const data = JSON.parse(xhr.response);
        idtablebody.innerHTML = '';
        let datosHtml = '';
        if(data.length > 0){
            for (let i = 0; i < data.length; i++) {
                datosHtml += "<tr><td>"+data[i].nombre+"</td><td>"+data[i].fecha+"</td><td><button onclick='obteneruntrainee("+data[i].idtesttrainee+")'>Editar</button></td></tr>"
            }
            idtablebody.innerHTML = datosHtml;
        } 
    }
    };
    xhr.onerror = function() {
    alert("Solicitud fallida");
    };

}