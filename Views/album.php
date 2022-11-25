<?php

    include "inc/devolver.php";
    $titulo = "Álbum";
    $lista = 2;
    include "inc/cabecera.php";
    include "inc/conect.php"; 
    if(isset($nombre)){
        echo "<section>";
            echo "<h2>".$nombre[1]."</h2>";
            //la f.fecha es la de la foto o la de registro??
            $sentencia = 'SELECT a.descripcion, COUNT(*) as total, MIN(DATE_FORMAT(f.fecha,"%d-%m-%Y")) as ultima, MAX(DATE_FORMAT(f.fecha,"%d-%m-%Y")) as primera
                FROM `albumes` a, `fotos` f, `usuarios` u
                WHERE a.titulo = "'.$nombre[1].'" AND "'.$nombre[0].'" = u.nomUsuario AND u.idUsuario = a.usuario AND a.idAlbum = f.album ';
            include "inc/request.php";
            //muestra datos
            $fila = $resultado->fetch_assoc();
            if($fila['total'] == 0){
                $extra = '404';         
                $host = $_SERVER['HTTP_HOST'];
                $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');        
                header("Location: http://$host$uri/$extra");
                exit; 
            }
            echo<<<hereDOC
                <h3>{$fila['total']} fotos</h3>
                <h4>{$fila['descripcion']}</h4>
                <p>De {$fila['ultima']} al {$fila['primera']}</p>
            hereDOC;    

            //para sacar paises
            $sentencia = 'SELECT DISTINCT *
            FROM `albumes` a, `fotos` f, `usuarios` u, `paises` p
            WHERE a.titulo = "'.$nombre[1].'" AND "'.$nombre[0].'" = u.nomUsuario AND u.idUsuario = a.usuario AND a.idAlbum = f.album 
                AND f.pais = idPais';
            include "inc/request.php";
            echo "<p>";
            while($fila = $resultado->fetch_assoc() ) {
                echo "{$fila['nomPais']} ";
            }
            echo "</p>"; //posar + bonico
            //muestra fotos
            echo "<div class='image-grid'>";
            
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

        //si l'usuari que entra al album es el propietari
        if($nombre[0] == $_SESSION['usuario']){
            debug("printeame un botón to guapo");
            echo '<a href="afalbum/'.$nombre[1].'" class="btn">Añadir foto a álbum</a>';
        }

        include "inc/close.php"; 
        include "inc/footer.php";
    }
?>