<?php

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../../configs.php';

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;
$capsule->addConnection([
    "driver" => DB_DRIVER,
    "host" => DB_HOST,
    "database" => DB_DATABASE,
    "username" => DB_USERNAME,
    "password" => DB_PASSWORD,
    "port" => DB_PORT,
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();
