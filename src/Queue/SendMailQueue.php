<?php
namespace App\Queue;

class SendMailQueue {
    public function fire($job, $data)
    {
        echo "Sending email to: {$data['email']}" . PHP_EOL;
    }
}