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
    if(strtotime($_SESSION['hora'])>=strtotime($madrugada2) && strtotime($_SESSION['hora'])<strtotime($manana)){
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
        <h2>Perfil del usuario</h2>
        <div class="par"> <!-- podriem llevalo posant per damunt un main o algo del section-->
        
            <article class="carta">
                <h3><?=$_SESSION['usuario']?></h3>
                <?php
                $sentencia = 'SELECT * FROM `usuarios` u, `paises` p WHERE u.nomUsuario = "'.$_SESSION['usuario'].'" AND p.idPais = u.pais';
                include "inc/conect.php";
                include "inc/request.php";
                $fila = $resultado->fetch_assoc();
                if($fila['foto'] == "imagenes/"){
                    $foto = "imagenes/burger.jpg";
                }
                else {
                    $foto = $fila['foto'];
                }
                echo "<img src=".$foto ." width=20%>";
                if(isset($_SESSION['hora']) && isset($_SESSION['fecha'])){                
                echo<<<hereDOC
                <p>{$_SESSION['hora']}</p>
                <p>{$_SESSION['fecha']}</p>                
                <p>{$fila['nomPais']}</p> 
                hereDOC;
                }
                ?> 
            </article>
      
        <div class="image-grid">
            <article class="carta"><a href="albumes"><input type="button" value="Mis álbumes" class="btn grandote"></a></article>
            <article class="carta"><a href="subir"><input type="button" value="Crear álbum" class="btn grandote"></a></article>
            <article class="carta"><a href="salbum"><input type="button" value="Solicitar álbum" class="btn grandote"></a></article>    
            <article class="carta"><a href="configuracion"><input type="button" value="Configuración" class="btn grandote"></a></article> 
            <article class="carta"><a href="tusfotos"><input type="button" value="Tus Fotos" class="btn grandote"></a></article> 
            <article class="carta"><a href="afalbum"><input type="button" value="Añadir Foto a Álbum" class="btn grandote"></a></article> 
            <article class="carta"><a href="misdatos"><input type="button" value="Mis Datos" class="btn grandote"></a></article>
            <article class="carta"><a href="baja"><input type="button" value="Darse de Baja" class="btn grandote"></a></article>
        </div>
        </div>
    </section>
    
    <?php
    include "inc/footer.php"
?>