<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Solution extends Model{

    use HasFactory;
    public function students() {
        return $this->hasOne(User::class, 'id', 'student_id');
    }

    public function assignments() {
        return $this->hasOne(Assignment::class, 'id', 'assignment_id');
    }
}
