<?php

namespace Devamirul\PhpMicro\core\Foundation\Exception\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class DatabaseErrorException extends BaseException {
    protected $message = 'Database error';
    protected $code    = 502;
}
