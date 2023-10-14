<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class NotFoundException extends BaseException {
    protected $message = 'Not found!';
    protected $code    = 404;
}
