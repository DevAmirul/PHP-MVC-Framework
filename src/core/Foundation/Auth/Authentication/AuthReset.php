<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Authentication;

use Devamirul\PhpMicro\core\Foundation\Application\Mail\Mail;
use Devamirul\PhpMicro\core\Foundation\Application\Supports\url;
use Devamirul\PhpMicro\core\Foundation\Auth\Traits\Guard;
use Devamirul\PhpMicro\core\Foundation\Exception\Exceptions\DatabaseErrorException;
use Exception;

class AuthReset {
    use Guard;

    public function __construct() {
        $this->defineDefaultGuard();
    }

    /**
     * Send reset link to user's mail.
     */
    public function sendLink(string $email, string $path = '/reset') {
        $link = url::makeResetLink($email, $path);

        $model = new $this->guard['model'];

        $isModelExist = $model->get('email', [
            "email" => $email,
        ])->getData();

        if ($isModelExist === null) {
            return back()->withError('User does not exist with this email.');
        }

        $updatedRow = $model->update(
            ["reset_token" => $link],
            ["email" => $email]
        );

        if ($updatedRow->error()) {
            throw new Exception($updatedRow->error());
        }

        $mailConfig = config('mail', 'from');

        Mail::mailer()
            ->setFrom($mailConfig['name'], $mailConfig['address'])
            ->addTo('User', $email)
            ->setSubject('Password reset link')
            ->setBody('Hi, Your reset link- <strong>' . $link . '</strong> or <a href="' . $link . '">click here</a>.')
            ->send();

        flushMessage()->set('success', 'Send mail to your email, Please check your mail');
        return back();
    }

    /**
     * Change user password.
     */
    public function resetPassword(array $input, string $redirectLink = '/login') {
        $model = new $this->guard['model'];

        $isTokenExist = $model->get('reset_token', [
            "email" => $input['email'],
        ])->getData();

        if ($isTokenExist === null) {
            return back()->withError('User does not exist with this email.');
        } elseif ($isTokenExist !== $input['reset_token']) {
            return back()->withError('User does not exist with this token.');
        }

        $updatedRow = $model->update(
            [
                "password"    => passwordHash($input['password']),
                "reset_token" => null,
            ],
            ["email" => $input['email']]
        );

        if ($updatedRow->error()) {
            throw new DatabaseErrorException($updatedRow->error());
        }
        return redirect($redirectLink);
    }
    
}
