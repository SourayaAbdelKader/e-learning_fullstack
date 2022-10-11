<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\Solution;
use App\Models\Assignment;
use App\Models\Annoucement;
use Illuminate\Http\Request;
use App\Models\Course-student;

class StudentController extends Controller
{
    public function getUserInfo($id){ //student or his instructor
        $id= Auth::$id();
        $user = User::where('_id', $id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $user
        ]);
    }

    public function getUserByEmail($email){
        $user = Auth::user();
        $user = User::where('email', $email)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $user
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

    public function getStudentCourses($student_id){
        $courses = Course-student::where('student_idd', $student_id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $courses
        ]);
    }

    public function getAnnoucements($course_id){
        $annoucememnts = Annoucement::where('course_id', $course_id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $annoucememnts
        ]);
    }

    public function getAnnoucement($id){
        $annoucememnt = Annoucement::where('_id', $id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $annoucememnt
        ]);
    }

    public function getAssignments($course_id){
        $assignments = Assignment::where('course_id', $course_id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $assignments
        ]);
    }

    public function getAssignment($id){
        $assignment = Assignment::where('_id', $id)->get(); ;
        return response()->json([
            "status" => "Success",
            "data" => $assignment
        ]);
    }

    public function addSolution(Request $request){

        $solution = new Solution;
        
        $solution->student_id = $request->student_id ? $request->student_id : $solution->student_id;
        $solution->assignment_id = $request->assignment_id? $request->assignment_id : $solution->assignment_id;
        $solution->picture_url = $request->picture_url? $request->picture_url : $solution->picture_url;
        $solution->description = $request->description? $request->description : $solution->description;

        if($solution->save()){
            return response()->json([
                "status" => "Success",
                "data" => $solution
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    public function updateSolution(Request $request, $id){

        $solution = Solution::find($id);
        $solution->student_id = $request->student_id ? $request->student_id : $solution->student_id;
        $solution->assignment_id = $request->assignment_id? $request->assignment_id : $solution->assignment_id;
        $solution->picture_url = $request->picture_url? $request->picture_url : $solution->picture_url;
        $solution->description = $request->description? $request->description : $solution->description;

        if($solution->save()){
            return response()->json([
                "status" => "Success",
                "data" => $solution
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    function deleteSolution($id) {
        $delete = Solution::where('_id', $id)->delete();
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
