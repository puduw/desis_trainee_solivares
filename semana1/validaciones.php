<h1 align="center">Validaciones Javascript</h1>
<link rel="stylesheet" href="styles.css">
<table id="table1">
            <thead>
                <th  colspan="2" align="center">Titulo del formulario</th>
            </thead>
            <tbody>
                <!-- En este caso los tr seria las filas  -->
                <tr>
                    <!-- Se definen los label y la cantidad de columnas que va a tener -->
                    <td>Nombre</td>
                    <td>Apellido</td>
                </tr>
                <tr>
                    <!-- Se definen sus inputs -->
                    <td><input data-obligatorio="true" type="text" name="formInput" id="nombre"></td>
                    <td><input data-obligatorio="true" type="text" name="formInput" id="apellido"></td>
                </tr>
                                <!-- En este caso los tr seria las filas  -->
                                <tr>
                    <!-- Se definen los label y la cantidad de columnas que va a tener -->
                    <td>Edad</td>
                </tr>
                <tr>
                    <!-- Se definen sus inputs -->
                    <td><input type="text" data-obligatorio="false" name="formInput" onkeypress='return valida(event)' id="edad" value="1"></td>
                </tr>
                <tr>
                    <td>Checkbox</td>
                    <td>    
                            <div>
                                <input type="checkbox" name="chk" id="">
                                <label for="">1</label>
                            </div>
                            <div>
                                <input type="checkbox" name="chk" id="">
                                <label for="">2</label> 
                            </div>
                            <div>
                                <input type="checkbox" name="chk" id="">
                                <label for="">3</label> 
                            </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" align="center"><button class="btn" onclick="validaciones()">Enviar</button></td>
                </tr>
            </tfoot>
        </table>
        <article class="container-ejercicios">
            <h2> Ejercicios </h2>
            <ol style="margin-left:40px">
                <li>Crear validaciones del formulario creado en el ejercicio de maquetaci&oacute;n, el nombre debe ser obligatorio y ademas su longitud no debe ser menor a 3, el apellido debe ser opcional, el selec de profesion debe ser obligatorio </li>
            </ol>
        </article>
<script src="controlador.js"></script>