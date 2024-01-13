<?php 
include 'conexion.php';
$cmd = $_REQUEST["cmd"];
switch ($cmd){
    case 'prueba':
        $result = pg_query($conn,"SELECT idtesttrainee,nombre, to_char(fecha,'DD-MM-YYYY') AS fechaformate FROM testtrainee ORDER BY idtesttrainee ASC");
        $obj1 = array();
        while ($row = pg_fetch_row($result)){
            array_push($obj1,array(
                "idtesttrainee" => $row[0], 
                "nombre" => $row[1],
                "fecha" => $row[2] 
            ));
        }
        echo json_encode($obj1);
    break;
    case 'prueba2':
        $idtesttrainee = $_REQUEST["idtesttrainee"]*1;
        $nombre = $_REQUEST["nombre"];
        $fecha = $_REQUEST["fecha"];
        $sql = "SELECT public.fn_trainee_iu($1,$2,$3) AS resultado;";
        $params = array($idtesttrainee,$nombre, $fecha);
        $result = pg_query_params($conn,$sql,$params);
        $lastError = pg_last_error($conn);
        $obj1 = array();
        if($lastError){
            array_push($obj1,array(
                "error" => $lastError 
            ));
        } else {
            $row = pg_fetch_object($result);
            array_push($obj1,array(
                "resultado" => $row->resultado
            ));
        }
        echo json_encode($obj1);
    break;
    case 'pruebaGetOne':
        $idtesttrainee = $_REQUEST["idtesttrainee"]*1;
        $sql = "SELECT idtesttrainee,nombre, fecha FROM testtrainee WHERE idtesttrainee = $1";
        $params = array($idtesttrainee);
        $result = pg_query_params($conn,$sql,$params);
        $lastError = pg_last_error($conn);
        $obj1 = array();
        $row = pg_fetch_object($result);
        array_push($obj1,array(
            "idtesttrainee" => $row->idtesttrainee, 
            "nombre" => $row->nombre,
            "fecha" => $row->fecha 
        ));
        echo json_encode($obj1[0]);
    break;
    default:
        die("cmd incorrecto");
    break;
}

?>