<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Rakit\Validation\Validator;

class RegisteredUserController extends BaseController {

    /**
     *
     */
    public function create() {
        return view('guest/register');
    }

    public function store(Request $request) {
        $validator = new Validator();

        $validation = $validator->validate($request->only('name', 'email', 'password', 'confirm_password'), [
            'name'             => 'required',
            'email'            => 'required|email',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {

            $errors = $validation->errors();

            return back()->withError($errors);
        } else {
            
        }
    }
}