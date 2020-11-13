<?php

namespace App\Databases\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Mail {
    public function migrate() {
        Capsule::schema()->create('mails', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    public function drop() {
        Capsule::schema()->dropIfExists('mails');
    }
}