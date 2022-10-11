<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){

        Schema::create('users', function ($collection) {
            $collection->id();
            $collection->string('full_name', 100);
            $collection->string('email')->unique();
            $collection->timestamp('password');
            $collection->enum('user_type', ['admin', 'instructor', 'student']);
            $collection->enum('graduated', ['yes', 'no'])->default('no');
            $collection->string('picture_url')->nullable();
            $collection->rememberToken();
            $collection->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('users');
    }
};
