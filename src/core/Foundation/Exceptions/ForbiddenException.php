<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

class ForbiddenException extends \Exception {
    protected $message = 'you don\'t have permission to access this action';
    protected $code    = 403;
}
