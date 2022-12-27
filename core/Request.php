<?php

namespace App;

class Request {
    
    public function getPath() {
        $path     = $_SERVER['REQUEST_URI'] ?? '/';
        echo $position = strpos( $path, '?' );
    }

    public function getMethod() {

    }
}