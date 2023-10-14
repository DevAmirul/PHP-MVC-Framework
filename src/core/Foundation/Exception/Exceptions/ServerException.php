<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class ServerException extends BaseException {
    protected $message = 'Something went wrong. Please try again later';
    protected $code    = 500;
}
