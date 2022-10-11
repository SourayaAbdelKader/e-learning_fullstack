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
                "data" => $enroll
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

    // for the annoucememnt
    public function addAnnoucement(Request $request){

        $annoucememnt = new Annoucement;
        
        $annoucememnt->course_id = $request->course_id ? $request->course_id : $annoucememnt->course_id;
        $annoucememnt->description = $request->description? $request->description : $annoucememnt->description;

        if($annoucememnt->save()){
            return response()->json([
                "status" => "Success",
                "data" => $annoucememnt
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    public function updateAnnoucement(Request $request, $id){

        $annoucememnt = Annoucement::find($id);
        $annoucememnt->description = $request->description? $request->description : $annoucememnt->description;
            
        if($annoucememnt->save()){
            return response()->json([
                "status" => "Success",
                "data" => $annoucememnt
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    function deleteAnnoucement($id) {
        //$user = Auth::user();
        $delete = Annoucement::where('_id', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'failed'
        ], 401);
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

    
    // for the assignments
    public function addAssignment(Request $request){

        $assignment = new Assignment;
        
        $assignment->course_id = $request->course_id ? $request->course_id : $assignment->course_id;
        $assignment->description = $request->description? $request->description : $assignment->description;
        $assignment->assigned_at = $request->assigned_at? $request->assigned_at : $assignment->assigned_at;
        $assignment->due_date = $request->due_date? $request->due_date : $assignment->due_date;

        if($assignment->save()){
            return response()->json([
                "status" => "Success",
                "data" => $assignment
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    public function updateAssignment(Request $request, $id){

        $assignment = Assignment::find($id);
        $assignment->description = $request->description? $request->description : $assignment->description;
        $assignment->assigned_at = $request->assigned_at? $request->assigned_at : $assignment->assigned_at;
        $assignment->due_date = $request->due_date? $request->due_date : $assignment->due_date;

        if($assignment->save()){
            return response()->json([
                "status" => "Success",
                "data" => $assignment
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error updating a model"
        ]);
    }

    function deleteAssignment($id) {
        //$user = Auth::user();
        $delete = Assignment::where('_id', $id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'failed'
        ], 401);
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

}
