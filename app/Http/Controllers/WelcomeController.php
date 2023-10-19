<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class WelcomeController extends BaseController {

    /**
     * View welcome page.
     */
    public function index(Request $request) {
        return view('welcome');
    }

}
