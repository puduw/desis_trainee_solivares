<?php 
include 'conexion.php';
$cmd = $_REQUEST["cmd"];

switch ($cmd){
    case 'personas':
        // https://dev.facturacion.cl/[tu ambiente]/semana1/command?cmd=operacionBasica&num1=10&num2=20&operador=-
        $idpersona = $_REQUEST["idpersona"];
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        $idprofesion = $_REQUEST["idprofesion"];
        $idcomuna = $_REQUEST["idcomuna"];
        $params = array($idpersona,$nombre, $apellido, $idprofesion, $idcomuna);
        $sql = "SELECT public.fn_personas($1, $2, $3, $4, $5) AS resultado;";
        $result = pg_query_params($conn, $sql, $params);
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
    case 'getAll':
        $result = pg_query($conn,"SELECT idpersona,nombre,apellido,idprofesion,idcomuna FROM persona ORDER BY idpersona ASC");
        $obj1 = array();
        while ($row = pg_fetch_row($result)){
            array_push($obj1,array(
                "idpersona" => $row[0], 
                "nombre" => $row[1],
                "apellido" => $row[2],
                "idprofesion" =>$row[3],
                "idcomuna" =>$row[4]
            ));
        }
        echo json_encode($obj1);
    break;
    case 'getOne':
        $idpersona = $_REQUEST["idpersona"]*1;
        $sql = "SELECT idpersona,nombre, apellido, idprofesion, idcomuna FROM persona WHERE idpersona = $1";
        $params = array($idpersona);
        $result = pg_query_params($conn,$sql,$params);
        $lastError = pg_last_error($conn);
        $obj1 = array();
        $row = pg_fetch_object($result);
        array_push($obj1,array(
            "idpersona" => $row->idpersona, 
            "nombre" => $row->nombre,
            "apellido" => $row->apellido,
            "idprofesion" => $row->idprofesion,
            "idcomuna" => $row->idcomuna 
        ));
        echo json_encode($obj1[0]);
    break;
    default:
        die("cmd incorrecto");
    break;
}

?>