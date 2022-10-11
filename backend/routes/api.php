<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('v0')->group(function () {

    Route::prefix('auth')->group(function () {  
        Route::post("/login", [AuthController::class, "login"])->name('login');
        Route::post("/register", [AuthController::class, "register"])->name('register');
        Route::get("/not_auth", [AuthController::class, 'notAuth'])->name('not-auth');
    });

    Route::group(["middleware" => "auth:api"], function(){

        Route::prefix('admin')->group(function () {
            Route::group(["middleware" => "role"], function(){
                Route::get('/restricted', [AdminController::class, 'restricted'])->name('restricted');

            });
        });

        Route::prefix('instructor')->group(function () {

        });
        
        Route::prefix('student')->group(function () {

        });
    });

});