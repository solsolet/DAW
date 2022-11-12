<?php
    $titulo = "Buscar";
    $lista = 1;
    include "inc/cabecera.php"
?>  

    <section>
        <h2>Búsqueda</h2>
        <form method="post" action="resultado">
            <fieldset>
                <label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo"><br>
                <label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
                <label for="pais">País:</label>
                    <select name="pais" id="pais">
                        <option value="vacio">Vacío</option><!--quedaria mejor un espacio en blanco-->
                        <option value="Alemania">Alemania</option>
                        <option value="Austria">Austria</option>
                        <option value="China">China</option>
                        <option value="España">España</option>
                        <option value="EEUU">EEUU</option>
                        <option value="Francia">Francia</option>
                        <option value="Inglaterra">Inglaterra</option>
                        <option value="Italia">Italia</option>
                        <option value="Rusia">Rusia</option>                   
                        <option value="Venezuela">Venezuela</option>
                    </select><br>
                <input type="submit" value="Buscar" class="btn">
            </fieldset>
        </form>
    </section>
    
<?php
    include "inc/footer.php"
?>