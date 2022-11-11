<?php

$url = explode("/",$_SERVER['QUERY_STRING']);    

    $lista = 1;
    include "inc/cabecera.php";
    
?>  

    <!--Modal-->
    <section id="mlogin" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="acceso" method="post">
            <header>
                <h2>Login</h2>
                <a href="#" class="closebtn">×</a>
            </header>
            <fieldset>
                <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario" required class="label label-usu">
                <label for="clave">Contraseña:</label> <input type="password" name="contra" id="clave" required class="label label-pass">
                <input type="submit" value="Entrar" class="btn" id="pulsame">
            </fieldset>
        </form>
        </div>
    </div>
    </section>

    <section>
        <a href="#mlogin" class="btn" id="log">Loguearse</a> <!-- modal login -->
        <h2>Las últimas fotos</h2>
        <div class="image-grid"> <!-- podriem llevalo posant per damunt un main o algo del section-->
            <!-- En la práctica usad cinco imágenes diferentes, no repetir la misma -->
            <article class="carta"><a href="foto?id=1"><img src="imagenes/rashito.jpeg" alt="El Rasho Macuin FIAUUUUUUUUU" ></a>
                <h3>Rayo Mqueen</h3>
                <p>01-11-2020</p>
                <p>EEUU</p>
            </article>
            <article class="carta"><a href="foto?id=2"><img src="imagenes/Mate_-_Cars_2.webp" alt="EL MATE FIAUUUUUUUUU"></a>
                <h3>Mate</h3>
                <p>04-12-1999</p>
                <p>EEUU</p>    
            </article>
            <article class="carta"><a href="foto?id=1"><img src="imagenes/sally.jpg" alt="LA SALLY FIAUUUUUUUUUU"></a>
                <h3>Sally</h3>
                <p>21-12-2021</p>
                <p>EEUU</p>
            </article>                       
            <article class="carta"><a href="foto?id=2"><img src="imagenes/copapiston.jpg" alt="LA COPA PISTÓN FIAUUUUUUUUU"></a>
                <h3>Copa Pistón</h3>
                <p>31-02-2007</p>
                <p>Internacional</p>
            </article>
            <article class="carta"><a href="foto?id=1"><img src="imagenes/francesco.jpg" alt="La Maquina Mas Blos, de TOTE ITALE FIAUUUUU"></a>
                <h3>Francesco Virgoarticleni</h3>
                <p>08-04-2014</p>
                <p>Italia</p>
            </article>
        </div>
    </section>
    
<?php
    include "inc/footer.php"
?>

