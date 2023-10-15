<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Authentication;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Request;
use Devamirul\PhpMicro\core\Foundation\Application\Supports\url;
use Devamirul\PhpMicro\core\Foundation\Auth\Traits\Guard;
use Exception;

class AuthReset {
    use Guard;

    public function __construct() {
        $this->defineDefaultGuard();
    }

    public function sendLink(string $redirect) {
        $link = url::makeResetLink(Request::input('email'));

        $model = new $this->guard['model'];

        $isModelExist = $model->get('email', [
            "email" => Request::input('email'),
        ])->getData();

        if ($isModelExist === null) {
            return back()->withError('User does not exist with this email.');
        }

        $updatedRow = $model->update([
            "remember_token" => $link,
        ],
            [
                "email" => Request::input('email'),
            ]);

        if ($updatedRow->error()) {
            throw new Exception($updatedRow->error());
        }

        flushMessage()->set('success', 'Email has been sent.');

        redirect($redirect);
    }
}
