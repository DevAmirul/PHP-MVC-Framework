<?php

namespace Devamirul\PhpMicro\core\Foundation\Exception\Exceptions;

use Devamirul\PhpMicro\core\Foundation\Exception\BaseException;

class RouteNotMatchException extends BaseException {
    protected $message = 'The route not defined';
}
