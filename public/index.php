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
define( 'ROOT_DIR_PATH', dirname( __DIR__ ) );

/**
 * Create Application object instance.
 */
$app = new Application( ROOT_DIR_PATH );

/**
 * include "./../routers/web.php" file for whole Application router.
 */
require_once ROOT_DIR_PATH . '/routers/web.php';

/**
 * Here starting run whole Application.
 */
$app->run();

?>