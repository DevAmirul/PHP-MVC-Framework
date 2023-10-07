<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class HomeController extends BaseController {

    public function index() {
        return view('index', ['app' => 'ok']);
    }
}
