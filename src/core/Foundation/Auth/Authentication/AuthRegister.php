<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Authentication;

use Devamirul\PhpMicro\core\Foundation\Auth\Traits\Guard;
use Exception;

class AuthRegister {
    use Guard;

    public function __construct() {
        $this->defineDefaultGuard();
    }

    public function register(array $input, string $redirect = '/login'): void {
        unset($input['confirm_password']);

        $input['password'] = passwordHash($input['password']);

        $modelData = (new $this->guard['model'])->insert($input);

        if ($modelData->error()) {
            throw new Exception($modelData->error());
        }
        flushMessage()->set('success', 'Account created successfully.');

        redirect($redirect);
    }
}
