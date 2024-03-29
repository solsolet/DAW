<?php
$htmlData1 = '<li><a href="principal"><i class="fa-solid fa-house"></i><label>Inicio</label></a></li>
<li><a href="busqueda"><i class="fa-solid fa-magnifying-glass"></i><label>Buscar</label></a></li> 
<li><a href="registro"><i class="fa-solid fa-user-plus"></i><label>Registro</label></a></li>';

if(isset($_COOKIE['usuario_login'])){
    $htmlData2 = '<li><a href="principal"><i class="fa-solid fa-house"></i><label>Inicio</label></a></li>
    <li><a href="busqueda"><i class="fa-solid fa-magnifying-glass"></i><label>Buscar</label></a></li> 
    <li><a href="perfilpriv/'.$_COOKIE["usuario_login"].'"><i class="fa-solid fa-user"></i><label>Perfil</label></a></li> <!-- cambiamos perfil -->
    <li><a href="salida" id="salir"><i class="fa-solid fa-right-from-bracket"></i><label>Salir</label></a></li> ';
} 
else if (isset($_SESSION['usuario'])){
    $htmlData2 = '<li><a href="principal"><i class="fa-solid fa-house"></i><label>Inicio</label></a></li>
    <li><a href="busqueda"><i class="fa-solid fa-magnifying-glass"></i><label>Buscar</label></a></li> 
    <li><a href="perfilpriv/'.$_SESSION["usuario"].'"><i class="fa-solid fa-user"></i><label>Perfil</label></a></li> <!-- cambiamos perfil -->
    <li><a href="salida" id="salir"><i class="fa-solid fa-right-from-bracket"></i><label>Salir</label></a></li> ';
}

$htmlData3 = '<li><a href="principal"><i class="fa-solid fa-house"></i><label>Inicio</label></a></li>
<li><a href="busqueda"><i class="fa-solid fa-magnifying-glass"></i><label>Buscar</label></a></li> ';

include "debug.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Gemma Sellés Lloret y Sebastián Cadavid Piñero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="color-scheme" content="dark light"> --> <!-- posa el mode oscur si l'usuari el te posat a l'ordi -->
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/27260d853d.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <base href="/daw/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&family=Poppins&display=swap" rel="stylesheet">
    <title><?=$titulo;?></title>
    <link rel="stylesheet" href="estilo/comun.css" media="screen">
    <?php
        if(isset($_SESSION['estilo'])){
            echo '<link rel="stylesheet" href="'.$_SESSION['estilo'].'" title="Modo principal"> <!-- important: sempre va a emplear-se -->';
        }
        else if (isset($_COOKIE['estilo'])) {
            echo '<link rel="stylesheet" href="'.$_COOKIE['estilo'].'" title="Modo principal"> <!-- important: sempre va a emplear-se -->';
        }
        else if (isset($_SESSION['usuario'])){
            include "inc/conect.php";
            $sentencia = 'SELECT fichero FROM estilos, usuarios WHERE estilo = idEstilo AND nomUsuario = "'.$_SESSION['usuario'].'"';
            include "inc/request.php";
            $estil = $resultado -> fetch_assoc();
            include "inc/close.php";
            echo '<link rel="stylesheet" href="'.$estil['fichero'].'" title="Modo principal"> <!-- important: sempre va a emplear-se -->';
        }
        else{
            echo '<link rel="stylesheet" href="estilo/estilo.css" title="Modo principal"> <!-- important: sempre va a emplear-se -->';
        }
    ?>
    <link rel="alternate stylesheet" href="estilo/oscuro.css" title="Modo oscuro"> <!-- posar sempre un Title -->
    <link rel="alternate stylesheet" href="estilo/alt_cont.css" title="Alto Contraste">
    <link rel="alternate stylesheet" href="estilo/grande.css" title="Letra Grande">
    <link rel="alternate stylesheet" href="estilo/contrastegrande.css" title="Contraste Grande">
    <link rel="stylesheet" href="estilo/impreso.css" media="print">
    <script src="inc/codi.js"></script>
</head>
<body>
    <header>
        <h1>PI - Pictures &amp; Images</h1>
        <nav>
            <ul>
                <?php
                    if($lista == 1){
                        echo $htmlData1;
                    }
                    else if($lista == 2){
                        echo $htmlData2;
                    }
                    else if($lista == 3){
                        echo $htmlData3;
                    }
                ?>
            </ul>
        </nav>
    </header> 





   