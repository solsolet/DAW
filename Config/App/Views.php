<?php

    Class Views {

        public function getView($controlador, $vista, $data){
            
            $controlador = get_class($controlador);
            if($controlador == 'Home'){
                if($vista == 'foto') {
                    $id = $data;
                }
                else if($vista == 'perfil'){
                    $usu = $data;
                }
                $vista = 'Views/'.$vista.'.php';                
            }        
            include $vista;            
        }
    }
?>