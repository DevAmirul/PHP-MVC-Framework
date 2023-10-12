<?php

namespace Devamirul\PhpMicro\core\Foundation\Application;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Devamirul\PhpMicro\core\Foundation\Session\FlushMessage;
use Devamirul\PhpMicro\core\Foundation\Session\Session;

class Authentication {
    use Singleton;

    public function auth(string $user = 'user'): bool | array {
        return Session::singleton()->has($user) ? Session::singleton()->get($user) : false;
    }

    public function attempt(string $user = 'user', array $input, string $redirect = '/'): string {
        $model = new $user();

        $modelData = $model->get(['email', 'password'], [
            "email" => $input['email'],
        ])->getData();

        if (!$modelData) {
            return 'User does not exist with this email';
        } elseif (!password_verify($input['password'], $modelData['password'])) {
            return 'Password is incorrect';
        }

        Session::singleton()->set($user, $modelData['email']);

        redirect($redirect);
    }

    public function logout(string $user = 'user', string $redirect = '/'): void {
            Session::singleton()->delete($user);
            redirect($redirect);
    }

    public function guest(string $user = 'user'): bool {
        return Session::singleton()->has($user) ? true : false;
    }

    public function registration(string $user = 'user', array $input, string $redirect = '/login'): void {
        $model = new $user();

        $modelData = $model->insert($input)->getData();

        if ($modelData) {
            FlushMessage::singleton()->set('success', 'Account created successfully.');
            redirect($redirect);
        }
    }

    // public function reset(string $user = 'user', array $input, string $redirect = '/login'): string {
    //     $model = new $user();
    // }
}
