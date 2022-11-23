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
        
        $i = 0;
        while($i < 5 && $fila = $resultado->fetch_assoc() ) {
            echo<<<hereDOC
            <a href="album/{$_SESSION['usuario']}/{$fila['titulo']}"<article class="carta">
                <h3>{$fila['titulo']}</h3>
                <p>{$fila['descripcion']}</p>
            </article></a>
            
            hereDOC;
            $i++;
        }

    echo "</section>";  
    include "inc/close.php"; 
    include "inc/footer.php";
?>