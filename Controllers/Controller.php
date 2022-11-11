<?php

    Class Controller {
        public function render($file) {
            include '../' . $file .'.php';
        }
    }
?>