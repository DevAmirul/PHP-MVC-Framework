<?php

    namespace App\Http\Controllers;

    use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
    use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;

    class NewPasswordController extends BaseController {

        /**
         * Dummy method
         */
        public function create(Request $request){
            return view('guest/reset');
        }

        public function store(Request $request){

        }
    }