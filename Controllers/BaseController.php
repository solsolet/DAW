<?php

    abstract Class BaseController {
        public function render($file) {
            include '../' . $file .'.php';
        }
    }
?>