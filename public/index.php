<?php

/**
 * @author Amirul islam <inbox.amirul@gmail.com>
 * @copyright 2023 Amirul Islam
 */

/**
 * Define root directory.
 */
define('APP_ROOT', dirname(__DIR__));

/**
 * Register The Auto Loader.
 */
require_once APP_ROOT . '/vendor/autoload.php';

use Devamirul\PhpMicro\core\Foundation\Application\Application;

/**
 * Create Application object instance.
 */
$app = Application::singleton();

/**
 * Require registered Route.
 */
require_once APP_ROOT . '/routes/web.php';

/**
 * Run The Application.
 */
$app->run();
