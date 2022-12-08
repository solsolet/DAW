<?php

$titulo = "Darse de Baja";
$lista = 2;
include "inc/devolver.php";
include "inc/cabecera.php";
include "inc/conect.php";

?>  
    <!-- modal baja -->
    <section id="mbaja" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="acceso" method="post" >
                <header>
                    <h2>Confirmar baja</h2>
                    <a href="#" class="closebtn">×</a>
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
        <div class="par">
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
        </div>
        <!-- boton para modal baja -->
        <a href="baja#mbaja" class="btn">Darme de Baja</a>
    </section>
       
    <?php
    include "inc/footer.php"
?>