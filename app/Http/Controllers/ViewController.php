<?php

namespace App\Http\Controllers;
use App\SisFacturacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ViewController extends Controller
{
   public function home()
    {
        return view('empresa');
    }

    public function login_ruc(){
        return Redirect::to('https://grupojypsac.com/');
    }
    public function login_leonosoft(){
        return view('sistemas.login_sesion.leonosoft');
    }

    public function sesion_leono(Request $request){
      $ruc_empresa = $request->get('ruc');
      $empresa = SisFacturacion::where('ruc',$ruc_empresa)->first();
      // return $empresa;
      if(!isset($empresa)){
          return back()->withErrors(['La Empresa con el R.U.C: '. $ruc_empresa.' No existe.']);
      }elseif($empresa->estado == 0){
          return back()->withErrors(['La empresa :'. $empresa->name.' se encuentra inactiva actualmente']);
      }else{
         return redirect('http://jypsac.dyndns.org:190/facturacion_'.$ruc_empresa.'/public/');
      }

    }

    public function login_wolke(){
        return view('sistemas.login_sesion.wolke');
    }
    
    public function sesion_wolke(Request $request){
        $ruc_empresa = $request->get('ruc');
        $empresa = SisFacturacion::where('ruc',$ruc_empresa)->first();
        // return $empresa;
        if(!isset($empresa)){
            return back()->withErrors(['La Empresa con el R.U.C: '. $ruc_empresa.' No existe.']);
        }elseif($empresa->estado == 0){
            return back()->withErrors(['La empresa :'. $empresa->name.' se encuentra inactiva actualmente']);
        }else{
           return redirect('http://jypsac.dyndns.org:190/wolke_'.$ruc_empresa.'/public/');
        }
  
      }
}
