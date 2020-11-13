<?php

require __DIR__.'/../../vendor/autoload.php';

use Illuminate\Queue\Capsule\Manager as Queue;
 
$queue = new Queue;
 
 
// Some drivers need it
$queue->getContainer()->bind('encrypter', function() {
    return new Illuminate\Encryption\Encrypter('foobar');
});
 
 
// Configure the connection to Beanstalk
// Note: The second parameter is the connection name
// We also define a queue name 
// We will need these two names later 
 
$queue->addConnection([
    'driver' => 'redis',
    'host' => 'localhost',
    'queue' => 'default',
], 'default');
