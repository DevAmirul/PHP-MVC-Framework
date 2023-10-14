<?php

namespace Devamirul\PhpMicro\core\Foundation\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class ModelNotFoundException extends BaseException {
    protected $message = 'You don\'t have permission to access this action';
    protected $code    = 403;
}
