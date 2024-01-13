<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #idtable,
        #idtable th,
        #idtable td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
</head>

<body>
    <input id="idpersona" type="hidden" value="0">

    <h1 align="center">Validaciones Javascript</h1>
    <link rel="stylesheet" href="styles.css">
    <section class="container-main">
        <article class="container-ajax">
            <table id="table1">
                <thead>
                    <th colspan="4" align="center">Titulo del formulario</th>
                </thead>
                <tbody>
                    <!-- En este caso los tr seria las filas  -->
                    <tr>
                        <!-- Se definen los label y la cantidad de columnas que va a tener -->
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>profesion</td>
                        <td>comuna</td>

                    </tr>
                    <tr id='tr'>
                        <!-- Se definen sus inputs -->

                        <td><input style="width:98%" type="text" name="formInput" id="nombre"></td>
                        <td><input type="text" name="formInput" id="apellido"></td>
                        <td>
                            <select id="idprofesion" name="formInput">
                                <option value=""selected>seleccione</option>
                                <option value="1">ingeniero</option>
                                <option value="3">programador</option>
                            </select>
                        </td>
                        <!--<td><select id="idregion" name="formInput">
                            <option value="1">valparaiso</option>
                        </select></td>-->
                        <td><select id="idcomuna" name="formInput">
                                <option value="1">valparaiso</option>
                                <option value="2">valdivia</option>
                            </select></td>
                    </tr>
                    <!-- En este caso los tr seria las filas  -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" align="center"><button class="btn" onclick="validaciones()">Enviar</button></td>
                    </tr>
                </tfoot>
            </table>
        </article>


        <table align="center" width="100%">
            <tr>
                <td colspan="1" style="border: 1px solid">
                    <table id="idtable">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Apellido</td>
                                <td>Profesion</td>
                                <td>comuna</td>
                                <td>editar</td>
                            </tr>
                        </thead>
                        <tbody id="idtable-body">
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </section>
    <script src="script.js"></script>
</body>

</html>