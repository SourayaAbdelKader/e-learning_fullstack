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

    public function updateUser(Request $request, $id){
        //$id= Auth::$id();
        $user = User::find($id);
        //$user = Auth::user();
        
        $user->full_name = $request->full_name ? $request->full_name : $user->full_name;
        $user->email = $request->email? $request->email : $user->email;
        $user->gender = $request->gender? $request->gender : $user->gender;
        $user->graduated = $request->graduated? $request->graduated : $user->graduated;
        $user->pic_url = $request->pic_url ? $request->pic_url  : $user->pic_url ;
        $user->birth_date = $request->birth_date ? $request->birth_date  : $user->birth_date;
        $user->location = $request->location ? $request->location  : $user->location;
        $user->user_type = $request->user_type ? $request->user_type  : $user->user_type;
        
        if($user->save()){
            return response()->json([
                "status" => "Success",
                "data" => $user
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }
}
