<?php
    include "inc/devolver.php";
    $titulo = "Añadir foto";
    $lista = 2;
    include "inc/cabecera.php";
    include "inc/conect.php";

    if(isset($_POST['titulo']) && ($_POST['alternativo'] != "foto" || $_POST['alternativo'] != "imagen") && $isset($_FILES['img']) && $_FILES['img']['error'] != 4){
        
        $target_dir = "imagenes/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $subidaOk = true;
        $msg = "<p>";

        // Checkea si existe (img con mismo nombre)
        if (file_exists($target_file)) {
            $msg .= "Esta imagen ya existe<br>";
            $subidaOk = false;
        }
        // Check if error
        if ($subidaOk == false)
            $msg .= "Lo sientimos, no se ha podido subir la imagen";
        else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file))
                $msg .= "El archivo ". htmlspecialchars( basename( $_FILES["img"]["name"])). " se ha subido";
            else 
                $msg .= "Lo sentimos, ha habido un error en la subida del archivo";
        }
        $msg .= "</p>";
        echo $msg;
        //print_r($_FILES);
        
        if($_POST['pais'] == "vacio"){            
            $pa = 4;
        }
        else {
            $sentencia = 'SELECT idPais FROM paises WHERE nomPais = "'.$_POST['pais'].'"';
            include "inc/request.php";
            $pais = $resultado -> fetch_assoc();
            $pa = $pais['idPais'];
        }        
        
        $sentencia = 'SELECT idAlbum FROM albumes WHERE titulo = "'.$_POST['albums'].'"';
        include "inc/request.php";
        $album = $resultado -> fetch_assoc();
        
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $expT = "/^.{10,}$/";
        
        
        if(preg_match($expT, $_POST['alternativo']) == 0 || str_contains($_POST['alternativo'],"imagen") || str_contains($_POST['alternativo'],"foto")
                        || str_contains($_POST['alternativo'],"alternativo") || str_contains($_POST['alternativo'],"texto")){
            echo<<<hereDOC
            <section id="mlogin" class="modal3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h2>Fallos en la subida</h2>          
                        <fieldset>
                            <p>Formato de texto alternativo incorrecto.</p>
                        </fieldset>        
                    </div>
                </div>
            </section>
            hereDOC;
        }
        else{
            $sentencia = 'INSERT into fotos(titulo, descripcion, fecha, pais, album, fichero, alternativo, fRegistro)
            values ("'.$_POST['titulo'].'", "'.$_POST['descripcion'].'", "'.$_POST['fecha'].'", 
            '.$pa.', '.$album['idAlbum'].', "imagenes/'.$_POST['img'].'", "'.$_POST['alternativo'].'", "'.$fecha.' '.$hora.'")';

            include "inc/request.php";

            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'album/'.$_SESSION['usuario'].'/'.$_POST['albums'].'';
            header("Location: http://$host$uri/$extra");
            exit;
        }
    }

?>

<section>
    <h2>Añadir foto a álbum</h2>
    <form method="post" >
        <fieldset>
            <label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo" required><br>
            <label for="descripcion">Descripción:</label> <input type="text" name="descripcion" id="descripcion"><br>
            <label for="fecha">Fecha:</label> <input type="date" name="fecha" id="fecha"><br>
            <?php $pagina = "salbum"; include "inc/listapaises.php"; ?><br>
            <label for="img">Foto:</label>
            <label for="img" class="file">Elige una foto</label> <input type="file" id="img" name="img" accept="image/*">
            <?php   include "inc/listalbums.php"; ?><br>
            <label for="alternativo">Texto Alternativo:</label> <input type="text" name="alternativo" id="alternativo"><br>
            <input type="submit" value="Añadir" class="btn">
        </fieldset>
    </form>
</section>

<?php
    include "inc/close.php"; 
    include "inc/footer.php";
?>