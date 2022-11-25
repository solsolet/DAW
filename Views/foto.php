<?php  
    include "inc/devolver.php";
    $titulo = "Foto";
    $lista = 2;
    include "inc/cabecera.php";

    if($_GET){
        $sentencia = 'SELECT f.titulo as fitulo, a.titulo, f.fichero, p.nomPais, u.nomUsuario, f.alternativo, f.descripcion, DATE_FORMAT(f.fRegistro, "%d-%m-%Y") as fechaformato 
                      FROM `fotos` f, `paises` p, `albumes` a, `usuarios` u 
                      WHERE f.pais = idPais AND '.$id.' = idFotos AND album = idAlbum AND a.usuario = idUsuario';
        include "inc/conect.php";
        include "inc/request.php";

        $num = $resultado->num_rows;
        if($num == 0){
            $extra = '404';         
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');        
            header("Location: http://$host$uri/$extra");
            exit; 
        }

        while($fila = $resultado->fetch_assoc()) {
            /* width="272" height="108 */
            echo<<<hereDOC
                <section class="foto">
                    <img src={$fila['fichero']} alt={$fila['alternativo']} " width=30%> 
                    <h2>{$fila['fitulo']}</h2>
                    <h3>{$fila['descripcion']}</h3>
                    <p>Fecha: {$fila['fechaformato']}</p>
                    <p>País: {$fila['nomPais']}</p>
                    <p>Álbum: <a href="album/{$fila['nomUsuario']}/{$fila['titulo']}">{$fila['titulo']}</a></p>
                    <p>Usuario: <a href="perfil/{$fila['nomUsuario']}">{$fila['nomUsuario']}</a></p>
                </section>
            hereDOC;
            }
        }
    include "inc/close.php";
    include "inc/footer.php"
?>