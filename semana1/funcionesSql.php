<h1 align="center">Funci&oacute;n Sql</h1>
<link rel="stylesheet" href="styles.css">
<div class="container-funciones">
    <section>
    <h2 align="center">Funci&oacute;n Operaci&oacute;n</h2>
        <article class="article-code">
            <pre>
            CREATE FUNCTION public.fn_operacion_basica(float,float,varchar)
                RETURNS float AS 
                $body$
                DECLARE
                    _numero1 ALIAS 		FOR $1;
                    _numero2 ALIAS 		FOR $2;
                    _operador ALIAS 	FOR $3;
                    /*  Variables internas  */
                    __resultado 			FLOAT;
                BEGIN
                    CASE _operador
                        WHEN '+' THEN
                            __resultado := _numero1 + _numero2;
                        WHEN '-' THEN
                            __resultado := _numero1 - _numero2;
                        WHEN '*' THEN
                            __resultado := _numero1 * _numero2;
                        WHEN '/' THEN
                            IF _numero2 = 0 THEN
                                RAISE EXCEPTION 'division por 0' ;
                            END IF;
                            __resultado := _numero1 / _numero2;
                        ELSE
                            RAISE EXCEPTION 'Operador no valido' ;
                    END CASE;
                    RETURN __resultado;
                                
                END;
            $body$
            LANGUAGE 'plpgsql';
            </pre>
        </article>
    </section>
    <section>
    <h2 align="center">Funci&oacute;n Con Condicionales.</h2>
        <article class="article-code">
            <h4>Creaci&oacute;n de las tablas</h4>
            <pre>
            CREATE TABLE public.testtrainee (
                idtesttrainee SERIAL, 
                nombre VARCHAR, 
                fecha DATE
            );
            </pre>
            <h4>Creaci&oacute;n de la funci&oacute;n</h4>
            <pre>
            CREATE OR REPLACE FUNCTION public.fn_trainee_iu (integer,varchar,varchar)
                    RETURNS varchar AS
                    $body$
                    DECLARE
                        /*Instanciando los parametros*/
                        _idtesttrainee	ALIAS FOR $1; 0
                        _nombre			ALIAS FOR $2; hola1
                        _fecha			ALIAS FOR $3; 11/11/2023
                        __existe		INTEGER;

                    BEGIN
                        /* _idtesttrainee si es distinto a 0 debemos actualizar y si no realizamos una insercion */
                        IF _idtesttrainee <> 0 THEN
                            /*En caso de ser actualizacion, se debe realizar un validacion con todos los datos de la tabla excepto el dato que se quiere actualizar*/
                            SELECT COUNT(*) INTO __existe FROM testtrainee WHERE nombre = _nombre AND idtesttrainee NOT IN (_idtesttrainee);
                            IF __existe <> 0 THEN
                                RAISE EXCEPTION 'El nombre ya existe: %',_nombre; 
                            ELSE
                                UPDATE testtrainee SET nombre = _nombre, fecha = _fecha::DATE WHERE idtesttrainee = _idtesttrainee;
                                RETURN 'Actualizado correctamente';
                            END IF;
                        ELSE
                            SELECT COUNT(*) INTO __existe FROM testtrainee WHERE nombre = _nombre;
                            IF __existe <> 0 THEN
                                RAISE EXCEPTION 'El nombre ya esta ocupado: %',_nombre;
                            ELSE
                                INSERT INTO testtrainee (nombre, fecha) values (_nombre,_fecha::DATE);
                                RETURN 'Ingresado correctamente';	
                            END IF;
                        END IF;
                    END;
                    $body$
            LANGUAGE 'plpgsql'
            </pre>
        </article>
        <article class="container-ejercicios">
            <h2> Ejercicio </h2>
            <ol style="margin-left:40px">
                <li>Crear una funci&oacute;n que reciba 4 par&aacute;metros: idpersona, nombre, apellido, profesi&oacute;n. Se debe validar que personas no deben tener el mismo nombre y apellido, adem&aacute;s si el idpersona no es 0 debe actualizarse y en el caso contrario debe insertar el dato</li>
                <pre>
                tabla persona
tabla prefesion
tabla region 
tabla comuna 

tabla persona {
idpersona
nombre
apellido
idprofesion
idcomuna
}
tabla profesion {
idprofesion
nombre
}
tabla region {
idregion
nombre
}
tabla comuna{
idcomuna 
nombre 
idregion
}
                </pre>
            </ol>
        </article>
    </section>
</div>