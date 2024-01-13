/*Creacion de la tabla de prueba*/
CREATE TABLE testtrainee (
idtesttrainee SERIAL,
nombre VARCHAR,
fecha date
);

/*Creacion de la funcion que permite insertar y actualizar*/
CREATE OR REPLACE FUNCTION public.fn_trainee_iu (
/*Parametros*/
  integer,
  varchar,
  varchar
)
RETURNS VARCHAR AS
$body$
DECLARE
    /*Instanciando los parametros*/
    _idtesttrainee    ALIAS FOR $1;
    _nombre            ALIAS FOR $2;
    _fecha            ALIAS FOR $3;

BEGIN
/* _idtesttrainee si es distinto a 0 debemos actualizar y si no realizamos una insercion */
IF _idtesttrainee <> 0 THEN
    /*En caso de ser actualizacion, se debe realizar un validacion con todos los datos de la tabla excepto el dato que se quiere actualizar*/
    PERFORM nombre FROM testtrainee WHERE nombre = _nombre AND idtesttrainee NOT IN (_idtesttrainee);
    IF FOUND THEN
        RAISE EXCEPTION 'El nombre ya existe: %',_nombre; 
    ELSE
        UPDATE testtrainee SET nombre = _nombre, fecha = _fecha::DATE WHERE idtesttrainee = _idtesttrainee;
        RETURN 'Actualizado correctamente';
    END IF;
ELSE
    PERFORM nombre FROM testtrainee WHERE nombre = _nombre;
    IF FOUND THEN
        RAISE EXCEPTION 'El nombre ya esta ocupado: %',_nombre;
    ELSE
        INSERT INTO testtrainee (nombre, fecha) values (_nombre,_fecha::DATE);
        RETURN 'Ingresado correctamente';    
    END IF;
END IF;

END;
$body$
LANGUAGE 'plpgsql';
/*SELECT public.fn_trainee_iu(0,'Pablo', '22-02-2022') AS resultado;*/