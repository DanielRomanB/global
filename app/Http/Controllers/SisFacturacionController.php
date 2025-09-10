<?php

namespace App\Http\Controllers;

use App\SisFacturacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SisFacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $cmd=shell_exec('C:\Users\Desarrollo\Desktop/cd.bat');
        // return "listo";

        $sis_facturacion = SisFacturacion::all();
        return view('sistemas.sis_facturacion.index',compact('sis_facturacion'));
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
        $busqueda=SisFacturacion::where('ruc',$nombre)->first();
        if ($busqueda) {
            return back()->withErrors(['El numero de R.U.C:'. $nombre.' ya esta creado, revise bien su Registro.']);
        }

    //* 1- Crear directorio de Laravel
        //A-Crear archivo Bat para clonar
        $ruta = public_path('puntos_bat/php/').'facturacion_'.$nombre.".bat";
        $copy_page = fopen( $ruta , 'a');

        $texto='robocopy C:\laragon\www\facturacion  C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d /E
            cd ..
            cd '.public_path('puntos_bat/php/').'
            DEL /F /A facturacion_'.$nombre.'.bat
        ';
        fwrite($copy_page,$texto);

        //B-Correr el Archivo Bat
        exec($ruta);
        // return 'start';
    //* 2- Crear Base de Datos
        //A-Crear archivo Bat para crear BD
        $bdatos = public_path('puntos_bat/php/').'bd_facturacion_'.$nombre.".bat";
        $copy_page2 = fopen( $bdatos , 'a');
        //cd C:\laragon\bin\mysql\mysql-5.7.33-winx64\bin
        $texto2='cd /
            cd C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin
            mysql -u root -e " create DATABASE facturacion_'.$nombre.' ;"
            cd /
            cd '.public_path('puntos_bat/php/').'
            DEL /F /A bd_facturacion_'.$nombre.'.bat
        ';
        fwrite($copy_page2,$texto2);
        //B-Correr el Archivo Bat
        exec($bdatos);
        sleep(5);

    //* 3- Borrar .env y Crear .ENV con nueva base de datos
        //A-Borrar ENV
        unlink('C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d/.env');
        //B-Crear ENV con los nuevos datos
        $env = fopen('C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d/.env', 'w');
        $texto_env=file_get_contents(public_path('puntos_bat/php/laravel/.env'));
        //reemplazar variable por nombre de la carpeta 'factura_project'
        $new_text = str_replace('factura_project','facturacion_'.$nombre.'',$texto_env);
        fwrite($env,$new_text);
        sleep(5);
        // return 'a';


    // GUARDADO DE LOS VALORES A LA BASE DE DATOS
        $user_facturacion = new SisFacturacion;
        $user_facturacion->name = $request->get('nombre');
        $user_facturacion->ruc =$request->get('ruc');
        $user_facturacion->nombre_carpeta ='facturacion_'.$nombre;
        $user_facturacion->nombre_carpeta_desactivado ='facturacion_'.$nombre.'_d1s4bl3d';
        $user_facturacion->estado_migracion_bd = 1;
        $user_facturacion->estado_duplicado = 1;
        $user_facturacion->save();

    //A-Crear archivo Bat para crear las migraciones
        // $migrate_ruta = 'C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d/php_fresh_facturacion_'.$nombre.".bat";

        $env2 = fopen(public_path('puntos_bat/BD/migrate2.bat'), 'w');
        $texto_env2=file_get_contents(public_path('puntos_bat/BD/migrate.bat'));
        $new_text = str_replace('var1','facturacion_'.$nombre.'_d1s4bl3d',$texto_env2);
        fwrite($env2,$new_text);
        sleep(5);
        // $migrate_db = 'C:\laragon\www\global\public\puntos_bat\BD\migrate2.bat';
        //B-Correr el Archivo Bat
        exec('c:\WINDOWS\system32\cmd.exe /c START  C:\laragon\www\global\public\puntos_bat\BD\migrate2.bat');
        unlink(public_path('puntos_bat/BD/migrate2.bat'));
        // print_r($output);
        return back()->with('message', 'Cambiado estado de duplicado');

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
    public function edit(SisFacturacion $empresa)
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

        //RECOGIENDO LOS DATOS ENVIADOS DEL FORMULARIO
        $nombre_empresa=$request->get('nombre_empresa');
        $psw_certificado=$request->get('psw_certificado');
        $nombre_usuario_sunat=$request->get('nombre_usuario_sunat');
        $psw_usuario_sunat=$request->get('psw_usuario_sunat');
        $api_id_guia=$request->get('api_id_guia');
        $api_clave_sunat=$request->get('api_clave_guia');
        $descripcion=$request->get('descripcion'); 
        //RECOGIENDO LOS DATOS ENVIADOS DEL FORMULARIO


        //ENTRANDO A LA EMPRESA PARA REALIZAR LOS CAMBIOS
        $empresa= SisFacturacion::find($id);

        //RECONOCIENDO SI EL CERTIFICADO ESTA SETEADO
        if($request->hasfile('certificado')){

            $image2=$request->file('certificado');
            $nombre_archivo=$empresa->ruc.'.p12';
            $destinationPath = public_path('certificados');
            if (file_exists($destinationPath.$empresa->ruc)){
                unlink($destinationPath.$empresa->ruc);  //Pregunto si existe, y si existe lo elimina
            }
            $image2->move($destinationPath,$empresa->ruc.'.p12');//aca lo vuelve a crear...

            // sustituir el Certificado Mediante Bat
            if (file_exists( public_path('puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat'))){ //Pregunto si existe, y si existe lo elimina- EL CERTIFICADO BAT
                unlink( public_path('puntos_bat/CERTI/').'certificado_'.$empresa->ruc.'.bat'); // Eliminar el Certificado.p12 antiguo-EL CERTIFICADO BAT
            }

            //A-Crear archivo Bat
            $bdatos = fopen(public_path('puntos_bat/CERTI/').'certificado_'.$empresa->ruc.'.bat', 'a');
            //A-Crear archivo Bat

            if (file_exists('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12')){//Pregunto si existe, y si existe lo elimina 
                unlink('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12'); // Eliminar el Certificado.p12 antiguo
            }

            //PREGUTANDO SI ESTA ACTIVO EL ARCHIVO PARA PODER BUSCARLO Y ENCONTRARLO
            if ($empresa->estado==0) {
                $texto='cd '.$destinationPath.'
                    copy '.$empresa->ruc.'.p12 certificado.p12
                    move certificado.p12 C:\laragon\www/facturacion_'.$empresa->ruc.'_d1s4bl3d/public/certificado
                    cd/
                    cd '.public_path('puntos_bat/CERTI/').'
                    DEL /F /A certificado_'.$empresa->ruc.'.bat
                ';
              // return $texto;
            }elseif ($empresa->estado==1) {
                $texto='cd '.$destinationPath.'
                    copy '.$empresa->ruc.'.p12 certificado.p12
                    move certificado.p12 C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado
                    cd/
                    cd '.public_path('puntos_bat/CERTI/').'
                    DEL /F /A certificado_'.$empresa->ruc.'.bat
                ';
            }
            //PREGUTANDO SI ESTA ACTIVO EL ARCHIVO PARA PODER BUSCARLO Y ENCONTRARLO
            fwrite($bdatos,$texto);//ESCRIBIENDO EN EL ARCHIVO
            exec(public_path('puntos_bat/CERTI/').'certificado_'.$empresa->ruc.'.bat');
            //B-Correr el Archivo Bat
            // $w='start /b  C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat';
            // $r=pclose(popen($w, 'r'));
            //B-Correr el Archivo Bat
        }else{
            $nombre_archivo=NULL; //RECONOCIENDO SI EL CERTIFICADO ESTA SETEADO
        }

        // CONFI_FE
        if($psw_certificado !==NULL and $nombre_usuario_sunat !==NULL and $psw_usuario_sunat !==NULL and $api_id_guia !== null  and $api_clave_sunat !== null  ){ //PREGUNTO SI ESTAN TODOS SETEADOS
            if ($empresa->estado==1) { //PREGUNTO SI ESTA ACTIVO LA CARPETA
                if (file_exists('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php')){ //PREGUNTO SI EXISTE LA CARPETA PARA DESPUES ELIMINARLO
                    unlink('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php');
                }
                if (file_exists('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acc_guia.php')){ //PREGUNTO SI EXISTE LA CARPETA PARA DESPUES ELIMINARLO
                    unlink('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acc_guia.php');
                }
                //A-Crear archivo Bat
                $confi_acceso_sunat = fopen('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php', 'w');
                $text_acc_sunat=file_get_contents(public_path('puntos_bat/php/laravel/config_acc_sunat.php'));
                
                $confi_acc_guia = fopen('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acc_guia.php', 'w');
                $text_acc_guia=file_get_contents(public_path('puntos_bat/php/laravel/config_acc_guia.php'));
                fwrite($confi_acceso_sunat,$text_acc_sunat);
                fwrite($confi_acc_guia,$text_acc_guia);

                // reemplazar las variables con los datos en config_acceso_sunat
                $new_data = file_get_contents('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php');
                $confi_acceso_sunat2 = fopen('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php', 'w');
                // reemplazar las variables con los datos en config_acc_guia
                $new_data_guia = file_get_contents('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acc_guia.php');
                $confi_acc_guia2 = fopen('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acc_guia.php', 'w');
            } elseif($empresa->estado==0) {//PREGUNTO SI ESTA DESACTIVO LA CARPETA
                if (file_exists('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php')){ //PREGUNTO SI EXISTE LA CARPETA PARA DESPUES ELIMINARLO
                    unlink('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php');
                }
                if (file_exists('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acc_guia.php')){ //PREGUNTO SI EXISTE LA CARPETA PARA DESPUES ELIMINARLO
                    unlink('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acc_guia.php');
                }
                //A-Crear archivo Bat
                $confi_acceso_sunat = fopen('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php', 'w');
                $text_acc_sunat=file_get_contents(public_path('puntos_bat/php/laravel/config_acc_sunat.php'));

                $confi_acc_guia = fopen('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acc_guia.php', 'w');
                $text_acc_guia=file_get_contents(public_path('puntos_bat/php/laravel/config_acc_guia.php'));
                fwrite($confi_acceso_sunat,$text_acc_sunat);
                fwrite($confi_acc_guia,$text_acc_guia);    
                // reemplazar las variables con los datos en config_acceso_sunat
                $new_data = file_get_contents('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php');
                $confi_acceso_sunat2 = fopen('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php', 'w');
                // reemplazar las variables con los datos en config_acc_guia
                $new_data_guia = file_get_contents('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acc_guia.php');
                $confi_acc_guia2 = fopen('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acc_guia.php', 'w');
            }
            
            //TEXTO QUE VA DENTRO DEL ARCHIVO CONFIF_ACCESO_SUNAT Y CONFIG_ACC_GUIA
            //------------------------------------------
                //A-Crear ACC_SUNAT con los nuevos datos
                $new_text = str_replace('$psw_certificado',$psw_certificado,$new_data);
                $new_text2 = str_replace('$empresa->ruc',$empresa->ruc,$new_text);
                $new_text3 = str_replace('$nombre_usuario_sunat',$nombre_usuario_sunat,$new_text2);
                $new_text4 = str_replace('$psw_certificado',$psw_certificado,$new_text3);
                $new_text5 = str_replace('$psw_usuario_sunat',$psw_usuario_sunat,$new_text4);
                fwrite($confi_acceso_sunat2,$new_text5);

                // reemplazar las variables con los datos en config_acc_guia
                $new_guia = str_replace('$psw_certificado',$psw_certificado,$new_data_guia);
                $new_guia2 = str_replace('$empresa->ruc',$empresa->ruc,$new_guia);
                $new_guia3 = str_replace('$nombre_usuario_sunat',$nombre_usuario_sunat,$new_guia2);
                $new_guia4 = str_replace('$psw_certificado',$psw_certificado,$new_guia3);
                $new_guia5 = str_replace('$psw_usuario_sunat',$psw_usuario_sunat,$new_guia4);
                $new_guia6 = str_replace('$api_id',$api_id_guia,$new_guia5);
                $new_guia7 = str_replace('$api_clace',$api_clave_sunat,$new_guia6);
                fwrite($confi_acc_guia2,$new_guia7);
                sleep(5);
                // return "a";
            //------------------------------------------
            //TEXTO QUE VA DENTRO DEL ARCHIVO CONFIF_ACCESO_SUNAT Y CONFIG_ACC_GUIA
        }

        //EMPEZANDO A REALIZAR CAMBIOS
        $empresa->descripcion=$descripcion;
        $empresa->name=$nombre_empresa;
        $empresa->usuario_sunat=$nombre_usuario_sunat;
        $empresa->contrasena_sunat=$psw_usuario_sunat;
        $empresa->api_remision_id=$api_id_guia;
        $empresa->api_remision_key=$api_clave_sunat;
        if (empty($empresa->certificado)){
            if (isset($nombre_archivo)){
                $empresa->certificado=$nombre_archivo;
                $empresa->estado_certificado=1;
            }
        }
        $empresa->contrasena_certi=$request->get('psw_certificado');
        $empresa->save();
        //EMPEZANDO A REALIZAR CAMBIOS

        // PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
        if ($empresa->usuario_sunat ==NULL or $empresa->contrasena_sunat ==NULL or  $empresa->certificado ==NULL or  $empresa->contrasena_certi ==NULL  ) {
            if ($empresa->estado==1) {
                rename("C:\laragon\www/".$empresa->nombre_carpeta , "C:\laragon\www/".$empresa->nombre_carpeta_desactivado);
                $cambio_estado= SisFacturacion::find($id);
                $cambio_estado->estado=0;
                $cambio_estado->save();
            }
        }
         // FIN PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
        return redirect()->route('sis_facturacion.index');
         // FIN PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
    }

    public function estado(Request $request)
    {

        $empresa=$request->get('accion');
        // return response()->json(['mensaje'=>'<div class="alert alert-success">'.$empresa.' ']);

        $estado_empresa=SisFacturacion::find($empresa);
        // return $estado_empresa;
        if ($estado_empresa->estado==0) {
            rename("C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado , "C:\laragon\www/".$estado_empresa->nombre_carpeta);
            $estado_empresa->estado=1;
            $estado_empresa->save();
            sleep(5);
            $cache_clear = fopen('C:\laragon\www/config.bat', 'a');
            $texto='cd C:\laragon\www/'.$estado_empresa->nombre_carpeta.'
                php artisan config:cache
                cd /
                cd C:\laragon\www/
                del /f /a config.bat
            ';
            fwrite($cache_clear,$texto);//ESCRIBIENDO EN EL ARCHIVO
            exec('C:\laragon\www/config.bat');


            return response()->json(['mensaje'=>'<div class="alert alert-info alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>La Empresa "'.$estado_empresa->name.'" ha sido <b>Activado</b> Exitosamente</div> ']);

        }elseif ($estado_empresa->estado==1) {
            rename("C:\laragon\www/".$estado_empresa->nombre_carpeta , "C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado);
            $estado_empresa->estado=0;
            $estado_empresa->save();
            return response()->json(['mensaje'=>'<div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>La Empresa "'.$estado_empresa->name.'" ha sido <b>Desactivado</b> Exitosamente</div> ']);
        }
    }

    public function consulta_comprobante(Request $request){
        // return $request;    
        $sistemas = SisFacturacion::where('ruc', $request->ruc_emisor)->first();
        if(!isset($sistemas)){
            return response()->json([
                'error' => true,
                'mensaje' => 'Datos invalidos',
            ]);
        }
        // numero 
        $nuevo_numero = $request->numero;
        if (preg_match('/^([A-Z0-9]+)-(\d+)$/', $nuevo_numero, $matches)) {
            $serie = $matches[1];
            $correlativo = $matches[2];
        }
        // return $serie;
        $url = config('services.api_externa')['key'].$sistemas->nombre_carpeta.'/public/api/consulta-comprobante';
        // $url = 'http://127.0.0.1:8000/api/consulta-comprobante';
        // $url = 'http://jypsac.dyndns.org:190/facturacion_20545122520/public/api/consulta-comprobante';
        // return $var;
        // 
        // dd($url);
        $response = Http::post($url, [

            'tipo' => $request->tipo,
            'cliente' => $request->ruc_receptor,
            'serie' => $serie,
            'correlativo' => $correlativo,
            'fecha_emision' =>  $request->emision,
            'monto_total' => $request->total,
            'total' => $request->total
        ]);
        // dd($response);
        // Verifica si la respuesta fue exitosa
        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'No se pudo conectar con la API',
                'detalle' => $response->body()
            ], $response->status());
        }
            // http://127.0.0.1:8000/api/consulta-comprobante
    }
}
