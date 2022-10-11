<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(){
        Schema::create('courses', function ($collection) {
            $collection->id();
            $collection->string("name", 100)->unique();
            $collection->string("code", 30)->unique();
            $collection->foreign('instructor_id')->references('id')->on('users');
            $collection->integer("credits", 2);
            $collection->integer("hours", 3);
            $collection->date("begin_at");
            $collection->date("end_at");
            $collection->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('courses');
    }
};
