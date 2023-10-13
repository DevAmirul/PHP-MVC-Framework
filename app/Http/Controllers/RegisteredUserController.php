<?php

    namespace App\Http\Controllers;

    use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
    use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

    class RegisteredUserController extends BaseController {

        /**
         *
         */
        public function create(){
            return view('guest/register');
        }

        public function store(Request $request){
            
        }
    }