<?php

namespace App\Controller;

use App\Core\Application;
use App\Core\Controller;

class SiteController extends Controller{

    public function handelContact() {
        return 'hello';
    }

    public function showContact() {
        $params = ['name' => 'sabbir'];
        return $this->viewRender( 'contact', $params );
    }
}
