<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles-custom.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <h2 align="center" style="margin-top:30px;">veterinaria Desis</h2>

    <table width="100%">
        <tr>
            <td colspan="1" style="border: 1px solid">
                <table id="table1">
                    <thead>
                        <th colspan="2" align="center">Reserva tu hora</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>rut</td>
                            <td>email</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id=""></td>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <!-- Se definen los label y la cantidad de columnas que va a tener -->
                            <td>fecha de consulta</td>
                            <td>horario</td>
                        </tr>
                        <tr>
                            <!-- Se definen sus inputs -->
                            <td><input type="date" name="" id=""></td>
                            <td>
                                <select id="horario" name="formInput">
                                    <option value="">seleccione</option>
                                    <option value="1">8:00 a 9:00</option>
                                    <option value="3">9:00 a 10:00</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!-- Se definen los label y la cantidad de columnas que va a tener -->
                            <td>region</td>
                            <td>comuna</td>
                        </tr>
                        <tr>
                            <!-- Se definen sus inputs -->
                            <td>
                                <select id="region" name="formInput">
                                    <option value="">seleccione</option>
                                    <option value="1">valparaiso</option>
                                    <option value="2">coquimbo</option>
                                </select>
                            </td>
                            <td>
                                <select id="comuna" name="formInput">
                                    <option value="">seleccione</option>
                                    <option value="1">valparaiso</option>
                                    <option value="3">viña del mar</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!-- Se definen los label y la cantidad de columnas que va a tener -->
                            <td>
                                <p>como se entero de nosotros:</p>
                            </td>
                            <td>
                                <div>
                                    <input type="checkbox" id="webCheckbox" name="checkboxInput" value="web">web
                                </div>
                                <div>
                                    <input type="checkbox" id="tvCheckbox" name="checkboxInput" value="tv">tv
                                </div>
                                <div>
                                    <input type="checkbox" id="amigosCheckbox" name="checkboxInput" value="amigos">amigos
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" id="webCheckbox" name="checkboxInput" value="web"> Le gustaria que le recordemos su hora un dia antes?
                            </td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" align="center"><button class='btn-reservar'>Enviar</button></td>
                        </tr>
                    </tfoot>


                </table>
            </td>
            <td colspan="1" align="right" valign="top" style="border: 1px solid">
                <table id="idtable" class='table'>
                    <thead>
                    <tr>
                    <th colspan="4" align="center">Horarios de alta demanda</th>
                </tr>
                        <tr align ="center">
                            <th>Horario</th>
                            <th>cantidad</th>
                            <th>porcentaje</th>
                        </tr>
                    </thead>
                    <tbody align = "center">
                        <tr>
                            <td>14:00 a 15:00</td>
                            <td>2</td>
                            <td>50%</td>
                        </tr>
                        <tr>
                            <td>8:00 a 9:00</td>
                            <td>1</td>
                            <td>25%</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    <tr>
        <td>
        <table id='tabla-show' class="table" style = "margin-top:20px">
            <thead>
                <tr>
                    <th colspan="5" align="center">Listado de reservas</th>
                </tr>
                <tr align = "center">
                    <td>Nombre</td>
                    <td>Nombre Mascota</td>
                    <td>Recordar</td>
                    <td>Hora Agendada</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td>sebastian</td>
                    <td>olivares</td>
                    <td>NO</td>
                    <td>01/02/2024 8:00 a 9:00</td>
                    <td><button class='btn-borrar'>borrar</button><button class='btn-recordar'>recordar</button></td>
                </tr>
            </tbody>
        </table>
        </td>
    </tr>
    </table>

</body>

</html>