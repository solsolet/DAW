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
require_once 'Config/App/autoload.php';

$diController = "Controllers/".$controller.".php";

if(file_exists($diController)){
    require_once $diController;
    $controller = new $controller();
    if(method_exists($controller, 'principal')){
        $controller->principal($metodo,$parametro);
    }
    else{
        echo "No existe el método";
    }
}
else{
    echo "No existe el controlador";
}

?>