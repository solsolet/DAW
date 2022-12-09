<?php
    include "inc/devolver.php";
    $titulo = "Añadir foto";
    $lista = 2;
    include "inc/cabecera.php";
    include "inc/conect.php";

    if(isset($_POST['titulo']) && ($_POST['alternativo'] != "foto" || $_POST['alternativo'] != "imagen") && $_POST['img'] != ""){
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
        $data = array(
            "imagen",
            "i have n ikee shoes",
            "i have nikeeshoes",
            "i sell i-phone casings",
            "i sell iphone-casings",
            "you can have iphone",
            "rapiD Garment factor",
            "rosNIK Electronics",
            "Buy you self N I K E",
            "B*U*Y I*P*H*O*N*E BABY",
            "My Phone Is not available");


        print_r("a");
        if(preg_match($expT, $_POST['alternativo']) == 0 || filter_var($_POST['alternativo'], FILTER_SANITIZE_STRING, $data)){
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