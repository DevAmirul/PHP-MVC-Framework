<?php

    namespace App\Http\Controllers;

    use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
    use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

    class PasswordResetLinkController extends BaseController {

        /**
         *
         */
        public function create(Request $request){
            return view('guest/forgot-password');
        }

        public function store(Request $request){

        }
    }