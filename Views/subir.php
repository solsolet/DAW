<?php
    include "inc/devolver.php";
    $titulo = "Nuevo Álbum";
    $lista = 2;
    include "inc/cabecera.php"
?>  

    <section>
    <h2>Crear álbum</h2>
    <form method="post">
        <label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo" required class="label label-usu">
        <label for="descrip">Descripción:</label> <input type="text" name="descrip" id="descrip" required class="label label-pass">
        <input type="submit" value="Entrar" class="btn" id="crearA">
    </form>
    </section>

    <?php
    include "inc/footer.php"
?>