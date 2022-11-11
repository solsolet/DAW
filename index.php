<?php

$ruta = !empty($_GET['url']) ? $_GET['url'] : "principal";

$array = explode("/", $ruta);
$controller = "Home";
$metodo = $array[0];
$parametro = "";

if(!empty($array[1])){
    if(!empty($array[1] != '')){
        for($i = 1; $i < count($array); $i++){
            $parametro .= $array[$i].",";
        }
        $parametro = trim($parametro,",");
    }
}
/* define("URL_BASE", "/");
define("PATH_PAGES", __DIR__ . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR);
$path = $_SERVER['REQUEST_URI'];
if (substr($path, 0, strlen(URL_BASE)) == URL_BASE) {
  $path = substr($path, strlen(URL_BASE));
}
$path = explode("/", rtrim($path, "/\\")); */

require_once 'Config/App/autoload.php';

$diController = "Controllers/".$controller.".php";
$diView = "Views/".$metodo.".php";

if(file_exists($diController)){
    require_once $diController;
    $controller = new $controller();
    if(file_exists(($diView))){
        if(method_exists($controller, 'principal')){
            $controller->principal($metodo,$parametro);
        }
        else{
            echo "No existe el método";
        }
    }else{
        if(method_exists($controller, 'principal')){
            $controller->principal('principal','');
        }
    }
}
else{
    echo "No existe el controlador";
}



?>