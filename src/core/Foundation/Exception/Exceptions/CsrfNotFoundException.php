<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class CsrfNotFoundException extends BaseException {
    protected $message = 'you don\'t have any csrf token to access this action';
    protected $code    = 419;
}
