function validaciones() {
  //const chk = document.querySelectorAll('input[name="chk"]:checked');
  //const inputs = document.querySelectorAll('input[name="formInput"]');
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const profesion = document.getElementById("profesion");
  console.log(profesion)
  //validacion de verificacion si el campo esta vacio
  if (nombre.value == "") {
    alert("EL campo nombre esta vacio");
    nombre.focus();
    return;
  }
  if (nombre.value.length <3) {
    alert("EL campo nombre no debe tener menos de 3 caracteres");
    nombre.focus();
    return;
  }
  //validacion de verificacion si el campo esta vacio
  if (profesion.value == "") {
    alert("EL campo profesion esta vacio");
    apellido.focus();
    return;
  }

  alert("Todo correcto");
}

function valida(e) {
  // Nos permite hacer un input tipo texto solo acepte numeros.
  return e.charCode >= 48 && e.charCode <= 57;
}
