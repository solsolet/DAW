<?php

    Class Home extends Controller {

        public function principal($metodo, $parametros){
            
            $this -> views -> getView($this,$metodo,$parametros);
        }
    }
?>