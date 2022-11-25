<?php
    include "inc/devolver.php";
    
    if(!isset($usu)){
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'avisonousu';
        header("Location: http://$host$uri/$extra");
        exit;
    }

    $titulo = "Perfil";
    $lista = 2;
    include "inc/cabecera.php";
?>  

    <section>       
        <h2>Las últimas fotos</h2>
        <div> <!-- podriem llevalo posant per damunt un main o algo del section-->
            <article class="carta">
                <h3><?=$usu?></h3>
                <?php
                $sentencia = 'SELECT *, DATE_FORMAT(fRegistro,"%d-%m-%Y") as fechaformato 
                FROM `usuarios` u, `paises` p
                WHERE u.nomUsuario = "'.$usu.'" AND p.idPais = u.pais';
                include "inc/conect.php";
                include "inc/request.php";
                $fila1 = $resultado->fetch_assoc();
                echo<<<hereDOC
                <img src={$fila1['foto']} width=20%>
                <p>Fecha incorporación: {$fila1['fechaformato']}</p>                 
                hereDOC;

                $sentencia = 'SELECT * FROM `albumes`, `usuarios` WHERE "'.$usu.'" = nomUsuario AND usuario=idUsuario';
                include "inc/request.php";
                $num = $resultado->num_rows;
        
                if($num > 0){
                    echo "<h3>Álbumes</h3><div class='image-grid'>";
                    while($fila = $resultado->fetch_assoc() ) {
                        echo<<<hereDOC
                        <article class="carta"><a href="album/{$usu}/{$fila['titulo']}">
                            <h3>{$fila['titulo']}</h3>
                            <p>{$fila['descripcion']}</p>
                        </a></article>
                        
                        hereDOC;
                    }
                    echo "</div>";
                }
                else {                    
                    $extra = '404';         
                    $host = $_SERVER['HTTP_HOST'];
                    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');        
                    header("Location: http://$host$uri/$extra");
                    exit;                    
                }
                ?>
            </article>
        </div>
    </section>
    
    <?php
    include "inc/close.php";
    include "inc/footer.php"

?>