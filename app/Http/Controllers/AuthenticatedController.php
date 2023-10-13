<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Devamirul\PhpMicro\core\Foundation\View\View;

class AuthenticatedController extends BaseController {

    /**
     *
     */
    public function create() {
        return view('guest/login');
    }

    public function store() {
    }

    public function destroy() {
    }
}