<?php
namespace App\Core;

use Ramsey\Uuid\Uuid;

class Random {
    public static function random_str($length=6, $char = 'abcdefghijklmnopqrstuvwxyz') {
        $pos = strlen($char);
        $pos = pow($pos, $len);

        $total = strlen($char)-1;
        $text = "";

        for ($i=0; $i<$len; $i++){
            $text = $text.$char[rand(0, $total)];
        }

        return $text;
    }

    public static function uuid() {
        return Uuid::uuid4()->toString();
    }
}