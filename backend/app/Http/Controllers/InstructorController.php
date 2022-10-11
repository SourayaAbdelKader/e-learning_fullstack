<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Solution;
use App\Models\Assignment;
use App\Models\Annoucement;
use App\Models\Course-student;

class InstructorController extends Controller
{
    // the first three also exsist in the admin controller
    public function getInstructorByEmail($email){
        //$user = Auth::user();
        $user = User::where('email', $email)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $user
        ]);
    }

    public function getInstructorInfo($id){
        //$id= Auth::$id();
        $user = User::where('_id', $id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $user
        ]);
    }

    public function getStudents() {
        $students = User::where('user_type', 'student')->get();
        return response()->json([
            'status' => 'success',
            'result' => $students
        ]);
    }

    public function getCourseByCode($code){
        $user = Course::where('code', $code)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $user
        ]);
    }

    public function getCourse($id){
        $course = Course::where('_id', $id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $course
        ]);
    }

    // to add a student to a course
    public function enrollStudent(Request $request){
        $enroll = new Course-student;
        
        $enroll->student_id = $request->student_id ? $request->student_id : $course->student_id;
        $enroll->course_id = $request->course_id? $request->course_id : $course->course_id;
        if($enroll->save()){
            return response()->json([
                "status" => "Success",
                "data" => $course
            ]);
        }
    }

    public function removeStudent($id){
        $enroll = Course-student::find($id);
        
        $delete = Course-student::where('student_id', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success'
            ]);
        }
    }

}
