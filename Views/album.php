<?php

    include "inc/devolver.php";
    $titulo = "Álbum";
    $lista = 2;
    include "inc/cabecera.php";
    include "inc/conect.php"; 
    if(isset($nombre)){
    echo "<section>";
        echo "<h2>Ver álbum</h2>";
        
        $sentencia = 'SELECT a.descripcion, COUNT(*) as total
            FROM `albumes` a, `fotos` f, `usuarios` u
            WHERE a.titulo = "'.$nombre[1].'" AND "'.$nombre[0].'" = u.nomUsuario AND u.idUsuario = a.usuario AND a.idAlbum = f.album ';
        include "inc/request.php";
        //muestra datos
        $fila = $resultado->fetch_assoc();
        
            echo<<<hereDOC
                <h3>{$fila['total']} fotos</h3>
                <h4>{$fila['descripcion']}</h4>
            hereDOC;    

        //para sacar paises
        $sentencia = 'SELECT *
            FROM `albumes` a, `fotos` f, `usuarios` u, `paises` p
            WHERE a.titulo = "'.$nombre[1].'" AND "'.$nombre[0].'" = u.nomUsuario AND u.idUsuario = a.usuario AND a.idAlbum = f.album 
                AND pais = idPais';
        include "inc/request.php";

        echo "<div class='image-grid'>";
        //muestra fotos
        $sentencia = 'SELECT *
        FROM `albumes` a, `fotos` f, `usuarios` u
        WHERE a.titulo = "'.$nombre[1].'" AND "'.$nombre[0].'" = u.nomUsuario AND u.idUsuario = a.usuario AND a.idAlbum = f.album ';
        include "inc/request.php";
        while($fila = $resultado->fetch_assoc() ) {
            echo<<<hereDOC
                <article class="carta"><a href="foto/{$fila['idFotos']}"><img src={$fila['fichero']} alt={$fila['alternativo']}></a>
                    <h3>{$fila['titulo']}</h3>
                    <p>{$fila['descripcion']}</p>
                </article>
            hereDOC;
            
        }

    echo "</div></section>";  
    include "inc/close.php"; 
    include "inc/footer.php";
    }
?>