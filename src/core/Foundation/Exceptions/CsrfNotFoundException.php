<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

class CsrfNotFoundException extends \Exception{
    protected $message = 'you don\'t have any csrf token to access this action';
    protected $code    = 419;
}
