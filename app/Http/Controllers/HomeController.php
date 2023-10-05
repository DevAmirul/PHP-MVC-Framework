<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class HomeController extends BaseController {
    
    function home() {
        return 'from home controller';
    }
}
