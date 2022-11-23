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
        while($fila = $resultado->fetch_assoc()) {
            /* width="272" height="108 */
            echo<<<hereDOC
                <section class="foto">
                    <img src={$fila['fichero']} alt={$fila['alternativo']} " width=30%> 
                    <h2>{$fila['fitulo']}</h2>
                    <h3>{$fila['descripcion']}</h3>
                    <p>Fecha: {$fila['fechaformato']}</p>
                    <p>País: {$fila['nomPais']}</p>
                    <a href="album/{$fila['nomUsuario']}/{$fila['titulo']}"<p>Álbum: {$fila['titulo']}</p></a>
                    <p>Usuario: {$fila['nomUsuario']}</p>
                </section>
            hereDOC;
            }
        }
    include "inc/close.php";
    include "inc/footer.php"
?>