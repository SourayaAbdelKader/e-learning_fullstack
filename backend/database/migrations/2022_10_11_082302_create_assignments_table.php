<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::create('assignments', function ($collection) {
            $collection->id();
            $collection->foreign('course_id')->references('id')->on('courses');
            $collection->text('description');
            $collection->date("assigned_at");
            $collection->date("due_date");
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
};
