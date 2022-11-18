<?php

if(isset($_COOKIE['usuario_login'])){
    $tiempo = -60*60*24*30;
    setcookie("usuario_login", "", $tiempo);
    setcookie("contra", "", $tiempo);
    setcookie("ultimafecha", "", $tiempo); 
    setcookie("ultimahora", "", $tiempo);         
}

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'principal';
header("Location: http://$host$uri/$extra");
exit;

?>