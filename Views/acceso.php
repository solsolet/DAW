<?php
    $usuario1 = 'javi1';
    $usuario2 = 'javi2';
    $usuario3 = 'javi3';
    $usuario4 = 'javi4';

    $contra1 = 'pass1';
    $contra2 = 'pass2';
    $contra3 = 'pass3';
    $contra4 = 'pass4';

    $fecha = date("m/d/y");
    $hora = date("H:i:s");
    $tiempo = time()+ 60*60*24*90;

    if(isset($_COOKIE['usuario_login'])){
        if((strcmp($_COOKIE['usuario_login'],$usuario1) == 0 && strcmp($_COOKIE['contra'],$contra1) == 0) || (strcmp($_COOKIE['usuario_login'],$usuario2) == 0 && strcmp($_COOKIE['contra'],$contra2) == 0)
        || (strcmp($_COOKIE['usuario_login'],$usuario3) == 0 && strcmp($_COOKIE['contra'],$contra3) == 0)  || (strcmp($_COOKIE['usuario_login'],$usuario4) == 0 && strcmp($_COOKIE['contra'],$contra4) == 0)){
        
        setcookie("ultimafecha",$fecha, $tiempo);
        setcookie("ultimahora", $hora, $tiempo);

        if(strcmp($_POST["usuario"],$usuario1) == 0 && strcmp($_POST["contra"],$contra1) == 0)
            $estilo = "estilo";
        else if(strcmp($_POST["usuario"],$usuario2) == 0 && strcmp($_POST["contra"],$contra2) == 0)
            $estilo = "oscuro";
        else if(strcmp($_POST["usuario"],$usuario3) == 0 && strcmp($_POST["contra"],$contra3) == 0)
            $estilo = "grande";
        else if(strcmp($_POST["usuario"],$usuario4) == 0 && strcmp($_POST["contra"],$contra4) == 0)
            $estilo = "contrastegrande";
        
        session_start();
        $_SESSION['estilo'] = $estilo;

        $extra = 'perfil/'.$_COOKIE["usuario_login"];         
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');        
        header("Location: http://$host$uri/$extra");
        exit;  
        }
    }
    if(isset($_POST['usuario'])){
        if((strcmp($_POST["usuario"],$usuario1) == 0 && strcmp($_POST["contra"],$contra1) == 0) || (strcmp($_POST["usuario"],$usuario2) == 0 && strcmp($_POST["contra"],$contra2) == 0)
            || (strcmp($_POST["usuario"],$usuario3) == 0 && strcmp($_POST["contra"],$contra3) == 0)  || (strcmp($_POST["usuario"],$usuario4) == 0 && strcmp($_POST["contra"],$contra4) == 0)){
            echo"<h1>hola</h1>";            
           
            if(isset($_POST["remember"])){
                
                if(!isset($_COOKIE['usuario_login'])){
                    setcookie("ultimafecha",$fecha, $tiempo);
                    setcookie("ultimahora", $hora, $tiempo);
                    setcookie("usuario_login", $_POST["usuario"], $tiempo);
                    setcookie("contra", $_POST["contra"], $tiempo); //hace falta la contraseña (los pibes del video lo hacen así)?
                    if(strcmp($_POST["usuario"],$usuario1) == 0 && strcmp($_POST["contra"],$contra1) == 0)
                        $estilo = "estilo";
                    else if(strcmp($_POST["usuario"],$usuario2) == 0 && strcmp($_POST["contra"],$contra2) == 0)
                        $estilo = "oscuro";
                    else if(strcmp($_POST["usuario"],$usuario3) == 0 && strcmp($_POST["contra"],$contra3) == 0)
                        $estilo = "grande";
                    else if(strcmp($_POST["usuario"],$usuario4) == 0 && strcmp($_POST["contra"],$contra4) == 0)
                        $estilo = "contrastegrande";
        
                    session_start();
                    $_SESSION['estilo'] = $estilo;
                }
            }

            session_start();
                    $_SESSION['usuario'] = $_POST["usuario"];
                    $_SESSION['contra'] = $_POST["contra"];
            $extra = 'perfil/'.$_POST["usuario"]; 
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            
            header("Location: http://$host$uri/$extra");
            exit;    
        }
        else 
            /* Redirecciona a una página diferente que se encuentra en el directorio actual */
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'principal';
            header("Location: http://$host$uri/$extra");
            exit;
    }

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

