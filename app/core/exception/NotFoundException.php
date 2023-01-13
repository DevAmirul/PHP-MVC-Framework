<?php

namespace App\Core\Exception;

use Exception;

class NotFoundException extends Exception {
    protected $message = 'Not found this page';
    protected $code    = 404;
}
