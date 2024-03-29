<?php
    $titulo = "Tus Fotos";
    $lista = 2;
    include "inc/devolver.php";
    include "inc/cabecera.php";
    include "inc/conect.php";
?>  
    <section>                
        <h2>Estas son tus fotos</h2>
        
        <?php
        $sentencia = 'SELECT DISTINCT f.idFotos, f.fichero, f.alternativo, p.nomPais, f.titulo, a.titulo as atitulo, DATE_FORMAT(f.fRegistro, "%d-%m-%Y") as fechaformato
        FROM `fotos` f, `usuarios` u, `albumes` a, `paises` p
        WHERE "'.$_SESSION['usuario'].'" = u.nomUsuario AND u.idUsuario = a.usuario AND a.idAlbum = f.album AND p.idPais = f.pais';
        include "inc/request.php";
        
        $num = $resultado->num_rows;
        if($num > 0){
            echo '<div class="image-grid"> <!-- podriem llevalo posant per damunt un main o algo del section-->';
            while($fila = $resultado->fetch_assoc() ) {
                echo<<<hereDOC

                <article class="carta"><a href="foto/{$fila['idFotos']}"><img src={$fila['fichero']} alt={$fila['alternativo']}></a>
                    <h3>{$fila['titulo']}</h3>
                    <p>{$fila['fechaformato']}</p>
                    <p>{$fila['nomPais']}</p>
                    <p>Álbum: <a href="album/{$_SESSION['usuario']}/{$fila['atitulo']}">{$fila['atitulo']}</a></p>
                </article>
                
                hereDOC;
            }
            echo '</div>';
        }
        else {
            echo '<p class="aviso">No tienes ninguna foto, puedes añadir tu primera foto <a href="afalbum">aquí</a></p>';
        }
        
        ?>        
        
    </section> 
       
    <?php
    include "inc/close.php";
    include "inc/footer.php";
?>