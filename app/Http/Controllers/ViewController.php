<?php

namespace App\Http\Controllers;
use App\Empresa;

use Illuminate\Http\Request;

class ViewController extends Controller
{
   public function home()
    {
        return view('home');
    }

    public function login_ruc(){
        return view('login');
    }

    public function sesion(Request $request){
      $ruc_empresa = $request->get('ruc');
      $empresa = Empresa::where('ruc',$ruc_empresa)->first();
      // return $empresa;
      if(!isset($empresa)){
         return back();
      }else{
         return redirect('http://jypsac.dyndns.org:190/'.$ruc_empresa.'/public/');
      }

    }
}
