<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Auth\Authentication\AuthReset;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Rakit\Validation\Validator;

class NewPasswordController extends BaseController {

    /**
     * Dummy method
     */
    public function create(Request $request) {
        return view('guest/reset');
    }

    public function store(Request $request) {
        $validator = new Validator();

        $validation = $validator->validate($request->only('reset_token', 'email', 'password', 'confirm_password'), [
            'reset_token'      => 'required',
            'email'            => 'required|email',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validation->fails()) {

            $errors = $validation->errors();

            return back()->withError($errors);

        } else {
            $validatedData = $validation->getValidatedData();
            
            (new AuthReset())->resetPassword($validatedData);
        }
    }
}