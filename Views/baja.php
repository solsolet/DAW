<?php

$titulo = "Darse de Baja";
$lista = 2;
include "inc/devolver.php";
include "inc/cabecera.php";
include "inc/conect.php";

if(isset($_POST['contra'])){

    //borrar usu y salir
    $sentencia = 'SELECT * FROM `usuarios` WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
    include "inc/request.php";
    
    $usu = $resultado->fetch_assoc();
    
    if($usu['clave'] == $_POST['contra']){

        //borramos las fotos de la BD
        $sentencia = 'SELECT * FROM `usuarios`,`fotos`,`albumes` WHERE idUsuario = usuario AND album = idAlbum AND nomUsuario = "'.$_SESSION['usuario'].'"';
        include "inc/request.php";

        while($foto = $resultado -> fetch_assoc()) {
            if($foto['fichero'] != "imagenes/predeterminado.jpg")
                unlink($foto['fichero']);
        }

        if($foto['foto'] != "imagenes/predeterminado.jpg")
            unlink($foto['foto']);

        $sentencia = 'DELETE FROM `usuarios` WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
        include "inc/request.php";
        include "inc/close.php";
        include "salida.php";
    } 
    else{
        echo<<<hereDOC
        <section id="minco" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="post" > <!-- quitar acceso? -->
                <header>
                    <h2>Contraseña incorrecta</h2>
                    <a href="inco#" class="closebtn">×</a>
                </header>
                <fieldset>
                    <p>Contraseña incorrecta</p>   
                </fieldset>
            </form>
            </div>
        </div>
    </section>
    hereDOC;
    }
}

?>

    <!-- modal baja -->
    <section id="mbaja" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="post" > <!-- quitar acceso? -->
                <header>
                    <h2>Confirmar baja</h2>
                    <a href="baja#" class="closebtn">×</a>
                </header>
                <fieldset>
                    <p>Introduzca su contraseña para confirmar la baja en PI</p>
                    <label for="clave">Contraseña:</label> <input type="password" name="contra" id="clave" class="label label-pass">
                    <input type="submit" value="Confirmar" class="baja btn" id="pulsame" name="login">                    
                </fieldset>
            </form>
            </div>
        </div>
    </section>

    <section>       
        <h2>Darse de baja</h2>
        <h3>¿Está seguro que quiere darse de baja?</h3>
        <p>Todos los datos asociados a su perfil serán eliminados de PI, y no podrán ser recuperados. Entre los datos se incluye toda la información referente a su perfil, álbumes, fotos...</p>
        <article class="carta">
            <h3><?=$_SESSION['usuario']?></h3>
            <?php
                $sentencia = 'SELECT * FROM `usuarios` u, `paises` p WHERE u.nomUsuario = "'.$_SESSION['usuario'].'" AND p.idPais = u.pais';
                include "inc/conect.php";
                include "inc/request.php";
                $fila = $resultado->fetch_assoc();
                if(isset($_SESSION['hora']) && isset($_SESSION['fecha']))
                    echo<<<hereDOC
                    <img src={$fila['foto']} width=20%>          
                    <p>{$fila['nomPais']}</p>
                    hereDOC;
            ?> 
        </article>
        <h4>Álbumes:</h4>
        <?php
        //muestra lista de albumes asociados al usuario + nº de fotos x album
        $sentencia = 'SELECT a.*, count(idFotos) as nfotos FROM `albumes` as a, `usuarios`, `fotos`
                        WHERE "'.$_SESSION['usuario'].'" = nomUsuario AND usuario=idUsuario AND idAlbum=album';
        include "inc/request.php";
        
        $num = $resultado->num_rows;
        $tfotos = 0;
        
        if($num > 0){
            echo "<div class='image-grid'>";
            while($fila = $resultado->fetch_assoc() ) {
                echo<<<hereDOC
                <article class="carta"><a href="album/{$_SESSION['usuario']}/{$fila['titulo']}">
                    <h3>{$fila['titulo']}</h3>
                    <h4>Nº fotos: {$fila['nfotos']}</h4>
                </a></article>
                hereDOC;
                $tfotos += $fila['nfotos'];
            }
            echo "</div>";
        }
        else
            echo "<p class='aviso'>No tienes álbumes</p>";
        
        //Total fotos
        if($tfotos > 0)
            echo "<h4>Total de fotos: {$tfotos}</h4>";
        else
            echo "<p class='aviso'>No tienes fotos</p>";
        ?>

        <!-- boton para modal baja -->
        <a href="baja#mbaja" class="btn">Darme de Baja</a>
    </section>
       
    <?php
    include "inc/footer.php"
?>