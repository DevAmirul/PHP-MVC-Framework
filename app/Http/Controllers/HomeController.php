<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class HomeController extends BaseController {

    public function home(Request $request) {
        echo 'from home controller';
    }
}
