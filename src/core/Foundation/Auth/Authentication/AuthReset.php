<?php

namespace Devamirul\PhpMicro\core\Foundation\Auth\Authentication;

use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Mail;
use Devamirul\PhpMicro\core\Foundation\Application\Supports\url;
use Devamirul\PhpMicro\core\Foundation\Auth\Traits\Guard;
use Exception;

class AuthReset {
    use Guard;

    public function __construct() {
        $this->defineDefaultGuard();
    }

    public function sendLink(string $email, string $resetLink = '/reset') {

        $link = url::makeResetLink($email, $resetLink);

        $model = new $this->guard['model'];

        $isModelExist = $model->get('email', [
            "email" => $email,
        ])->getData();

        if ($isModelExist === null) {
            return back()->withError('User does not exist with this email.');
        }

        $updatedRow = $model->update(
            ["remember_token" => $link],
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


    public function resetPassword(array $input, string $redirectLink = '/') {

        $model = new $this->guard['model'];

        $input['password'] = passwordHash($input['password']);
        // TODO: check token...
        $updatedRow = $model->update(
            ["password" => $input['password']],
            ["email" => $input['email']]
        );

        if ($updatedRow->error()) {
            throw new Exception($updatedRow->error());
        }

        return redirect($redirectLink);
    }
}
