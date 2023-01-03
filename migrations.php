<?php

/**
 * @author Amirul islam <contact.amirull@gmail.com>
 * @copyright 2022 Amirul
 */

/**
 * Define root directory for all Application.
 */
define( 'ROOT_DIR_PATH', ( __DIR__ ) );

require_once ROOT_DIR_PATH . '/vendor/autoload.php';

use App\Core\Application;

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
 * Here starting run whole Application.
 */

$app->db->applyMigrations();


?>