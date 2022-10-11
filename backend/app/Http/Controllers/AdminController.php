<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{ 
    public function restricted() {
        return "You are admin..!!";
    }
}
