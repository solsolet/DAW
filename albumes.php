<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Gemma Sellés Lloret y Sebastián Cadavid Piñero">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/27260d853d.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&family=Poppins&display=swap" rel="stylesheet">
    <title>Álbumes</title>
    <link rel="stylesheet" href="estilo/comun.css" media="screen"> <!-- important: sempre va a emplear-se -->
    <link rel="stylesheet" href="estilo/estilo.css" title="Modo principal">
    <link rel="alternate stylesheet" href="estilo/oscuro.css" title="Modo oscuro"> <!-- posar sempre un Title -->
    <link rel="alternate stylesheet" href="estilo/alt_cont.css" title="Alto Contraste">
    <link rel="alternate stylesheet" href="estilo/grande.css" title="Letra Grande">
    <link rel="alternate stylesheet" href="estilo/contrastegrande.css" title="Contraste Grande">
    <link rel="stylesheet" href="estilo/impreso.css" media="print">
</head>
<body>
    <header>
    <h1>PI - Pictures &amp; Images</h1>
        <nav>
            <ul>
                <li><a href="index2.html"><i class="fa-solid fa-house"></i><label>Inicio</label></a></li>
                <li><a href="busqueda.html"><i class="fa-solid fa-magnifying-glass"></i><label>Buscar</label></a></li> 
                <li><a href="perfil.html"><i class="fa-solid fa-user"></i><label>Perfil</label></a></li> <!-- cambiamos perfil -->
                <li><a href="index.html"><i class="fa-solid fa-right-from-bracket"></i><label>Salir</label></a></li>  
            </ul>
        </nav>
    </header>

    <section>
        <h2>Álbumes</h2>
        <p>(información)</p>
    </section>
    
    <?php
    include "inc/footer.php"
?>