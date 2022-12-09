<?php
    include "inc/devolver.php";
    $titulo = "Nuevo Álbum";
    $lista = 2;
    include "inc/cabecera.php";

    if(isset($_POST['titulo'])){
        $sentencia = 'SELECT idUsuario FROM usuarios WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
        include "inc/conect.php";
        include "inc/request.php";

        $usu = $resultado -> fetch_assoc();

        $sentencia = 'INSERT into `albumes` (`titulo`, `descripcion`, `usuario`) values ("'.$_POST['titulo'].'","'.$_POST['descrip'].'","'.$usu['idUsuario'].'")';
        include "inc/request.php";

        echo <<< hereDOC
        <section id="subir" class="modal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="afalbum/{$_POST['titulo']}"> <!-- quitar acceso? -->
                        <header>
                            <h2>¿Quiere añadir una foto a su nuevo álbum?</h2>
                            <a href="subir#" class="closebtn">×</a>
                        </header>
                        <fieldset>
                            <p>Podrá añadir una foto a su nuevo álbum {$_POST['titulo']}</p>
                            <input type="submit" value="Subir foto al álbum" class="btn" id="pulsame" name="pulsame">
                            <button value="Ver álbumes" class="btn" formaction="albumes">Ver álbumes</button>                    
                        </fieldset>
                    </form>
                </div>
            </div>
         </section>
        hereDOC;
    }

?>  

    <section>
    <h2>Crear álbum</h2>
    <form method="post">
        <label for="titulo">Título:</label> <input type="text" name="titulo" id="titulo" required class="label label-usu">
        <label for="descrip">Descripción:</label> <input type="text" name="descrip" id="descrip" required class="label label-pass">
        <input type="submit" value="Crear Álbum" class="btn" id="crearA">
    </form>
    </section>

    <?php
    include "inc/footer.php"
?>