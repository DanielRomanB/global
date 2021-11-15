<?php

namespace App\Http\Controllers;
use App\SisFacturacion;

use Illuminate\Http\Request;

class ViewController extends Controller
{
   public function home()
    {
        return view('empresa');
    }

    public function login_ruc(){
        return view('login');
    }

    public function sesion(Request $request){
      $ruc_empresa = $request->get('ruc');
      $empresa = SisFacturacion::where('ruc',$ruc_empresa)->first();
      // return $empresa;
      if(!isset($empresa)){
         return back();
      }else{
         return redirect('http://jypsac.dyndns.org:190/facturacion_'.$ruc_empresa.'/public/');
      }

    }
}
