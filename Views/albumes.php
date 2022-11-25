<?php

    include "inc/devolver.php";
    $titulo = "Álbumes";
    $lista = 2;
    include "inc/cabecera.php";
    include "inc/conect.php"; 

    echo "<section>";
        echo "<h2>Mis álbumes</h2>";
        
        $sentencia = 'SELECT * FROM `albumes`, `usuarios` WHERE "'.$_SESSION['usuario'].'" = nomUsuario AND usuario=idUsuario';
        include "inc/request.php";
        
        $num = $resultado->num_rows;
        
        if($num > 0){
            echo "<div class='image-grid'>";
            while($fila = $resultado->fetch_assoc() ) {
                echo<<<hereDOC
                <article class="carta"><a href="album/{$_SESSION['usuario']}/{$fila['titulo']}">
                    <h3>{$fila['titulo']}</h3>
                    <p>{$fila['descripcion']}</p>
                </a></article>
                
                hereDOC;
            }
            echo "</div>";
        }
        else
            echo "<p class='aviso'>No tienes álbumes, crea tu primer álbum<a href='subir'> aquí</a></p>";

    echo "</section>";  
    include "inc/close.php"; 
    include "inc/footer.php";
?>