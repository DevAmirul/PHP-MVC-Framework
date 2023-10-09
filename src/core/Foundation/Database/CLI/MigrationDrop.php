<?php

require_once '../../../../../vendor/autoload.php';

use Devamirul\PhpMicro\core\Foundation\Database\CLI\CLIBaseDatabase;


$confirmation = (string) readline('Are you sure? (y/n) ');

if ($confirmation == 'y') {
    $db = CLIBaseDatabase::db();
    var_dump(CLIBaseDatabase::db());

}
