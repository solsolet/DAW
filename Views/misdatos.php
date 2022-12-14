<?php 
    include "inc/devolver.php";
    $titulo = "Mis Datos";
    $lista = 2;
    include "inc/cabecera.php";

    include "inc/conect.php";

    if(isset($_POST['borrar'])){       
        $sentencia = 'SELECT foto FROM usuarios WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
        include "inc/request.php";
        $fila1 = $resultado -> fetch_assoc();

        if($fila1['foto'] != "imagenes/predeterminado.jpg"){
            unlink($fila1['foto']);
            $sentencia = 'UPDATE `usuarios` SET foto = "imagenes/predeterminado.jpg" WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
            include "inc/request.php";
        }
        
    }


    if(isset($_POST['usuario'])){

        $sentencia = 'SELECT clave FROM usuarios WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
        include "inc/request.php";
        $contra = $resultado -> fetch_assoc();

        $sentencia = 'UPDATE `usuarios` SET nomUsuario = "'.$_POST['usuario'].'", 
                                            email = "'.$_POST['email'].'",
                                            ciudad = "'.$_POST['ciudad'].'",
                                            pais = '.$_POST['pais'].',
                                            fNacimiento = "'.$_POST['fdn'].'" ';

        if(isset($_POST['clave0']) && $_POST['clave0'] == $contra){
            if(isset($_POST['clave']) && isset($_POST['clave2']) && $_POST['clave'] == $_POST['clave2'] && $_POST['clave'] != "")
                $sentencia .= ', clave = "'.$_POST['clave'].'" ';
        }

        if(isset($_POST['genero'])){
            if($_POST['genero'] == "Hombre"){
                $gen = 0;
            }
            else if ($_POST['genero'] == "Mujer"){
                $gen = 1;
            }
            else if ($_POST['genero'] == "Otro")
                $gen = 2;

            $sentencia .= ', sexo = '.$gen.' ';
        }
        
        if(isset($_FILES['img']) && !isset($_POST['borrar']) && $_FILES['img']['error'] != 4) {
            $target_dir = "imagenes/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $subidaOk = true;
            $msg = "<p>";

            // Check if file already exists
            if (file_exists($target_file)) {
                $msg .= "Esta imagen ya existe<br>";
                $subidaOk = false;
            }
            // Check if error
            if ($subidaOk == false)
                $msg .= "Lo sientimos, no se ha podido subir la imagen";
            else {
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
                    $msg .= "El archivo ". htmlspecialchars( basename( $_FILES["img"]["name"])). " se ha subido";
                    $sentencia .= ', foto = "imagenes/'.$_FILES['img']['name'].'" ';
                }
                else 
                    $msg .= "Lo sentimos, ha habido un error en la subida del archivo";
            }
            $msg .= "</p>";
            echo $msg;
            //print_r($_FILES);
        }
           

        $sentencia .= 'WHERE nomUsuario = "'.$_SESSION['usuario'].'"';

        
        include "inc/request.php";
        $_SESSION['usuario'] = $_POST['usuario'];

        echo "<h1>Datos Actualizados</h1>";
    }

    $sentencia = 'SELECT * FROM usuarios WHERE nomUsuario = "'.$_SESSION['usuario'].'" ';
    include "inc/request.php";
    $fila1 = $resultado -> fetch_assoc();
    $num = $resultado->num_rows;
    
    if($num > 0){
?>  
    <section>
        <h2>Mis Datos</h2>
        <form method="POST" enctype="multipart/form-data">
                <label for="usuario">Usuario:</label> <input type="text" name="usuario" id="usuario" value="<?=$fila1['nomUsuario']?>">
                <label for="clave0">Contraseña Actual:</label> <input type="password" name="clave0" id="clave0">
                <label for="clave">Nueva Contraseña:</label> <input type="password" name="clave" id="clave">
                <label for="clave2">Repetir nueva contraseña:</label> <input type="password" name="clave2" id="clave2" >
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
                <label for="img" class="file">Elige otra foto</label> <input value=<?=$fila1['foto']?> type="file" id="img" name="img" accept="imagenes/*"  >
                <label for="borrar">Borrar Foto de Perfil:   <input type="checkbox" name="borrar" id="borrar" ></label>
                <input type="submit" value="Cambiar Datos" class="btn" id="pulsame">   
        </form>
    </section>
        
<?php
    }
    include "inc/footer.php";
?>