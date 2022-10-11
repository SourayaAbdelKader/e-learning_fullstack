<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    
    public function up(){
        Schema::create('annoucements', function ($collection) {
            $collection->id();
            $collection->foreign('course_id')->references('id')->on('courses');
            $collection->text('description');
            $collection->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('annoucements');
    }
};
