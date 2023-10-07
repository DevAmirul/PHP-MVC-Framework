<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

class NotFoundException extends \Exception {
    protected $message = 'Not found!';
    protected $code    = 404;
}
