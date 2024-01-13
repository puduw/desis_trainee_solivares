function validaciones(){
    const chk = document.querySelectorAll('input[name="chk"]:checked');
    const inputs = document.querySelectorAll('input[name="formInput"]');
    const nombre = document.getElementById("nombre");
    for (let index = 0; index < inputs.length; index++) {
        const element = inputs[index];
        if(element.value == "" && "1" == 1){
            alert("El campo "+element.id+" es obligatorio");
            return;
        }
        if(element.dataset.obligatorio === "false"){
            if(element.id === 'edad' && element.value != '' && (isNaN(element.value) || element.value <= 0)){
                alert("El campo "+element.id+" no es un numero positivo");
                return;
            }
        }
    }
    if(chk.length < 2){
        alert('Los campos de checkbox deben estar marcado como minimo 2');
        return;
    }
    // // validacion de verificacion si el campo esta vacio 
    // if(nombre.value == ''){
    //     alert('EL campo nombre esta vacio');
    //     nombre.focus();
    //     return;
    // }
    // // validacion de verificacion si el campo esta vacio 
    // if(apellido.value == ''){
    //     alert('EL campo apellido esta vacio');
    //     apellido.focus();
    //     return;
    // }
    // // Primero valida si el campo no esta vacio y en el caso de nos numero o que sea menor a 0 la validacion salta.
    // if(edad.value != '' && (isNaN(edad.value) || edad.value <= 0)){
    //     alert('El campo edad no es un numero positivo');
    //     edad.focus();
    //     return;
    // }
    // // Esta validando si menos de 2 checkbox estan marcados. 

    alert('Todo correcto');
}

function valida(e){
    // Nos permite hacer un input tipo texto solo acepte numeros. 
    return e.charCode >= 48 && e.charCode <=57;
}