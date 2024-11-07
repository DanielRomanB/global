<?php

namespace App\Http\Controllers;
use App\SisFacturacion;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ViewController extends Controller
{
   public function home()
    {
        return view('empresa');
    }

    public function login_ruc(){
        // return Redirect::to('https://grupojypsac.com/');
        return view('auth.login');
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
    
    public function login(Request $request){
        try{
            //verificar que la empresa con ruc exista
            $empresa = SisFacturacion::where('ruc', $request->ruc)->first();
            if(!$empresa){
                return response()->json(["status" => '400', "message" => "No existe empresa con ese número de ruc."]);
            }
            //verificar que el usuario con correo y clave exista
            
            // $user = User::where('email', $request->email)->first();
            $host = 'http://127.0.0.1:8001';    //Sistema facturacion = 8001
            $url = $host."/regenerateSession";
            // $url = $host."/regenerateSession/".$request->email."/".$request->password;
            $apiVerificationURL = $host."/api/verifyCredentials";
            $apiVerificationURL = "http://127.0.0.1:8001/api/verifyCredentials";

            return response()->json(["status" => '200', 'message' => 'Se encontro empresa.', 'url' => $url, "apiVerificationURL" => $apiVerificationURL]);
        } catch(\Exception $e){
            return response()->json(["status" => '500', 'message' => 'Ha ocurrido un error al iniciar sesión.', 'error' => $e]);
        }
    }
}
