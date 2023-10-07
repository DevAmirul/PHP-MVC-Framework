<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

class ServerException extends \Exception {
    protected $message = 'Something went wrong. Please try again later';
    protected $code    = 500;
}
