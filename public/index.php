<?php

/**
 * @author Amirul islam <contact.amirull@gmail.com>
 * @copyright 2023 Amirul
 */

/**
 * Define root directory.
 */
define('APP_ROOT', dirname(__DIR__));

require_once APP_ROOT . '/vendor/autoload.php';

use Devamirul\PhpMicro\core\Foundation\Application\Application;
use Devamirul\PhpMicro\core\Foundation\Application\Facade\Facades\Router as FacadesRouter;
use Devamirul\PhpMicro\core\Foundation\Application\Router\Router;

/**
 * Create Application object instance.
 */
$app = Application::singleton();

require_once APP_ROOT . '/routes/web.php';

$app->run();

