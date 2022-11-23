<?php
    $titulo = "Buscar";
    include "inc/registrado.php";
?>  

    <section>
        <h2>Búsqueda</h2>
        <form method="post" action="resultado">
            <fieldset>
                <label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo"><br>
                <label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
                <?php $pagina = "salbum"; include "inc/listapaises.php"; ?><br>
                <input type="submit" value="Buscar" class="btn">
            </fieldset>
        </form>
    </section>
    
<?php
    include "inc/footer.php"
?>