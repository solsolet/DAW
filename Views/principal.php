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
        <form action="acceso" method="post" >
            <header>
                <h2>Login</h2>
                <a href="#" class="closebtn">×</a>
            </header>
            <fieldset>
                <?php if(!isset($_COOKIE['usuario_login'])){
                echo<<<hereDOC
                    <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario" class="label label-usu">
                    <label for="clave">Contraseña:</label> <input type="password" name="contra" id="clave" class="label label-pass">
                    <!-- recordarme cookie -->
                    <label for="remember"> <input type="checkbox" name="remember" id="remember" > Recordarme en este equipo</label>
                    <input type="submit" value="Entrar" class="btn" id="pulsame" name="login">
                hereDOC;
                }
                else{
                echo<<<hereDOC
                    <p class="aviso">Hola de vuelta, {$_COOKIE['usuario_login']}, su última <br>
                    visita fue el {$_COOKIE['ultimafecha']} a las {$_COOKIE['ultimahora']}</p>                    
                    <input type="submit" value="Entrar" class="btn" id="pulsame" name="pulsame">
                    <button value="Salir" class="btn" formaction="salida">Salir</button>  
                hereDOC;
                }
                ?>
                
            </fieldset>
        </form>
        </div>
    </div>
    </section>

    <!--Modal de foto-->
    <section id="consejo" class="modal">
        <div class="modal-dialog">
            <div class="consejo modal-content">
                <header>
                    <h2>Consejo Fotográfico</h2>
                    <a href="#" class="closebtn">×</a>
                </header>
                <fieldset>
                    <?php                
                    $json = file_get_contents('inc/consejos.json');
                    $json_data = json_decode($json,true);       
                    $r = rand(0,2);

                    echo<<<hereDOC
                        <p>Categoría: {$json_data['Consejos'][$r]['Categoría']}</p>
                        <p>Dificultad: {$json_data['Consejos'][$r]['Dificultad']}</p>
                        <p>Consejo: {$json_data['Consejos'][$r]['Consejo']}</p>
                    hereDOC;                    
                    ?>                    
                </fieldset>            
            </div>
        </div>
    </section>

    <section>
        <a href="#mlogin" class="btn" id="log">Loguearse</a>
    </section>

    <section>
        <h2>Foto Destacada</h2>
        <div class="image-grid2">
        <?php
        $file = file_get_contents("inc/escogida.txt");
        $filex = explode("idFoto", $file);
        $r = rand(1,4);
        $filexx = explode(PHP_EOL, $filex[$r]);
        
        $sentencia = 'SELECT *, DATE_FORMAT(fRegistro, "%d-%m-%Y") as fechaformato FROM `fotos`, `paises` WHERE idFotos = '.$filexx[0].' AND pais = idPais';
        include "inc/request.php";
        $fila = $resultado -> fetch_assoc();
        echo<<<hereDOC

        <article class="carta"><a href="foto/{$fila['idFotos']}"><img src={$fila['fichero']} alt={$fila['alternativo']}></a>
            
        </article>
        <article class="carta">
            <h3>{$fila['titulo']}</h3>
            <p>{$fila['fechaformato']}</p>
            <p>{$fila['nomPais']}</p>
            <h4>Ficha del crítico</h4>
            <p>Crítico: {$filexx[1]}</p>
            <p>Crítica: {$filexx[2]}</p>
        </article>
        
        hereDOC;
        ?>
        </div>
    </section>

    <section>
        <a href="#consejo" class="btn" id="log">Consejo Fotográfico</a>        
    </section>

    <section>    
         <!-- modal login -->
                  
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

