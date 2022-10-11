<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;

Route::prefix('v0')->group(function () {

    //Route::prefix('auth')->group(function () {  
        //Route::post("/login", [AuthController::class, "login"])->name('login');
        //Route::post("/register", [AuthController::class, "register"])->name('register');
        //Route::get("/not_auth", [AuthController::class, 'notAuth'])->name('not-auth');
    //});

    //Route::group(["middleware" => "auth:api"], function(){

        Route::prefix('admin')->group(function () {
            //Route::group(["middleware" => "role"], function(){
                Route::get('/restricted', [AdminController::class, 'restricted'])->name('restricted');
                Route::get('/getInstructors', [AdminController::class, 'getInstructors'])->name('get-instructors');
                Route::get('/getStudents', [AdminController::class, 'getStudents'])->name('get-students');
                Route::post('/updateUser/{id?}', [AdminController::class, 'updateUser'])->name('update-User');
                Route::get('/getUserInfo/{id?}', [AdminController::class, 'getUserInfo'])->name('get-user-info');
                Route::post('/addUser', [AdminController::class, 'addUser'])->name('add-User');

                
            //});
        });

       // Route::prefix('instructor')->group(function () {

       // });
        
        //Route::prefix('student')->group(function () {

        //});
    //});

});