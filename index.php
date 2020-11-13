<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/configs.php';
require __DIR__ . '/src/Databases/bootstrap.php';

use Bramus\Router\Router;
use App\Controllers\AuthController;
use App\Databases\Setup as DatabaseSetup;


/*
Router
*/
$router = new Router();

$router->get('', '\App\Controllers\PageController@home');
$router->post('auth/login', '\App\Controllers\AuthController@login');
$router->post('mail/send', '\App\Controllers\MailController@send');

$router->run();
