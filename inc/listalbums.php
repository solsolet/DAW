<?php
// Ejecuta una sentencia SQL
$sentencia = 'SELECT * FROM albumes, usuarios WHERE usuario=idUsuario AND "'.$_SESSION['usuario'].'"=nomUsuario ';
include "inc/conect.php";
include "inc/request.php";

echo '<label for="albums">Álbum:</label>
        <select name="albums" id="albums">
        <option value="vacio">Vacío</option>';    

        while($fila = $resultado->fetch_assoc()) {
            echo '<option value='.$fila["titulo"];
            if(isset($nombre) && strcmp($nombre,$fila["titulo"]) == 0) 
                echo" selected = 'selected'";
            echo '>'.$fila["titulo"].'</option>';
        }

echo '</select>';
?>
