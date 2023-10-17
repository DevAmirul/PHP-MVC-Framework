<?php

namespace Devamirul\PhpMicro\core\Foundation\Application\Mail;

use Tx\Mailer;

class Mail {

    public static function mailer(): Mailer {
        $mailConfig = config('mail', 'smtp');

        return (new Mailer())
            ->setServer($mailConfig['host'], $mailConfig['port'])
            ->setAuth($mailConfig['username'], $mailConfig['password']);
    }

}
