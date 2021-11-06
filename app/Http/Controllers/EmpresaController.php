<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        if ($empresas) {
            foreach ($empresas as $empresa) {
                $mifecha=$empresa->created_at;
                $NuevaFecha = strtotime ( '+2 minute' , strtotime ($mifecha) ) ;
                $NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha);

                if ($NuevaFecha<date('Y-m-d H:i:s' )) {
                    $empresa= Empresa::find($empresa->id);
                    $empresa->estado_duplicado=1;
                    $empresa->save();
                }
            }
        }

 //  $my_dir = "../../assets";
 //  if(!is_dir($my_dir)) {
 //    // mkdir($my_dir);

 //      $ds =  "no hay directorio $my_dir";
 //  } else {
 //      $ds =  "El directorio $my_dir ya existe!";
 //  }
 //        $tamaño = filesize("C:");
 // if ($tamaño >= 1073741824) {
 //      $ds = round($tamaño / 1024 / 1024 / 1024,1) . 'GB';
 //    } elseif ($tamaño >= 1048576) {
 //        $ds = round($tamaño / 1024 / 1024,1) . 'MB';
 //    } elseif($tamaño >= 1024) {
 //        $ds = round($tamaño / 1024,1) . 'KB';
 //    } else {
 //        $ds = $tamaño . ' bytes';
 //    }


        return view('empresas.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $nombre=$request->get('ruc');
        // $nombre= (string)$nombre;

    //1- Crear directorio de Laravel
        //A-Crear archivo Bat para clonar
        $copy_page = fopen("C:\laragon\www/puntos_bat/facturacion_".$nombre.".bat", 'a');
        $texto='robocopy C:\laragon\www\facturacion  C:\laragon\www/facturacion_'.$nombre.' /e';
        fwrite($copy_page,$texto);
        // fclose($copy_page);

        //B-Correr el Archivo Bat
        $c='start /b  C:\laragon\www/puntos_bat/facturacion_'.$nombre.'.bat';
        $r=pclose(popen($c, 'r'));

    //2- Crear Base de Datos
        //A-Crear archivo Bat para crear BD
        $bdatos = fopen('C:\laragon\www/puntos_bat/bd_'.$nombre.'.bat', 'a');
        $texto2='cd/
        cd laragon\bin\mysql\mysql-5.7.24-winx64\bin
        mysql -u root -e " create DATABASE facturacion_'.$nombre.' ;"';
        fwrite($bdatos,$texto2);
        //B-Correr el Archivo Bat
        $w='start /b  C:\laragon\www/puntos_bat/bd_'.$nombre.'.bat';
        $r=pclose(popen($w, 'r'));
        sleep(5);

    //3- Borrar .env y Crear .ENV con nueva base de datos
        //A-Borrar ENV
        unlink('C:\laragon\www/facturacion_'.$nombre.'/.env');
        //B-Crear archivo Bat para crear BD
        $env = fopen('C:\laragon\www/facturacion_'.$nombre.'/.env', 'a');
        $texto_env='APP_NAME=facturacion_'.$nombre.'
        APP_ENV=local
        APP_KEY=base64:mJRlTzPKaapP9OqKdqsj7sTQxSa/HwXoGI2q7L6OwKo=
        APP_DEBUG=true
        APP_URL=http://localhost

        LOG_CHANNEL=stack

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE= facturacion_'.$nombre.'
        DB_USERNAME=root
        DB_PASSWORD=

        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        QUEUE_CONNECTION=sync
        SESSION_DRIVER=file
        SESSION_LIFETIME=120

        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379

        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=5c6698a7299f48
        MAIL_PASSWORD=be72971a1aa9f9
        MAIL_ENCRYPTION=null

        AWS_ACCESS_KEY_ID=
        AWS_SECRET_ACCESS_KEY=
        AWS_DEFAULT_REGION=us-east-1
        AWS_BUCKET=

        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_APP_CLUSTER=mt1

        MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
        MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
        ';
        fwrite($env,$texto_env);

    //4- Refresh seeder
        //A-Crear archivo Bat para crear las migraciones
        $migrate = fopen('C:\laragon\www/puntos_bat/BD/php_fresh_'.$nombre.'.bat', 'a');
        $texto_migrate='cd/
        cd laragon\www/facturacion_'.$nombre.'
        php artisan migrate:fresh
        php artisan migrate:fresh --seed';
        fwrite($migrate,$texto_migrate);


        // B-Correr el Archivo Bat
        // exec('c:\WINDOWS\system32\cmd.exe /c START C:\laragon\www/puntos_bat/php_fresh_'.$nombre.'.bat');
        // $bat_migra='start /b  C:\laragon\www/puntos_bat/php_fresh_'.$nombre.'.bat';
        // $btmi=pclose(popen($bat_migra, 'r'));

        // return json_encode(array('result'=>$btmi));

        // sleep(90);
        // unlink('C:\laragon\www/'.$nombre.'.bat');
        // return json_encode(array('result'=>$r)).json_encode(array('result'=>$a));

    //2- Cambiar Nombre del ".env"
    // GUARDADO DE LOS VALORES A LA BASE DE DATOS
        $user_empresa = new Empresa;
        $user_empresa->name = $request->get('nombre');
        $user_empresa->ruc =$request->get('ruc');
        $user_empresa->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa= Empresa::find($id);
        // Reconocimiento de Archivo Certi
        if($request->hasfile('certificado'))
        {
            $image2=$request->file('certificado');
            $nombre_archivo=$empresa->ruc.'.p12';
            $destinationPath = public_path('certificados');
            if (file_exists($destinationPath.$empresa->ruc)){unlink($destinationPath.$empresa->ruc);}  //Pregunto si existe, y si existe lo elimina
            $image2->move($destinationPath,$empresa->ruc.'.p12');//aca lo vuelve a crear...

        // sustituir el Certificado Mediante Bat
            //A-Crear archivo Bat
            $bdatos = fopen('C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat', 'a');

            if (file_exists('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12'))//Pregunto si existe, y si existe lo elimina
             { unlink('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12');} // Eliminar el Certificado.p12 antiguo

             $texto='cd '.$destinationPath.'
             copy '.$empresa->ruc.'.p12 certificado.p12
             move certificado.p12 C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado';
             fwrite($bdatos,$texto);
            //B-Correr el Archivo Bat
             $w='start /b  C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat';
             $r=pclose(popen($w, 'r'));
         }
         else{$nombre_archivo=NULL;}
        // Fin Reconocimiento de Archivo Certi

        // Cambios en la base de datos
         $empresa->name=$request->get('nombre_empresa');
         $empresa->usuario_sunat=$request->get('nombre_usuario_sunat');
         $empresa->contrasena_sunat=$request->get('psw_usuario_sunat');
         $empresa->certificado=$nombre_archivo;
         if (isset($nombre_archivo) {
           $empresa->estado_certificado=1;
       }
       $empresa->contrasena_certi=$request->get('psw_certificado');
       $empresa->save();



       return redirect()->route('empresa.index');

       // $btmi=exec('cmd /c  C:\laragon\www/puntos_bat/php_fresh_4444444.bat');

    // return response()->json(['mensaje'=>'<div class="alert alert-info">llegaste '.$btmi.'</div> ']);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
