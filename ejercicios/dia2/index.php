<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
#idtable,#idtable th,#idtable td  {
  border: 1px solid black;
  border-collapse: collapse;
}

</style>
<body>
<input id="idtrainee" type="hidden" value="0">
<table width="100%">
    <tr>
        <td style="border: 1px solid" colspan="2">
            <h2 align="center">
                usuarios
            </h2>
        </td>
    </tr>
    <tr>
        <td colspan="1" style="border: 1px solid">
            <table id="idtable2" style="border: 1px solid black;">
                    <tr>
                        <td colspan="3" align="center">
                            <h2>Reserva tu hora</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Nombre</label>
                        </td>
                        <td width="25%"></td>
                        <td>
                            <label for="">Fecha</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="nombre">
                        </td>
                        <td width="25%"></td>
                        <td>
                            <input type="date" id="fecha">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><Button onclick="validacion()">Click</Button></td>
                    </tr>
            </table>
        </td>
        <td colspan="1" align="right" valign="top" style="border: 1px solid">
            <table  id="idtable">
                    <thead>
                        <tr>
                            <th>Ejemplo</th>
                            <th>Ejemplo2</th>
                            <th>Ejemplo3</th>
                            <th>Ejemplo4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sad</td>
                            <td>asd</td>
                            <td>asd</td>
                            <td>asdas</td>
                        </tr>
                    </tbody>
                </table>
        </td>
    </tr>
    <tr>
        <td colspan="1" style="border: 1px solid">
            <table  id="idtable">
                <thead>
                    <tr>
                        <th>Ejemplo</th>
                        <th>Ejemplo2</th>
                        <th>Ejemplo3</th>
                    </tr>
                </thead>
                <tbody id="idtable-body">
                </tbody>
            </table>
        </td>
    </tr>
</table>

<script src="controlador.js"></script>
</body>
</html>