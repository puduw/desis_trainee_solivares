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
    <input id="idreserva" type="hidden" value="0">
    <h2 align="center" style="margin-top:30px;">veterinaria Desis</h2>

    <table width="100%">
        <tr>
            <td colspan="1">
                <table id="table1">
                    <thead>
                        <th colspan="2" align="center">Reserva tu hora</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre y apellido</td>
                            <td>nombre mascota</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id="nombre"></td>
                            <td><input type="text" name="" id="nomMascota"></td>
                        </tr>
                        <tr>
                            <td>rut</td>
                            <td>email</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="" id="rut"></td>
                            <td><input type="text" name="" id="email"></td>
                        </tr>
                        <tr>
                            <!-- Se definen los label y la cantidad de columnas que va a tener -->
                            <td>fecha de consulta</td>
                            <td>horario</td>
                        </tr>
                        <tr>
                            <!-- Se definen sus inputs -->
                            <td><input type="date" name="" id="fecha"></td>
                            <td>
                                <select id="horario" name="formInput">
                                    
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
                                <select id="region" name="formInput" onchange="cargarComuna()">
                                    
                                </select>
                            </td>
                            <td>
                                <select id="comuna" name="formInput">
                                <option value=''selected>debe seleccionar region</option>

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
                                    <input type="checkbox" id="webCheckbox" name="check" value="web">web
                                </div>
                                <div>
                                    <input type="checkbox" id="tvCheckbox" name="check" value="tv">tv
                                </div>
                                <div>
                                    <input type="checkbox" id="amigosCheckbox" name="check" value="amigos">amigos
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" id="recordatorio" name="checkrecordatorio" value="no"> Le gustaria que le recordemos su hora un dia antes?
                            </td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" align="center"><button class='btn-reservar' onclick="validarFormulario()">Reservar</button></td>
                        </tr>
                    </tfoot>


                </table>
            </td>
            <td colspan="1" align="right" valign="top">
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
                    <tbody align = "center" id = "idporcentaje-body">
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
            <tbody id='idtable-body'>
            </tbody>
        </table>
        </td>
    </tr>
    </table>
    <script src="util.js"></script>
    <script src="controlador.js"></script>
    


</body>

</html>