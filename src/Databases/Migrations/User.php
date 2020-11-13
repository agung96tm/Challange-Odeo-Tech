<?php

namespace App\Databases\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class User {
    public function migrate() {
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function drop() {
        Capsule::schema()->dropIfExists('users');
    }
}