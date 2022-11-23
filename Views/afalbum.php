<?php
    include "inc/devolver.php";
    $titulo = "Añadir foto";
    $lista = 2;
    include "inc/cabecera.php";
    include "inc/conect.php";
?>

<section>
    <h2>Añadir foto a álbum</h2>
    <form method="post" action="resultado">
        <fieldset>
            <label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo"><br>
            <label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
            <?php $pagina = "salbum"; include "inc/listapaises.php"; ?><br>
            <label for="img">Foto:</label>
                <label for="img" class="file">Elige una foto</label> <input type="file" id="img" name="img" accept="image/*">
            <input type="submit" value="Añadir" class="btn">
        </fieldset>
    </form>
</section>

<?php
    include "inc/close.php"; 
    include "inc/footer.php";
?>