<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Course extends Model{
    
    use HasFactory;
    public function users() { //refering to the instructor and students
        return $this->hasMany(User::class);
    }

    public function assignments() {
        return $this->hasMany(Assignment::class, 'id');
    }

    public function solutions() {
        return $this->hasMany(Solution::class, 'id');
    }

    public function annoucements() {
        return $this->hasMany(Annoucement::class, 'id');
    }

}
