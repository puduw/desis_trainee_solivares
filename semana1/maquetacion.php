<link rel="stylesheet" href="styles.css">
<h1>Maquetaci&oacute;n</h1>
<h2>&lt;table&gt;</h2>
<section>
    <p>La etiqueta table se ocupa normalmente para realizar tablas, pero existe otra utilidad y es la maquetaci&oacute;n de formularios o varios elementos por ejemplo</p>
    <article>
        <h3>Ejemplo - formulario: </h3>
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
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                                <!-- En este caso los tr seria las filas  -->
                                <tr>
                    <!-- Se definen los label y la cantidad de columnas que va a tener -->
                    <td>Nombre</td>
                    <td>Apellido</td>
                </tr>
                <tr>
                    <!-- Se definen sus inputs -->
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" align="center"><button>Enviar</button></td>
                </tr>
            </tfoot>
        </table>
    </article>
    <article>
        <h3>Ejemplo - formulario horizontal: </h3>
        <table id="table1" width="100%">
            <thead>
                <th  colspan="4" align="center">T&iacute;tulo del formulario</th>
            </thead>
            <tbody>
                <!-- En este caso los tr seria las filas  -->
                <tr>
                    <!-- Se definen los label y la cantidad de columnas que va a tener -->
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                </tr>
                <tr>
                    <!-- Se definen sus inputs -->
                    <td><input style="width:98%" type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                                <!-- En este caso los tr seria las filas  -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" align="center"><button>Enviar</button></td>
                </tr>
            </tfoot>
        </table>
    </article>
    <article>
        <h3>Ejemplo - Tabla: </h3>
        <table class="table">
            <thead>
                <tr>
                    <th  colspan="4" align="center">Titulo del formulario</th>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>edad</td>
                    <td>cumple</td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td>Etienne</td>
                    <td>Fernandez</td>
                    <td>24</td>
                    <td>Si</td>
                </tr>      
            </tbody>
        </table>
    </article>
</section>
<article class="container-ejercicios">
        <h2> Ejercicios </h2>
        <ol style="margin-left:40px">
            <li>Crear un formulario con los campos de Nombre, apellido,un select con su profesi&oacute;n su valor es id y text es la profesi&oacute;n, regi&oacute;n y comuna. Además tiene debe tener t&iacute;tulo y un bot&oacute;n de enviar, debe tener el formato del segundo ejemplo</li>
            <li>Crear una tabla con los datos que se crearon anteriormente. Su cabecera es: nombre, apellido, profesi&oacute;n. Su body es definida por la persona</li>
        </ol>
</article>