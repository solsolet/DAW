<?php
    $titulo = "Resultados";
    include "inc/registrado.php";
?>  

    <section>
        <h2>Resultados de búsqueda</h2>
        
        <?php
            $titulo = $_POST['titulo'];
            $fecha = $_POST['fecha'];
            $pais = $_POST['pais'];

            if(strcmp($_POST['titulo'],"")!=0 || strcmp($_POST['fecha'],"") !=0 || (isset($_POST['pais']) && strcmp($_POST['pais'],"vacio")!=0))
             echo "<h3>Tu búsqueda:</h3>";

            if(strcmp($_POST['titulo'],"")!=0)
                echo "<p>Título: <b>{$titulo}</b></p>";
            if(strcmp($_POST['fecha'],"")!=0)
                echo "<p>Fecha: <b>{$fecha}</b></p>";
            if(isset($_POST['pais']) && strcmp($_POST['pais'],"vacio")!=0)
                echo "<p>País: <b>{$pais}</b></p>";

?>      
        <h3>Reultados:</h3>
        <div class="image-grid">
            <article class="carta"><a href="foto/1"><img src="imagenes/rashito.jpeg" alt="El Rasho Macuin FIAUUUUUUUUU" width="272" height="108"></a>
                <h3>Rayo Mqueen</h3>
                <p>01-11-2020</p>
                <p>EEUU</p>
            </article>
            <article class="carta"><a href="foto/2"><img src="imagenes/Mate_-_Cars_2.webp" alt="EL MATE FIAUUUUUUUUU" width="160" height="108"></a>
                <h3>Mate</h3>
                <p>04-12-1999</p>
                <p>EEUU</p>    
            </article>
            <article class="carta"><a href="foto/3"><img src="imagenes/sally.jpg" alt="LA SALLY FIAUUUUUUUUUU" width="272" height="108"></a>
                <h3>Sally</h3>
                <p>21-12-2021</p>
                <p>EEUU</p>
            </article>                       
            <article class="carta"><a href="foto/4"><img src="imagenes/copapiston.jpg" alt="LA COPA PISTÓN FIAUUUUUUUUU" width="180" height="108"></a>
                <h3>Copa Pistón</h3>
                <p>31-02-2007</p>
                <p>Internacional</p>
            </article>
            <article class="carta"><a href="foto/5"><img src="imagenes/francesco.jpg" alt="La Maquina Mas Blos, de TOTE ITALE FIAUUUUU" width="272" height="108"></a>
                <h3>Francesco Virgolini</h3>
                <p>08-04-2014</p>
                <p>Italia</p>
            </article>
        </div>
    </section>
    
    <?php
    include "inc/footer.php"
?>