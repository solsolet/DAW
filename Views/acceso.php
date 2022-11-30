<?php
    include "inc/conect.php";
    print_r($_POST['usuario']);
    $fecha = date("m/d/y");
    $hora = date("H:i:s");
    $tiempo = time()+ 60*60*24*90;

    if(isset($_COOKIE['usuario_login'])){
        
        setcookie("ultimafecha",$fecha, $tiempo);
        setcookie("ultimahora", $hora, $tiempo);

        $extra = 'perfilpriv/'.$_COOKIE["usuario_login"];         
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');        
        header("Location: http://$host$uri/$extra");
        exit;  
        
    }
    if(isset($_POST['usuario'])){
        $sentencia = 'SELECT * FROM usuarios WHERE "'.$_POST["usuario"].'"= nomUsuario';
        include "inc/request.php";

        $num = $resultado->num_rows;
        if($num == 0){
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'avisonousu';
            header("Location: http://$host$uri/$extra");
            exit;
        }

        while($fila = $resultado->fetch_assoc()){
            print_r($fila);
            print_r($_POST['contra']);
            if($_POST["usuario"] == $fila['nomUsuario'] && $_POST['contra'] == $fila['clave']){
                        
                if(isset($_POST["remember"])){
                    
                    if(!isset($_COOKIE['usuario_login'])){
                        setcookie("ultimafecha",$fecha, $tiempo);
                        setcookie("ultimahora", $hora, $tiempo);
                        setcookie("usuario_login", $_POST["usuario"], $tiempo);
                        setcookie("contra", $_POST["contra"], $tiempo); //hace falta la contraseña (los pibes del video lo hacen así)?
                        /* if(strcmp($_POST["usuario"],$usuario1) == 0 && strcmp($_POST["contra"],$contra1) == 0)
                            $estilo = "estilo";
                        else if(strcmp($_POST["usuario"],$usuario2) == 0 && strcmp($_POST["contra"],$contra2) == 0)
                            $estilo = "oscuro";
                        else if(strcmp($_POST["usuario"],$usuario3) == 0 && strcmp($_POST["contra"],$contra3) == 0)
                            $estilo = "grande";
                        else if(strcmp($_POST["usuario"],$usuario4) == 0 && strcmp($_POST["contra"],$contra4) == 0)
                            $estilo = "contrastegrande";
            
                        session_start();
                        $_SESSION['estilo'] = $estilo; */
                    }
                }

                session_start();
                $_SESSION['usuario'] = $_POST["usuario"];
                $_SESSION['contra'] = $_POST["contra"];
                $_SESSION['fecha'] = $fecha;
                $_SESSION['hora'] = $hora;
                $extra = 'perfilpriv/'.$_POST["usuario"]; 
                
                $host = $_SERVER['HTTP_HOST'];
                $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                include "inc/close.php"; 
                header("Location: http://$host$uri/$extra");
                exit;  
            }  
        }
        /* else 
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'principal';
            header("Location: http://$host$uri/$extra");
            exit; */
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

