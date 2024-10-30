<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function view(){
        // return view('sistemas.test');
        return view('sistemas.login_sesion.index');
    }
}
