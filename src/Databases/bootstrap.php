<?php

require __DIR__.'/../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "pgsql",
    "host" =>"127.0.0.1",
    "database" => "dev",
    "username" => "dev",
    "password" => "dev",
    "port" => "5432",
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();
