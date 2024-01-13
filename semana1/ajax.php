<h1 align="center">Validaciones Javascript</h1>
<link rel="stylesheet" href="styles.css">
<section class="container-main">
    <article class="container-ajax">
    <table id="table1">
        <thead>
            <th  colspan="4" align="center">Titulo del formulario</th>
        </thead>
        <tbody>
            <!-- En este caso los tr seria las filas  -->
            <tr>
                <!-- Se definen los label y la cantidad de columnas que va a tener -->
                <td>numero 1</td>
                <td>Operador</td>
                <td>numero 2</td>
                <td>Resultado</td>
            </tr>
            <tr>
                <!-- Se definen sus inputs -->
                <td><input data-obligatorio="true" type="text" name="formInput" id="num1"></td>
                <td><input type="text" data-obligatorio="true" name="formInput"  id="operador"></td>
                <td><input data-obligatorio="true" type="text" name="formInput" id="num2"></td>
                <td><input type="text" id="resultado" disabled></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" align="center"><button class="btn" onclick="validaciones()">Enviar</button></td>
            </tr>
        </tfoot>
    </table>
    </article>
    <article class="container-ejercicios">
        <h2> Ejercicios </h2>
        <ol style="margin-left:40px">
            <li>Deben crear la petici&oacute;n para actualizar o ingresar un nuevo dato dependiendo del caso. En el momento que la petición se hizo correctamente se debe limpiar el formulario, se debe actualizar la grilla y por &uacute;ltimo se debe ejecutar una alerta, su mensaje dependiendo del caso: 
                <br> Guardar:"El dato se ha guardado correctamente"
                <br> Actualizar: "EL dato se ha actualizado correctamente"
            </li>
        </ol>
    </article>
</section>
<script src="ajax.js"></script>