<?php

    $usuario1 = 'usu1';
    $usuario2 = 'usu2';
    $usuario3 = 'usu3';
    $usuario4 = 'usu4';

    $contra1 = 'pass1';
    $contra2 = 'pass2';
    $contra3 = 'pass3';
    $contra4 = 'pass4';

    if((strcmp($_POST["usuario"],$usuario1) == 0 && strcmp($_POST["contra"],$contra1) == 0) || (strcmp($_POST["usuario"],$usuario2) == 0 && strcmp($_POST["contra"],$contra2) == 0)
        || (strcmp($_POST["usuario"],$usuario3) == 0 && strcmp($_POST["contra"],$contra3) == 0)  || (strcmp($_POST["usuario"],$usuario4) == 0 && strcmp($_POST["contra"],$contra4) == 0)){
        
       
            $extra = 'perfil.php?usu='.$_POST["usuario"]; 
        /* Redirecciona a una página diferente que se encuentra en el directorio actual */
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        
        header("Location: http://$host$uri/$extra");
        exit;        
    }
    else 
        /* Redirecciona a una página diferente que se encuentra en el directorio actual */
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php';
        header("Location: http://$host$uri/$extra");
        exit;

/*     echo "<p> Usuario: ". $_POST["usuario"]. "</p>" ; 
    echo "<p> Contraseña:" .$_POST["contra"]. "</p>"; //se pone el name   $_POST es una variable super global  

    echo "<p> Usuario:  {$_POST["usuario"]} </p>" ; 
    echo "<p> Contraseña: {$_POST["contra"]} </p>"; //se pone el name   $_POST es una variable super global  

    echo <<<hereDOC
    
    

hereDOC;

 */

//tiene que estar al principio de la línea, cuidado con los espacios tmabién y el tabulador
//se crea un template
?>

