<?php
session_start();
if(isset($_COOKIE['usuario_login']) || isset($_SESSION['usuario'])){
    $tiempo = -60*60*24*30;
    setcookie("usuario_login", "", $tiempo);
    setcookie("contra", "", $tiempo);
    setcookie("ultimafecha", "", $tiempo); 
    setcookie("ultimahora", "", $tiempo);   
    setcookie("estilo","",$tiempo);  
    session_unset();
    session_destroy();    
}

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'principal';
header("Location: http://$host$uri/$extra");
exit;

?>