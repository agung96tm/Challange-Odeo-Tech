<?php

namespace App\Databases\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Token {
    public function migrate() {
        Capsule::schema()->create('tokens', function ($table) {
            $table->increments('id');
            $table->string('token')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    public function drop() {
        Capsule::schema()->dropIfExists('tokens');
    }
}