<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

        // if(auth()->user()->tipo == "Administrador"){
        //     return view('home_auth');
        // }else{
        //     return url(''.auth()->user()->url.'');
        // }
    }
    public function pull()
    {
        // return " r";
          // B-Correr el Archivo Bat
        $public = public_path().'/phcSJ3lpitABApO/';
        $c='start /b  '.$public.'pull_sistema_global.bat';
// return $public;
        // $r=pclose(popen($c, 'r'));

        return view('home');

        // if(auth()->user()->tipo == "Administrador"){
        //     return view('home_auth');
        // }else{
        //     return url(''.auth()->user()->url.'');
        // }
    }
    // pu
}
