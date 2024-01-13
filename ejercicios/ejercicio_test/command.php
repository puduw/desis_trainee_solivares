<?php
include 'conexion.php';
$cmd = $_REQUEST['cmd'];

switch($cmd){
    case 'getRegiones':
        $result = pg_query($conn,"SELECT idregion,nombre FROM region ORDER BY idregion ASC");
        $obj1 = array();
        while ($row = pg_fetch_row($result)){
            array_push($obj1,array(
                "idregion" => $row[0], 
                "nombre" => $row[1],
            ));
        }
        echo json_encode($obj1);
    break;
    case 'getHorarios':
        $result = pg_query($conn,"SELECT idhorario,descripcion FROM horario");
        $obj1 = array();
        while ($row = pg_fetch_row($result)){
            array_push($obj1,array(
                "idhorario" => $row[0], 
                "descripcion" => $row[1],
            ));
        }
        echo json_encode($obj1);
    break;
    case 'getComunas':
        //if (isset($_GET['region'])) {
            $regionSelect = $_GET['region'];

            $result = pg_query($conn,"SELECT idcomuna, nombre FROM comuna WHERE idregion = $regionSelect ORDER BY idcomuna ASC");
            $obj1 = array();
            while ($row = pg_fetch_row($result)){
                array_push($obj1,array(
                    "idcomuna" => $row[0], 
                    "nombre" => $row[1],
                ));
            }
            header('Content-Type: application/json');
            echo json_encode($obj1);
        //}
    break;
    case 'reservar':
        $nombre = $_GET['nombre'];
        $nomMascota = $_GET['nomMascota'];
        $rut = $_GET['rut'];
        $email = $_GET['email'];
        $fecha = $_GET['fecha'];
        $horario = $_GET['horario'];
        $region = $_GET['region'];
        $comuna = $_GET['comuna'];
        $web = $_GET['web'];
        $tv = $_GET['tv'];
        $amigos = $_GET['amigos'];
        $recordatorio = $_GET['recordatorio'];
        
        $params = array($nombre,$nomMascota, $rut, $email, $fecha,$horario,$region,$comuna,$web,$tv,$amigos,$recordatorio);
        $sql = "INSERT INTO reserva (nombre, nombremascota, rut, email, fecha, idhorario, idregion, idcomuna, web, tv, amigos, recordatorio)
        VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9,$10, $11, $12)"; //preguntar logica de $1
        $result = pg_query_params($conn, $sql, $params);
        $lastError = pg_last_error($conn);

        $obj1 = array();
        if($lastError){
            array_push($obj1,array(
                "error" => $lastError 
            ));
        } else {
            //$row = pg_fetch_object($result);
            array_push($obj1,array(
                "resultado" => 'Insertado correctamente'
            ));
        }
        echo json_encode($obj1);
    break;
    case 'getReservas':
        $result = pg_query($conn, "SELECT reserva.idreserva, reserva.nombre, reserva.nombremascota, reserva.recordatorio, reserva.fecha, horario.descripcion
        FROM reserva
        LEFT JOIN horario ON reserva.idhorario = horario.idhorario
        ORDER BY reserva.idreserva ASC");
        $obj1 = array();
        while ($row = pg_fetch_row($result)){
            
            array_push($obj1,array(
                "idreserva" => $row[0], 
                "nombre" => $row[1],
                "nombremascota" => $row[2],
                "recordatorio" =>($row[3] =='t')?'SI':'NO',
                "fecha" =>$row[4],
                "horario" =>$row[5]

            ));
        }
        echo json_encode($obj1);
    break;
    case 'getPorcentajes':
        $result = pg_query($conn, "SELECT * FROM public.vista_porcentaje ORDER BY porcentaje DESC");
        $obj1 = array();
        while ($row = pg_fetch_row($result)){
            if($row[2]==='0'){
                $obj1 = $obj1;    
            }else{
            array_push($obj1,array(
                "idhorario" => $row[0], 
                "descripcion" => $row[1],
                "total" => $row[2],
                "porcentaje" =>$row[3]
            ));}
        }
        echo json_encode($obj1);
    break;
    case 'dropReserva':
        $idreserva = $_GET['idreserva'];
        $idint = intval($idreserva);
        $query = "DELETE FROM reserva WHERE idreserva = $idint";
        $result = pg_query($conn,$query );
        $lastError = pg_last_error($conn);
        $obj1 = array();
        if($lastError){
            array_push($obj1,array(
                "error" => $lastError 
            ));
        } else {
            //$row = pg_fetch_object($result);
            array_push($obj1,array(
                "resultado" => 'Reserva eliminada correctamente'
            ));
        }
        echo json_encode($obj1);
    break;
}
// hacer consulta con left oin
?>

