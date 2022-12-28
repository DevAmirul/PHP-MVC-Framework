<?php

/**
 * @author Amirul islam <contact.amirull@gmail.com>
 * @copyright 2022 Amirul
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

/**
 * Define root directory for all Application.
 */
$rootDriPath = dirname( __DIR__ );

/**
 * Create Application object instance.
 */
$app = new Application( $rootDriPath );

/**
 * include "./../routers/web.php" file for whole Application router.
 */
require_once $rootDriPath . '/routers/web.php';

/**
 * Here starting run whole Application.
 */
$app->run();

?>