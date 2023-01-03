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
 * load .env file.
 */
$dotenv = Dotenv\Dotenv::createImmutable( ROOT_DIR_PATH );
$dotenv->load();

$config = [
    'db' => [
        'dsn'      => $_ENV['DB_DSN'],
        'user'     => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

/**
 * Create Application object instance.
 */
$app = new Application( ROOT_DIR_PATH, $config );

/**
 * include "./../routers/web.php" file for whole Application router.
 */
require_once ROOT_DIR_PATH . '/routers/web.php';

/**
 * Here starting run whole Application.
 */
$app->run();

?>