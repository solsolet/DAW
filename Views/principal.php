<?php

$url = explode("/",$_SERVER['QUERY_STRING']);    
$titulo = "Principal";
include "inc/registrado.php";

function salir(){
        $extra = 'salida';         
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');        
        header("Location: http://$host$uri/$extra");
        exit;
}
include "inc/conect.php";

    /* print_r("a");
    if(isset($_POST["pulsame"])) { //en post se usa el nombre no el id entre []
        if(!empty($_POST["remember"])){
            if(isset($_COOKIE['usuario_login'])){
                setcookie("usuario_login", $_POST["usuario"], time()+ 60*60*24*90);
                setcookie("contra", $_POST["contra"], time()+ 60*60*24*90); //hace falta la contraseña (los pibes del video lo hacen así)?
            }
            else {
                setcookie("usuario_login", $_COOKIE["usuario_login"], time()+ 60*60*24*90);
                setcookie("contra", $_COOKIE["contra"], time()+ 60*60*24*90); 
            }
        }
        else { //destruye la cookie
            if(isset($_COOKIE["usuario_login"]))
                setcookie("usuario_login", "", time()-60*60*24*30);
            if(isset($_COOKIE["contra"]))
                setcookie("contra", "", time()-60*60*24*30);
        }
    } */   
    
?>  

    <!--Modal-->
    <section id="mlogin" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="acceso" method="post">
            <header>
                <h2>Login</h2>
                <a href="#" class="closebtn">×</a>
            </header>
            <fieldset>
                <?php if(!isset($_COOKIE['usuario_login'])){
                echo<<<hereDOC
                    <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario" required class="label label-usu">
                    <label for="clave">Contraseña:</label> <input type="password" name="contra" id="clave" required class="label label-pass">
                    <!-- recordarme cookie -->
                    <label for="remember"> <input type="checkbox" name="remember" id="remember" > Recordarme en este equipo</label>
                    <input type="submit" value="Entrar" class="btn" id="pulsame" name="pulsame">
                hereDOC;
                }
                else{
                echo<<<hereDOC
                    <p class="aviso">Hola de vuelta, {$_COOKIE['usuario_login']}, su última <br>
                    visita fue el {$_COOKIE['ultimafecha']} a las {$_COOKIE['ultimahora']}</p>                    
                    <input type="submit" value="Entrar" class="btn" id="pulsame" name="pulsame">
                    <button value="Salir" class="btn"  formaction="salida">Salir</button>
                    
                hereDOC;
                }
                ?>
                
            </fieldset>
        </form>
        </div>
    </div>
    </section>

    <section>    
        <a href="#mlogin" class="btn" id="log">Loguearse</a> <!-- modal login -->
                  
        <h2>Las últimas fotos</h2>
        <div class="image-grid"> <!-- podriem llevalo posant per damunt un main o algo del section-->
        <?php
        $sentencia = 'SELECT *, DATE_FORMAT(fRegistro, "%d-%m-%Y") as fechaformato FROM `fotos`, `paises` WHERE pais = idPais order by fRegistro DESC';
        include "inc/request.php";
        
        $i = 0;
        while($i < 5 && $fila = $resultado->fetch_assoc() ) {
            echo<<<hereDOC

            <article class="carta"><a href="foto/{$fila['idFotos']}"><img src={$fila['fichero']} alt={$fila['alternativo']}></a>
                <h3>{$fila['titulo']}</h3>
                <p>{$fila['fechaformato']}</p>
                <p>{$fila['nomPais']}</p>
            </article>
            
            hereDOC;
            $i=$i+1;
        }
        ?>        
        </div>
    </section>
    
<?php
    include "inc/close.php"; 
    include "inc/footer.php"
?>

