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
                else if($vista == 'album'){                   
                    $nombre = explode(",",$data);
                }
                $vista = 'Views/'.$vista.'.php';                
            }        
            include $vista;            
        }
    }
?>