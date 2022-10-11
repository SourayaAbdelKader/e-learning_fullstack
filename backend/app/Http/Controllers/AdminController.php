<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\Solution;
use App\Models\Assignment;
use App\Models\Annoucement;
use Illuminate\Http\Request;

class AdminController extends Controller{ 
    
    public function restricted() {
        return "You are admin..!!";
    }

    public function getInstructors() {
        //$user = Auth::user();

        $instructors = User::where('user_type', 'instructor')->get();
        return response()->json([
            'status' => 'success',
            'result' => $instructors
        ]);
    }

    public function getStudents() {
        //$user = Auth::user();

        $students = User::where('user_type', 'student')->get();
        return response()->json([
            'status' => 'success',
            'result' => $students
        ]);
    }
}
