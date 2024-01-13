<?php 
include 'conexion.php';
$cmd = $_REQUEST["cmd"];

switch ($cmd){
    case 'operacionBasica':
        // https://dev.facturacion.cl/[tu ambiente]/semana1/command?cmd=operacionBasica&num1=10&num2=20&operador=-
        $num1 = $_REQUEST["num1"];
        $num2 = $_REQUEST["num2"];
        $operador = $_REQUEST["operador"] == ' ' ? "+" : $_REQUEST["operador"];
        $sql = "SELECT public.fn_operacion_basica($1,$2,$3) AS resultado;";
        $params = array($num1,$num2, $operador);
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
    // Crear un nuevo case llamado personaiu, el cual tienen que llamar la funcion de posgresql fn_persona_iu(4 parametros) y va retornar segun sea el caso.  
    default:
        die("cmd incorrecto");
    break;
}

?>