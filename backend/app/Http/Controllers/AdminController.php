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

    public function getUserInfo($id){
        //$id= Auth::$id();
        $user = User::where('_id', $id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $user
        ]);
    }

    public function addUser(Request $request){

        $user = new User;
        //$user = Auth::user();
        
        $user->full_name = $request->full_name ? $request->full_name : $user->full_name;
        $user->email = $request->email? $request->email : $user->email;
        $user->gender = $request->gender? $request->gender : $user->gender;
        $user->graduated = $request->graduated? $request->graduated : $user->graduated;
        $user->pic_url = $request->pic_url ? $request->pic_url  : $user->pic_url ;
        $user->birth_date = $request->birth_date ? $request->birth_date  : $user->birth_date;
        $user->location = $request->location ? $request->location  : $user->location;
        $user->user_type = $request->user_type ? $request->user_type  : $user->user_type;
        $user->password = bcrypt($request->password) ? $request->password  : bcrypt($request->password);
        
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

    function deleteUser($id) {
        //$user = Auth::user();
        $delete = User::where('_id', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'failed'
        ], 401);
    }

    public function addCourse(Request $request){

        $course = new Course;
        
        $course->name = $request->name ? $request->name : $course->name;
        $course->code = $request->code? $request->code : $course->code;
        $course->credits = $request->credits? $request->credits : $course->credits;
        $course->hours = $request->hours? $request->hours : $course->hours;
        $course->begin_at = $request->begin_at ? $request->begin_at  : $course->begin_at ;
        $course->end_at = $request->end_at ? $request->end_at  : $course->end_at;
        $course->instructor_id = $request->instructor_id ? $request->instructor_id : $course->instructor_id;
        
        if($course->save()){
            return response()->json([
                "status" => "Success",
                "data" => $course
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    public function updateCourse(Request $request, $id){

        $course = Course::find($id);
        
        $course->name = $request->name ? $request->name : $course->name;
        $course->code = $request->code? $request->code : $course->code;
        $course->credits = $request->credits? $request->credits : $course->credits;
        $course->hours = $request->hours? $request->hours : $course->hours;
        $course->begin_at = $request->begin_at ? $request->begin_at  : $course->begin_at ;
        $course->end_at = $request->end_at ? $request->end_at  : $course->end_at;
        $course->instructor_id = $request->instructor_id ? $request->instructor_id : $course->instructor_id;
        
        if($course->save()){
            return response()->json([
                "status" => "Success",
                "data" => $course
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    function deleteCourse($id) {
        //$user = Auth::user();
        $delete = Course::where('_id', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'failed'
        ], 401);
    }
}
