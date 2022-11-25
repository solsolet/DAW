<?php
// Ejecuta una sentencia SQL
$sentencia = 'SELECT * FROM paises';
include "inc/conect.php";
include "inc/request.php";

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
else if($pagina == "misdatos"){
    while($fila = $resultado->fetch_assoc()) {
        echo '<option value='.$fila["nomPais"];
        if($fila['idPais'] == $fila1['pais']) 
            echo" selected = 'selected'";
        echo '>'.$fila["nomPais"].'</option>';
    }
}

echo '</select>';
?>
