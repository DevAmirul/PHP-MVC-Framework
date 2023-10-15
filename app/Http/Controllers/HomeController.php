<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;

class HomeController extends BaseController {

    public function index(Request $request) {
        return view('home');
    }

    public function create(Request $request) {
        dd('ok');
    }
}
