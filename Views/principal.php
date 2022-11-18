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
            <article class="carta"><a href="foto/1"><img src="imagenes/rashito.jpeg" alt="El Rasho Macuin FIAUUUUUUUUU" ></a>
                <h3>Rayo Mqueen</h3>
                <p>01-11-2020</p>
                <p>EEUU</p>
            </article>
            <article class="carta"><a href="foto/2"><img src="imagenes/Mate_-_Cars_2.webp" alt="EL MATE FIAUUUUUUUUU"></a>
                <h3>Mate</h3>
                <p>04-12-1999</p>
                <p>EEUU</p>    
            </article>
            <article class="carta"><a href="foto/3"><img src="imagenes/sally.jpg" alt="LA SALLY FIAUUUUUUUUUU"></a>
                <h3>Sally</h3>
                <p>21-12-2021</p>
                <p>EEUU</p>
            </article>                       
            <article class="carta"><a href="foto/4"><img src="imagenes/copapiston.jpg" alt="LA COPA PISTÓN FIAUUUUUUUUU"></a>
                <h3>Copa Pistón</h3>
                <p>31-02-2007</p>
                <p>Internacional</p>
            </article>
            <article class="carta"><a href="foto/5"><img src="imagenes/francesco.jpg" alt="La Maquina Mas Blos, de TOTE ITALE FIAUUUUU"></a>
                <h3>Francesco Virgoarticleni</h3>
                <p>08-04-2014</p>
                <p>Italia</p>
            </article>
        </div>
    </section>
    
<?php
    include "inc/footer.php"
?>

