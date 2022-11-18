<?php
if(!isset($_COOKIE['usuario_login'])){
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'aviso';
    header("Location: http://$host$uri/$extra");
    exit;
}
?>