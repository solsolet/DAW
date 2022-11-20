<?php
session_start();
if(!isset($_COOKIE['usuario_login']) && !isset($_SESSION['usuario'])){
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'aviso';
    header("Location: http://$host$uri/$extra");
    exit;
}
?>