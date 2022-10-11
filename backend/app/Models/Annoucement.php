<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Annoucement extends Model{
    
    use HasFactory;
    public function courses() { //refering to the instructor and students
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
