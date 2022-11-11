<?php

    Class Views {

        public function getView($controlador, $vista, $data){
            
            $controlador = get_class($controlador);
            if($controlador == 'Home'){
                $vista = 'Views/'.$vista.'.php';
            }
            else {
                $vista = 'Views/'.$controlador . '/' . $vista.'.php';
            }
            
            $id = 2;            
            require $vista;
        }
    }
?>