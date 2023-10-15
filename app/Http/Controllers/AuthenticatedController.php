<?php

namespace App\Http\Controllers;

use Devamirul\PhpMicro\core\Foundation\Application\Request\Request;
use Devamirul\PhpMicro\core\Foundation\Auth\Authentication\AuthAttempt;
use Devamirul\PhpMicro\core\Foundation\Auth\BaseAuthentication;
use Devamirul\PhpMicro\core\Foundation\Controller\BaseController;
use Rakit\Validation\Validator;

class AuthenticatedController extends BaseController {

    /**
     *
     */
    public function create() {
        return view('guest/login');
    }

    public function store(Request $request) {
        $validator = new Validator();

        $validation = $validator->validate($request->only('email', 'password'), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validation->fails()) {

            $errors = $validation->errors();

            return back()->withError($errors);
        } else {

            $validatedData = $validation->getValidatedData();

            (new AuthAttempt())->attempt($validatedData);
        }
    }

    public function destroy() {
        (new AuthAttempt())->destroy();
    }
}