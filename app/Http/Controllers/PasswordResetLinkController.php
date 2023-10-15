<?php

namespace App\Http\Controllers;

use ICanBoogie\DateTime;
use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Auth\Authentication\AuthReset;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

class PasswordResetLinkController extends BaseController {

    /**
     *
     */
    public function create() {
        return view('guest/forgot-password');
    }

    public function store() {
        (new AuthReset())->sendLink('/reset');
    }
}