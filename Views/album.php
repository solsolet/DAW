<?php

    include "inc/devolver.php";
    $titulo = "Álbum";
    $lista = 1;
    include "inc/cabecera.php";
    include "inc/conect.php"; 

    echo "<section>";
        echo "<h2>Ver álbum</h2>";
        
        $sentencia = 'SELECT *, DATE_FORMAT(f.fRegistro, "%d-%m-%Y") as fechaformato 
            FROM `albumes`, `fotos` f, `paises` p, `usuarios` 
            WHERE f.pais = idPais AND "'.$_SESSION['usuario'].'" = nomUsuario AND usuario=idUsuario';
        include "inc/request.php";
        //muestra datos
        $fila = $resultado->fetch_assoc();
            echo<<<hereDOC
                <h3>{$fila['titulo']}</h3>
                <p>{$fila['descripcion']}</p>
            hereDOC;

        
        //muestra fotos
        $i = 0;
        while($i < 5 && $fila = $resultado->fetch_assoc() ) {
            echo<<<hereDOC
            <article class="carta">
                <h3>{$fila['titulo']}</h3>
                <p>{$fila['descripcion']}</p>
            </article>
            
            hereDOC;
            $i++;
        }

    echo "</section>";  
    include "inc/close.php"; 
    include "inc/footer.php";
?>