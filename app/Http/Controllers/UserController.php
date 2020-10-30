<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // var $test = "this is a test from routes page";
    public function show(){
        return view('user')->with('test' , 'This is a test from routes page...');
    }
}
