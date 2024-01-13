
    <!--Crear un formulario con los campos de Nombre, apellido,un select con su profesión su valor es id y text es la profesión, región y comuna. Además tiene debe tener título y un botón de enviar, debe tener el formato del segundo ejemplo
    Crear una tabla con los datos que se crearon anteriormente. Su cabecera es: nombre, apellido, profesión. Su body es definida por la persona-->
    
<link rel="stylesheet" href="styles.css">
<h1>Ejercicio 1</h1>
<section>
    <article>
        <table id="table1" width="100%">
            <thead>
                <th  colspan="5" align="center">T&iacute;tulo del formulario</th>
            </thead>
            <tbody>
                <!-- En este caso los tr seria las filas  -->
                <tr>
                    <!-- Se definen los label y la cantidad de columnas que va a tener -->
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>profesion</td>
                    <td>region</td>
                    <td>comuna</td>
                </tr>
                <tr>
                    <!-- Se definen sus inputs -->
                    <td><input style="width:98%" type="text" name="nombre" id="nombre"></td>
                    <td><input type="text" name="apellido" id="apellido"></td>
                    <td><select id ="profesion" name = "">
                    <option value ="">seleccione</option>
                    <option value ="id">ingeniero</option></select></td> 
                    <td><select id ="region" name = "">
                    <option value ="region">valparaiso</option></select></td>
                    <td><select id ="profesion" name = "">
                    <option value ="comuna">valparaiso</option></select></td>
                </tr>
                                <!-- En este caso los tr seria las filas  -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" align="center"><button class="btn" onclick="validaciones()" >Enviar</button></td>
                </tr>
            </tfoot>
        </table>
    </article>
</section>
<section>
    <article>
        <h3>Tabla: </h3>
        <table class="table">
            <thead>
                <tr>
                    <th  colspan="4" align="center">formulario ejemeplo</th>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>profesion</td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td>Sebastian</td>
                    <td>Olivares</td>
                    <td>Ingeniero</td>
                </tr>      
            </tbody>
        </table>
    </article>
</section>
<script src="controlador.js"></script>