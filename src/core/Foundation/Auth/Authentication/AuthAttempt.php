<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Authentication;

use Devamirul\PhpMicro\core\Foundation\Auth\Traits\Guard;
use Devamirul\PhpMicro\core\Foundation\Session\Session;

class AuthAttempt {
    use Guard;

    public function __construct() {
        $this->defineDefaultGuard();
    }

    /**
     * Login user.
     */
    public function attempt(array $input, string $redirect = '/') {
        $model = new $this->guard['model'];

        $isModelExist = $model->get(['id', 'name', 'email', 'password'], [
            "email" => $input['email'],
        ])->getData();

        if ($isModelExist === null) {
            return back()->withError('User does not exist with this email.');
        } elseif (!password_verify($input['password'], $isModelExist['password'])) {
            return back()->withError('Password is incorrect.');
        }

        unset($isModelExist['password']);
        Session::singleton()->set($this->guard['provider'], $isModelExist);
        redirect($redirect);
    }

    /**
     * Logout authenticated user.
     */
    public function destroy(string $redirect = '/login'): void {
        Session::singleton()->delete($this->guard['provider']);
        redirect($redirect);
    }
}
