function validaciones(){
    const inputs = document.querySelectorAll('input[name="formInput"]');
    let filtro = '';
    for (let index = 0; index < inputs.length; index++) {
        const element = inputs[index];
        if(element.value == "" && element.dataset.obligatorio === "true"){
            alert("El campo "+element.id+" es obligatorio");
            return;
        }
        if(element.dataset.type === "number" && isNaN(element.value) ){
                alert("El campo "+element.id+" no es un numero positivo");
                return;
        }
        filtro += "&" + element.id + "=" + element.value;

    }
    operar(filtro);
}

function operar (filtro){
    let xhr = new XMLHttpRequest();
    xhr.open('GET', "command.php?cmd=operacionBasica" + filtro);
    xhr.send();
    xhr.onload = function() {
    if (xhr.status != 200) { 
        alert("Error "+xhr.status+":"+xhr.statusText); 
    } else { 
        const data = JSON.parse(xhr.response)[0];
        if(data.error){
            alert(data.error)
        } else {
            document.getElementById("resultado").value = data.resultado;
        }
    }
    };
    xhr.onerror = function() {
    alert("Solicitud fallida");
    };
}
