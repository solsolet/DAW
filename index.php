<?php

$pag = isset($_GET['url']) ? $_GET['url'] : "principal";

$carpeta = "inc/";
$archivos = glob($carpeta."*.php");
$archivo = $carpeta.$pag.".php";

if(in_array($archivo, $archivos))
{
    include($archivo);
}
else{
    include "inc/aviso.php";
}

?>