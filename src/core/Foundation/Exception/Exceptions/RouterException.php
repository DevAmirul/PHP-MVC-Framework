<?php

namespace Devamirul\PhpMicro\core\Foundation\Exception\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class RouterException extends BaseException {
    protected $message = 'This route did not defined';
    protected $code    = 404;
}
