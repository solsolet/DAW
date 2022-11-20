<?php
session_start();
if(isset($_COOKIE['usuario_login']) || isset($_SESSION['usuario'])){
    $lista = 2;
}
else
    $lista = 1;
include "inc/cabecera.php"
?>