<?php

    include "inc/devolver.php";
    include "inc/conect.php";
    if(isset($_POST['estilo'])){
        
        $_SESSION['estilo'] = $_POST['estilo'];

        $sentencia = 'SELECT idEstilo FROM estilos WHERE fichero = "'.$_POST['estilo'].'"';
        include "inc/request.php";
        $estil = $resultado -> fetch_assoc();

        $sentencia = 'UPDATE usuarios SET estilo = '.$estil['idEstilo'].' WHERE nomUsuario = "'.$_SESSION['usuario'].'"';
        include "inc/request.php";  
        if(isset($_COOKIE['usuario_login']))
            $_COOKIE['estilo'] = $_POST['estilo'];
    }

    $titulo = "Configuración";
    $lista = 2;
    include "inc/cabecera.php";   
    
    // Ejecuta una sentencia SQL
    $sentencia = 'SELECT * FROM estilos';
    include "inc/conect.php";
    include "inc/request.php";
    echo '<h2>Configuración</h2><section><form method="POST"><label>Estilo</label>
        <select name="estilo" id="estilo">';   
    
    while($fila = $resultado->fetch_assoc()) {
    
        echo '<option value='.$fila["fichero"]; 
        if(isset($_SESSION['estilo']) && (strcmp($_SESSION["estilo"],$fila["fichero"]) == 0))
            echo ' selected = "selected"';
            
        echo '>'.$fila["nombre"].'</option>';
    }
echo '<input type="submit" value="Configurar" class="btn" id="pulsame" name="estil">
    </select></form></section>';
    include "inc/close.php";
    include "inc/footer.php"
?>