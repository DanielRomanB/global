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
        // C:\laragon\www\jyp-admin\public\phcSJ3lpitABApO
        // $public ='C:\laragon\www/phcSJ3lpitABApO/';
        //  $c='start /b  C:\laragon\www/phcSJ3lpitABApO/pull_sistema_global.bat ';
        // $r=pclose(popen($c, 'r'));
         $r=shell_exec('cd C:\laragon\www/jyp_admin/ && git pull ');
       // $public =  exec('cmd /c C:\laragon\www/phcSJ3lpitABApO/pull_sistema_global.bat ');
       return $r;
        // system("cmd /c ".$public.'pull_sistema_global.bat');
        // return $public.'pull_sistema_global.bat';
        // $c='start /b  '.$public.'pull_sistema_global.bat';
        // $r=pclose(popen($c, 'r'));
        //     return json_encode(array('result'=>$r));
        // sleep(5);
        // return redirect()->route('home');
// return $r;

        // return view('home');

        // if(auth()->user()->tipo == "Administrador"){
        //     return view('home_auth');
        // }else{
        //     return url(''.auth()->user()->url.'');
        // }
    }
    // pu
}
