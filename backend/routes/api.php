<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;

Route::prefix('v0')->group(function () {

    Route::prefix('auth')->group(function () {  
        Route::post("/login", [AuthController::class, "login"])->name('login');
        Route::post("/register", [AuthController::class, "register"])->name('register');
        Route::get("/not_auth", [AuthController::class, 'notAuth'])->name('not-auth');
    });

    Route::group(["middleware" => "auth:api"], function(){

        Route::prefix('admin')->group(function () {
            Route::group(["middleware" => "role"], function(){
                // related to users
                Route::get('/restricted', [AdminController::class, 'restricted'])->name('restricted');
                Route::get('/getInstructors', [AdminController::class, 'getInstructors'])->name('get-instructors');
                Route::get('/getStudents', [AdminController::class, 'getStudents'])->name('get-students');
                Route::post('/updateUser/{id?}', [AdminController::class, 'updateUser'])->name('update-user');
                Route::get('/getUserInfo/{id?}', [AdminController::class, 'getUserInfo'])->name('get-user-info');
                Route::post('/addUser', [AdminController::class, 'addUser'])->name('add-User');
                Route::post('/deleteUser/{id?}', [AdminController::class, 'deleteUser'])->name('delete-user');
                Route::get('/getUserInfoByEmail/{email?}', [AdminController::class, 'getUserInfoByEmail'])->name('get-user-info-by-email');
                //related to courses
                Route::post('/addCourse', [AdminController::class, 'addCourse'])->name('add-course');
                Route::post('/updateCourse/{id?}', [AdminController::class, 'updateCourse'])->name('update-course');
                Route::post('/deleteCourse/{id?}', [AdminController::class, 'deleteCourse'])->name('delete-course');
                Route::get('/getCourseByCode/{code?}', [AdminController::class, 'getCourseByCode'])->name('get-course-by-code');
                Route::get('/getCourse/{id?}', [AdminController::class, 'getCourse'])->name('get-course');
                //});

        });

       Route::prefix('instructor')->group(function () {
        Route::get('/getInstructorByEmail/{email?}', [InstructorController::class, 'getInstructorByEmail'])->name('get-instructor-by-email');
        Route::get('/getInstructorInfo/{id?}', [InstructorController::class, 'getInstructorInfo'])->name('get-instructor-info');
        Route::get('/getStudents', [InstructorController::class, 'getStudents'])->name('get-students');
        Route::get('/getCourseByCode/{code?}', [InstructorController::class, 'getCourseByCode'])->name('get-course-by-code');
        Route::get('/getCourse/{id?}', [InstructorController::class, 'getCourse'])->name('get-course');
        Route::post('/enrollStudent', [InstructorController::class, 'enrollStudent'])->name('enroll-student');
        Route::post('/removeStudent/{id?}', [InstructorController::class, 'removeStudent'])->name('remove-student');
        Route::post('/addAnnoucement', [InstructorController::class, 'addAnnoucement'])->name('add-annoucement');
        Route::post('/updateAnnoucement/{id?}', [InstructorController::class, 'updateAnnoucement'])->name('update-annoucement');
        Route::post('/deleteAnnoucement/{id?}', [InstructorController::class, 'deleteAnnoucement'])->name('delete-annoucement');
        Route::get('/getAnnoucements', [InstructorController::class, 'getAnnoucements'])->name('get-annoucements');
        Route::get('/getAnnoucement/{id?}', [InstructorController::class, 'getAnnoucement'])->name('get-annoucement');
        Route::post('/addAssignment', [InstructorController::class, 'addAssignment'])->name('add-assignment');
        Route::post('/updateAssignment/{id?}', [InstructorController::class, 'updateAssignment'])->name('update-assignment');
        Route::post('/deleteAssignment/{id?}', [InstructorController::class, 'deleteAssignment'])->name('delete-assignment');
        Route::get('/getAssignments', [InstructorController::class, 'getAssignments'])->name('get-assignments');
        Route::get('/getAssignment/{id?}', [InstructorController::class, 'getAssignment'])->name('get-assignment');

        
       });
        
        Route::prefix('student')->group(function () {

        });
    });

});