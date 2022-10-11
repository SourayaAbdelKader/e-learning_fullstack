<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    
    public function up(){
        Schema::create('solutions', function ($collection) {
            $collection->id();
            $collection->foreign('student_id')->references('id')->on('users');
            $collection->foreign('assignment_id')->references('id')->on('assignments');
            $collection->string('picture_url')->nullable();
            $collection->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('solutions');
    }
};
