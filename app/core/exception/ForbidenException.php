<?php

namespace App\Core\Exception;

class ForbiddenException extends \Exception
{
    protected string $message = 'you don\'t have permission to access this page';
    protected int $code = 403;
}
