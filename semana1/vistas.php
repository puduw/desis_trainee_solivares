<h1 align="center">Vistas</h1>
<link rel="stylesheet" href="styles.css">
<div class="container-vistas">
    <section>
        <article class="article-code">
            <pre>
                CREATE OR REPLACE VIEW public.vw_pruebavw(
                    nombre,
                    fecha,
                    nuevodato)
                        AS
                    SELECT t.nombre, t.fecha, t.nombre || ' ' || t.fecha as nuevodato FROM public.testtrainee t;
                    
                SELECT * FROM public.vw_pruebavw;
            </pre>
        </article>
        <article class="container-ejercicios">
            <h2> Ejercicios </h2>
            <ol style="margin-left:40px">
                <li>Crear vista para la tabla de personas, en el caso de que el apellido venga vac&iacute;o o null el valor debe ser [Sin Apellido].</li>
            </ol>
        </article>
    </section>
</div>