<?php

    include "inc/devolver.php";
    
    if($usu != $_SESSION['usuario']){
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'aviso';
        header("Location: http://$host$uri/$extra");
        exit;
    }

    $titulo = "Perfil";
    $lista = 2;
    include "inc/cabecera.php";

    $manana = "12:00:00";
    $tarde = "16:00:00";
    $noche = "20:00:00";
    $madrugada1 = "23:59:59";
    $madrugada2 = "06:00:00";

if(isset($_SESSION['hora'])){
    if(strtotime($_SESSION['hora'])>=strtotime($madrugada1) && strtotime($_SESSION['hora'])<strtotime($manana)){
        echo"<p>¡Buenos días, ".$_SESSION['usuario']."!</p>";
    }
    else if (strtotime($_SESSION['hora'])>=strtotime($manana) && strtotime($_SESSION['hora'])<strtotime($tarde)){
        echo"<p>¡Hola buenas, ".$_SESSION['usuario']."!</p>";
    }
    else if (strtotime($_SESSION['hora'])>=strtotime($tarde) && strtotime($_SESSION['hora'])<strtotime($noche)){
        echo"<p>¡Buenas tardes, ".$_SESSION['usuario']."!</p>";
    }
    else if (((strtotime($_SESSION['hora'])>=strtotime($noche) && strtotime($_SESSION['hora'])<strtotime($madrugada1)) || 
    (strtotime($_SESSION['hora'])>=strtotime($madrugada1) && strtotime($_SESSION['hora'])<strtotime($madrugada2)))){
        echo"<p>¡Buenas noches, ".$_SESSION['usuario']."!</p>";
    }
}
?>  

    <section>       
        <h2>Las últimas fotos</h2>
        <div> <!-- podriem llevalo posant per damunt un main o algo del section-->
            <article class="carta">
                <h3><?=$_SESSION['usuario']?></h3>
                <?php
                if(isset($_SESSION['hora']) && isset($_SESSION['fecha']))
                echo<<<hereDOC
                <p>{$_SESSION['hora']}</p>
                <p>{$_SESSION['fecha']}</p>
                hereDOC;
                ?> 
                <p>EEUU</p>  
            </article>
            <article><a href="albumes"><input type="button" value="Mis álbumes" class="btn" id="pulsame"></a></article>
            <article><a href="subir"><input type="button" value="Crear álbum" class="btn" id="pulsame"></a></article>
            <article><a href="salbum"><input type="button" value="Solicitar álbum" class="btn" id="pulsame"></a></article>    
            <article><a href="configuracion"><input type="button" value="Configuración" class="btn" id="pulsame"></a></article>        
        </div>
    </section>
    
    <?php
    include "inc/footer.php"
?>