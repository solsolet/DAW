<?php 
    $bool = false;

    $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    if(isset($_GET['mensaje'])){
        $bool = true; 
    }   
    $titulo = "Registro";
    $lista = 3;
    include "inc/cabecera.php";

if($bool == true){
    echo<<<hereDOC
    <section id="mlogin" class="modal3">
    <div class="modal-dialog">
    <div class="modal-content">
                <h2>Fallos en el registro</h2>          
            <fieldset class="blanco">
                <p>{$_GET['mensaje']}</p>
            </fieldset>        
    </div>
    </div>
    </section>
    hereDOC;
}
?>  
    <section>
        <h2>Registro</h2>
        <form method="post" action="regnuevo?pasado=true" enctype="multipart/form-data">
                <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario" <?php if($bool == true && isset($_GET['usu'])) echo"value = {$_GET['usu']}"?>>
                <label for="clave">Contraseña:</label> <input type="password" name="clave" id="clave" <?php if($bool == true && isset($_GET['clv'])) echo"value = {$_GET['clv']}"?>>
                <label for="clave2">Repetir contraseña:</label> <input type="password" name="clave2" id="clave2" <?php if($bool == true && isset($_GET['clv2'])) echo"value = {$_GET['clv2']}"?>>
                <label for="email">Email:</label> <input type="text" name="email" id="email" <?php if($bool == true && isset($_GET['email'])) echo"value = {$_GET['email']}"?>>
                <div>
                    <label>Género:</label> <br>
                    <input type="radio" id="generoh" name="genero" value="Hombre" <?php if(($bool == true && isset($_GET['gen'])) && strcmp($_GET['gen'],"Hombre") == 0) echo"checked = 'checked'"?>>
                        <label for="generoh">Hombre</label>
                    <input type="radio" id="generom" name="genero" value="Mujer" <?php if(($bool == true && isset($_GET['gen'])) && strcmp($_GET['gen'],"Mujer") == 0) echo"checked = 'checked'"?>>
                        <label for="generom">Mujer</label> 
                    <input type="radio" id="generoo" name="genero" value="Otro" <?php if(($bool == true && isset($_GET['gen'])) && strcmp($_GET['gen'],"Otro") == 0) echo"checked = 'checked'"?>>
                        <label for="generoo">Otro</label>
                </div>

                <label for="fdn">Fecha de nacimiento:</label> <input type="date" name="fdn" id="fdn" <?php if($bool == true && isset($_GET['fdn'])) echo"value = {$_GET['fdn']}"?>>
                <label for="ciudad">Ciudad:</label> <input type="text" name="ciudad" id="ciudad"  <?php if($bool == true && isset($_GET['ciu'])) echo"value = {$_GET['ciu']}"?>>
                <?php $pagina = "registro"; include "inc/listapaises.php"; ?>
                <label for="img">Foto:</label>
                <label for="img" class="file">Elige una foto</label> <input type="file" id="img" name="img" accept="image/*"  >
                
                <input type="submit" value="Registrar" class="btn" id="pulsame" name="registro">   
        </form>
    </section>
        
<?php
    include "inc/footer.php";
?>