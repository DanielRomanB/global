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
        $texto='robocopy C:\laragon\www\facturacion  C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d /e';
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
        unlink('C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d/.env');
        //B-Crear archivo Bat para crear BD
        $env = fopen('C:\laragon\www/facturacion_'.$nombre.'_d1s4bl3d/.env', 'a');
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
        cd laragon\www/facturacion_'.$nombre.'_d1s4bl3d
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
        $user_empresa->nombre_carpeta ='facturacion_'.$nombre;
        $user_empresa->nombre_carpeta_desactivado ='facturacion_'.$nombre.'_d1s4bl3d';
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
        $cmd=shell_exec('cd C:\laragon\www\puntos_bat\BD/php_fresh_20202020.bat');
        return $cmd;
        //RECOGIENDO LOS DATOS ENVIADOS DEL FORMULARIO
        $nombre_empresa=$request->get('nombre_empresa');
        $psw_certificado=$request->get('psw_certificado');
        $nombre_usuario_sunat=$request->get('nombre_usuario_sunat');
        $psw_usuario_sunat=$request->get('psw_usuario_sunat');
        //RECOGIENDO LOS DATOS ENVIADOS DEL FORMULARIO


        //ENTRANDO A LA EMPRESA PARA REALIZAR LOS CAMBIOS
        $empresa= Empresa::find($id);

        //RECONOCIENDO SI EL CERTIFICADO ESTA SETEADO
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
            //A-Crear archivo Bat

            if (file_exists('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12'))//Pregunto si existe, y si existe lo elimina
             { unlink('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12');} // Eliminar el Certificado.p12 antiguo

             $texto='cd '.$destinationPath.'
             copy '.$empresa->ruc.'.p12 certificado.p12
             move certificado.p12 C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado';
             fwrite($bdatos,$texto);

            //B-Correr el Archivo Bat
             $w='start /b  C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat';
             $r=pclose(popen($w, 'r'));
            //B-Correr el Archivo Bat
         }
        //RECONOCIENDO SI EL CERTIFICADO ESTA SETEADO

         else{$nombre_archivo=NULL;}

        // CONFI_FE
         if ($psw_certificado !==NULL and $nombre_usuario_sunat !==NULL and $psw_usuario_sunat !==NULL )//PREGUNTO SI ESTAN TODOS SETEADOS
         {
            if ($empresa->estado==1) { //PREGUNTO SI ESTA ACTIVO LA CARPETA

                if (file_exists('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php'))//PREGUNTO SI EXISTE LA CARPETA PARA DESPUES ELIMINARLO
                {unlink('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php');}

              //A-Crear archivo Bat
                $confi_acceso_sunat = fopen('C:\laragon\www/'.$empresa->nombre_carpeta.'/app/config_acceso_sunat.php', 'a');
              //A-Crear archivo Bat
            }
            elseif ($empresa->estado==0) {//PREGUNTO SI ESTA DESACTIVO LA CARPETA

                if (file_exists('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php'))//PREGUNTO SI EXISTE LA CARPETA PARA DESPUES ELIMINARLO
                {unlink('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php');}

             //A-Crear archivo Bat
                $confi_acceso_sunat = fopen('C:\laragon\www/'.$empresa->nombre_carpeta_desactivado.'/app/config_acceso_sunat.php', 'a');
             //A-Crear archivo Bat
            }

//TEXTO QUE VA DENTRO DEL ARCHIVO CONFIF_ACCESO_SUNAT
            //------------------------------------------
            $texto='<?php
        // CREADO DESDE SISTEMA DE ADMINISTRADOR '.date('Y-m-d H:i:s').'
            namespace App;

            use Illuminate\Database\Eloquent\Model;

            use Greenter\Model\Client\Client;
            use Greenter\Model\Company\Company;
            use Greenter\Model\Company\Address;
            use Greenter\Model\Sale\FormaPagos\FormaPagoContado;
            use Greenter\Model\Sale\Invoice;
            use Greenter\Model\Sale\SaleDetail;
            use Greenter\Model\Sale\Legend;
            use Greenter\Model\Response\BillResult;
            use Greenter\Model\Sale\Cuota;
            use Greenter\Model\Sale\FormaPagos\FormaPagoCredito;
            use Greenter\Model\Sale\Document;
            use Greenter\Model\Despatch\Despatch;
            use Greenter\Model\Despatch\DespatchDetail;
            use Greenter\Model\Despatch\Direction;
            use Greenter\Model\Despatch\Shipment;
            use Greenter\Model\Despatch\Transportist;
            use Greenter\Model\Sale\Note;
            use DateTime;
            use Illuminate\Support\Facades\Storage;

            use Greenter\Ws\Services\SunatEndpoints;
            use Greenter\See;

            use Greenter\XMLSecLibs\Certificate\X509Certificate;
            use Greenter\XMLSecLibs\Certificate\X509ContentType;

            use Luecano\NumeroALetras\NumeroALetras;

            class config_acceso_sunat extends Model
            {
                public static function facturacion_electronica(){

                    $see = new See();
                    $pfx = file_get_contents(public_path("certificado/certificado.p12"));
                    $password = "'.$psw_certificado.'";

                    $certificate = new X509Certificate($pfx, $password);

                    $see->setCertificate($certificate->export(X509ContentType::PEM));
        //  $see->setCertificate(file_get_contents(public_path("certificado\certificate.pem")));
                    $see->setService(SunatEndpoints::FE_BETA);
        //  $see->setClaveSOL("20000000001", "MODDATOS", "moddatos");
                    $see->setClaveSOL("'.$empresa->ruc.'", "'.$nombre_usuario_sunat.'", "'.$psw_usuario_sunat.'");
                    return $see;

                }

                public static function guia_electronica(){

                    $see = new See();
        //$see->setCertificate(file_get_contents(public_path("certificado/certificado.p12")));

                    $pfx = file_get_contents(public_path("certificado/certificado.p12"));
                    $password = "'.$psw_certificado.'";

                    $certificate = new X509Certificate($pfx, $password);

                    $see->setCertificate($certificate->export(X509ContentType::PEM));

        // $see->setService(SunatEndpoints::GUIA_PRODUCCION);
                    $see->setService(SunatEndpoints::GUIA_BETA);
                    $see->setClaveSOL("'.$empresa->ruc.'", "'.$nombre_usuario_sunat.'", "'.$psw_usuario_sunat.'");
                    return $see;
                }


                public static function send($see, $invoice){

                    $result = $see->send($invoice);

        // Guardar XML firmado digitalmente.
                    Storage::disk("facturas_electronicas")->put($invoice->getName().".xml",$see->getFactory()->getLastXml());

        // Verificamos que la conexión con SUNAT fue exitosa.
                    if (!$result->isSuccess()) {
            // Mostrar error al conectarse a SUNAT.
                        echo "Codigo Error:" .$result->getError()->getCode();
                        echo "Mensaje Error:" .$result->getError()->getMessage();
                        exit();
                    }

        // Guardamos el CDR [pregunats si se guardan las boletas]
                    Storage::disk("facturas_electronicas")->put("R-".$invoice->getName().".zip", $result->getCdrZip());

                    return $result;
                }

                public static function lectura_cdr($cdr){

                    $code = (int)$cdr->getCode();

                    if ($code === 0) {
                        echo "ESTADO: ACEPTADA".PHP_EOL;
                        if (count($cdr->getNotes()) > 0) {
                            echo "OBSERVACIONES:".PHP_EOL;
            // Corregir estas observaciones en siguientes emisiones.
                            var_dump($cdr->getNotes());
                        }
                        }else if ($code >= 2000 && $code <= 3999) {
                            echo "ESTADO: RECHAZADA".PHP_EOL;
                            }else{
                                /* Esto no debería darse, pero si ocurre, es un CDR inválido que debería tratarse como un error-excepción. */
                                /*code: 0100 a 1999 */
                                echo "Excepción";
                            }
                            return $cdr->getDescription().PHP_EOL;
                        }
                    }
                    ';
            //------------------------------------------
//FIN TEXTO QUE VA DENTRO DEL ARCHIVO CONFIF_ACCESO_SUNAT
                    fwrite($confi_acceso_sunat,$texto);//ESCRIBE EL TEXTO EN EL ARCHIVO
                }

        //EMPEZANDO A REALIZAR CAMBIOS
                $empresa->name=$nombre_empresa;
                $empresa->usuario_sunat=$nombre_usuario_sunat;
                $empresa->contrasena_sunat=$psw_usuario_sunat;
                if (empty($empresa->certificado))
                    {if (isset($nombre_archivo)){
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
                        $cambio_estado= Empresa::find($id);
                        $cambio_estado->estado=0;
                        $cambio_estado->save();
                    }
                }
         // FIN PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
                return redirect()->route('empresa.index');
         // FIN PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
            }

            public function estado(Request $request, $id)
            {

                $empresa=$request->get('accion');
          // return response()->json(['mensaje'=>'<div class="alert alert-success">'.$empresa.' ']);

                $estado_empresa=Empresa::find($empresa);
                if ($estado_empresa->estado==0) {
                    rename("C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado , "C:\laragon\www/".$estado_empresa->nombre_carpeta);
                    $estado_empresa->estado=1;
                    $estado_empresa->save();

                    return response()->json(['mensaje'=>'<div class="alert alert-info alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>La Empresa "'.$estado_empresa->name.'" ha sido <b>Activado</b> Exitosamente</div> ']);
                }
                elseif ($estado_empresa->estado==1) {
                    rename("C:\laragon\www/".$estado_empresa->nombre_carpeta , "C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado);
                    $estado_empresa->estado=0;
                    $estado_empresa->save();
                    return response()->json(['mensaje'=>'<div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>La Empresa "'.$estado_empresa->name.'" ha sido <b>Desactivado</b> Exitosamente</div> ']);
                }

            }

        }
