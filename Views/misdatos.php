<?php 
    include "inc/devolver.php";
    $titulo = "Mis Datos";
    $lista = 2;
    include "inc/cabecera.php";

    include "inc/conect.php";
    $sentencia = 'SELECT * FROM usuarios WHERE nomUsuario = "'.$_SESSION['usuario'].'" ';
    include "inc/request.php";
    $fila1 = $resultado -> fetch_assoc();

    $num = $resultado->num_rows;
    if($num > 0){
?>  
    <section>
        <h2>Mis Datos</h2>
        <form method="post">
                <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario" value="<?=$fila1['nomUsuario']?>">
                <label for="email">Email:</label> <input type="email" name="email" id="email" value="<?=$fila1['email']?>">
                <div>
                    <label>Género:</label> <br>
                    <input type="radio" id="generoh" name="genero" value="Hombre" <?php if($fila1['sexo'] == 0) echo"checked = 'checked'"?>>
                        <label for="generoh">Hombre</label>
                    <input type="radio" id="generom" name="genero" value="Mujer" <?php if($fila1['sexo'] == 1) echo"checked = 'checked'"?>>
                        <label for="generom">Mujer</label> 
                    <input type="radio" id="generoo" name="genero" value="Otro" <?php if($fila1['sexo'] == 2) echo"checked = 'checked'"?>>
                        <label for="generoo">Otro</label>
                </div>

                <label for="fdn">Fecha de nacimiento:</label> <input type="date" name="fdn" id="fdn" value="<?=$fila1['fNacimiento']?>">
                <label for="ciudad">Ciudad:</label> <input type="text" name="ciudad" id="ciudad"  value="<?=$fila1['ciudad']?>">
                <?php $pagina = "misdatos"; include "inc/listapaises.php"; ?>
                <label for="img">Foto: </label><div class="aviso"><img src=<?=$fila1['foto']?> width=50%></div><br>
                <label for="img" class="file">Elige otra foto</label> <input type="file" id="img" name="img" accept="image/*"  >
                
                <input type="submit" value="Cambiar Datos" class="btn" id="pulsame">   
        </form>
    </section>
        
<?php
    }
    include "inc/footer.php";
?>