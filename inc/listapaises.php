<?php
// Ejecuta una sentencia SQL
$sentencia = 'SELECT * FROM paises';
include "inc/conect.php";

echo '<label for="pais">Pa&iacute;s:</label>
        <select name="pais" id="pais">
        <option value="vacio">Vacío</option>';    


if($pagina == "registro"){
    while($fila = $resultado->fetch_assoc()) {
        echo '<option value='.$fila["nomPais"];
        if(($bool == true && isset($_GET["pais"])) && strcmp($_GET["pais"],$fila["nomPais"]) == 0) 
            echo" selected = 'selected'";
        echo '>'.$fila["nomPais"].'</option>';
    }
}
else if ($pagina == "salbum"){
    while($fila = $resultado->fetch_assoc()) 
    echo '<option value='.$fila["nomPais"].' >'.$fila["nomPais"].'</option>';
}
    
echo '</select>';
?>
