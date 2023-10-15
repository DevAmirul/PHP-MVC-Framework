<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Auth\Authentication\AuthReset;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Rakit\Validation\Validator;

class PasswordResetLinkController extends BaseController {

    /**
     *
     */
    public function create() {
        return view('guest/forgot-password');
    }

    public function store(Request $request) {

        $validator = new Validator();

        $validation = $validator->validate($request->only('email'), [
            'email'             => 'required|email',
        ]);

        if ($validation->fails()) {

            $errors = $validation->errors();

            return back()->withError($errors);

        } else {
            $validatedData = $validation->getValidatedData();

            $email = $validatedData['email'];

            (new AuthReset())->sendLink($email);
        }
    }
}