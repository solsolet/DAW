<?php
    session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc

    $lista = 2;
    include "inc/cabecera.php"
?>  

    <section>       
        <h2>Las últimas fotos</h2>
        <div> <!-- podriem llevalo posant per damunt un main o algo del section-->
            <!-- En la práctica usad cinco imágenes diferentes, no repetir la misma -->
            <article class="carta"><a href="aviso.html"></a>
                <h3><?php echo $_SESSION['usuario'];?></h3>
                <p>04-12-1999</p>
                <p>EEUU</p>    
            </article>
            <article><a href="albumes.php"><input type="button" value="Mis álbumes" class="btn" id="pulsame"></a></article>
            <article><a href="subir.php"><input type="button" value="Crear álbum" class="btn" id="pulsame"></a></article>
            <article><a href="salbum.php"><input type="button" value="Solicitar álbum" class="btn" id="pulsame"></a></article>           
        </div>
    </section>
    
    <?php
    include "inc/footer.php"
?>