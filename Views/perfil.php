<?php

    include "inc/devolver.php";
    $titulo = "Perfil";
    $lista = 2;
    include "inc/cabecera.php";

    $manana = "12:00:00";
    $tarde = "16:00:00";
    $noche = "20:00:00";
    $madrugada = "06:00:00";

    if(strtotime(strtotime($_COOKIE['ultimahora'])>=strtotime($madrugada) && $_COOKIE['ultimahora'])<strtotime($manana)){
        echo"<p>¡Buenos días, ".$_COOKIE['usuario_login']."!</p>";
    }
    else if (strtotime($_COOKIE['ultimahora'])>=strtotime($manana) && strtotime($_COOKIE['ultimahora'])<strtotime($tarde)){
        echo"<p>¡Hola buenas, ".$_COOKIE['usuario_login']."!</p>";
    }
    else if (strtotime($_COOKIE['ultimahora'])>=strtotime($tarde) && strtotime($_COOKIE['ultimahora'])<strtotime($noche)){
        echo"<p>¡Buenas tardes, ".$_COOKIE['usuario_login']."!</p>";
    }
    else if (strtotime($_COOKIE['ultimahora'])>=strtotime($noche) && strtotime($_COOKIE['ultimahora'])<strtotime($madrugada)){
        echo"<p>¡Buenas noches, ".$_COOKIE['usuario_login']."!</p>";
    }
?>  

    <section>       
        <h2>Las últimas fotos</h2>
        <div> <!-- podriem llevalo posant per damunt un main o algo del section-->
            <article class="carta">
                <h3><?=$usu?></h3>
                <p><?=$_COOKIE["ultimahora"]?></p>
                <p><?=$_COOKIE["ultimafecha"]?></p>
                <!-- <p>04-12-1999</p>
                <p>EEUU</p>  -->   
            </article>
            <article><a href="albumes"><input type="button" value="Mis álbumes" class="btn" id="pulsame"></a></article>
            <article><a href="subir"><input type="button" value="Crear álbum" class="btn" id="pulsame"></a></article>
            <article><a href="salbum"><input type="button" value="Solicitar álbum" class="btn" id="pulsame"></a></article>           
        </div>
    </section>
    
    <?php
    include "inc/footer.php"
?>