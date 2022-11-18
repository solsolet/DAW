<?php
    $titulo = "404";
    include "inc/registrado.php";
?>  
    <section class="aviso">                
        <h2>¡Aviso!</h2>
        <p class="aviso"><b>Usted no está registrado</b><br>
        para acceder al contenido de esta página tiene que hacer inicio de sesión o registrarse</p>
        <div>
        <a href="principal"><button class="btn">Página Principal</button></a>
        <a href="registro"><button class="btn">Registro</button></a>
        </div>
    </section> 
       
    <?php
    include "inc/footer.php"
?>