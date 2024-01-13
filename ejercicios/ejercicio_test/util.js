function validaRut(rut) {
  regex = /^[0-9]+[-|‐]{1}[0-9kK]{1}$/; //formato Rut 11222333-4
      if (regex.test(rut)) {
        //Algoritmo Modulo 11 para DV
        const dv = rut.slice(-1).toUpperCase();
        const rutNumeros = rut.slice(0, -2);
        let suma = 0;
        let multiplo = 2;
        for (let i = rutNumeros.length - 1; i >= 0; i--) {
            suma += parseInt(rutNumeros[i]) * multiplo;
            multiplo = multiplo === 7 ? 2 : multiplo + 1;
          }
        const resto = suma % 11;
        const dvCalculado = resto === 0 ? 0 : 11 - resto;

        if ((dv.toLowerCase() === 'k' && dvCalculado === 10) || (dv == dvCalculado)) {
          return true;
        } else {
          alert("Rut invalido.");
          return false;
          }

      } else {
        alert("Formato de Rut incorrecto.");
        return false;
      }
}

function validaEmail(email) {
  regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/;
    if (!regex.test(email)) {
      alert("Formato de email incorrecto.");
      return false; 
    } 
}

function validaChk(chk){
  if(chk.length < 2){
    alert('Los campos de checkbox deben estar marcados como minimo 2');
    return false;
  } 
}
