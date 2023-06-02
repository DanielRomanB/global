<?php

namespace App\Http\Controllers;

use App\SisFacturacion;
use App\User;
use Illuminate\Http\Request;

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
        if ($sis_facturacion) {
            foreach ($sis_facturacion as $sis_fac) {
                $mifecha=$sis_fac->created_at;
                $NuevaFecha = strtotime ( '+2 minute' , strtotime ($mifecha) ) ;
                $NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha);

                if ($NuevaFecha<date('Y-m-d H:i:s' )) {
                    $sis_fac= SisFacturacion::find($sis_fac->id);
                    $sis_fac->estado_duplicado=1;
                    $sis_fac->save();
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

        // print_r($output);
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
        $descripcion=$request->get('descripcion');
        //RECOGIENDO LOS DATOS ENVIADOS DEL FORMULARIO


        //ENTRANDO A LA EMPRESA PARA REALIZAR LOS CAMBIOS
        $empresa= SisFacturacion::find($id);

        //RECONOCIENDO SI EL CERTIFICADO ESTA SETEADO
        if($request->hasfile('certificado'))
        {
            $image2=$request->file('certificado');
            $nombre_archivo=$empresa->ruc.'.p12';
            $destinationPath = public_path('certificados');
            if (file_exists($destinationPath.$empresa->ruc)){unlink($destinationPath.$empresa->ruc);}  //Pregunto si existe, y si existe lo elimina
            $image2->move($destinationPath,$empresa->ruc.'.p12');//aca lo vuelve a crear...

        // sustituir el Certificado Mediante Bat

        if (file_exists( 'C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat'))//Pregunto si existe, y si existe lo elimina- EL CERTIFICADO BAT
             {unlink( 'C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat');} // Eliminar el Certificado.p12 antiguo-EL CERTIFICADO BAT

            //A-Crear archivo Bat
             $bdatos = fopen('C:\laragon\www/puntos_bat/CERTI/certificado_'.$empresa->ruc.'.bat', 'a');
            //A-Crear archivo Bat

            if (file_exists('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12'))//Pregunto si existe, y si existe lo elimina
             { unlink('C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado/certificado.p12');} // Eliminar el Certificado.p12 antiguo



             //PREGUTANDO SI ESTA ACTIVO EL ARCHIVO PARA PODER BUSCARLO Y ENCONTRARLO
             if ($empresa->estado==0) {
              $texto='cd '.$destinationPath.'
              copy '.$empresa->ruc.'.p12 certificado.p12
              move certificado.p12 C:\laragon\www/facturacion_'.$empresa->ruc.'_d1s4bl3d/public/certificado
              cd/
              cd C:\laragon\www/puntos_bat/CERTI/
              DEL /F /A certificado_'.$empresa->ruc.'.bat
              ';
              // return $texto;
          }
          elseif ($empresa->estado==1) {
           $texto='cd '.$destinationPath.'
           copy '.$empresa->ruc.'.p12 certificado.p12
           move certificado.p12 C:\laragon\www/facturacion_'.$empresa->ruc.'/public/certificado
           cd/
           cd C:\laragon\www/puntos_bat/CERTI/
           DEL /F /A certificado_'.$empresa->ruc.'.bat';
       }
             //PREGUTANDO SI ESTA ACTIVO EL ARCHIVO PARA PODER BUSCARLO Y ENCONTRARLO

       fwrite($bdatos,$texto);//ESCRIBIENDO EN EL ARCHIVO


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
                    $see->setService(SunatEndpoints::FE_PRODUCCION);
                   // $see->setService(SunatEndpoints::FE_BETA);
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
                $empresa->descripcion=$descripcion;
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
                        $cambio_estado= SisFacturacion::find($id);
                        $cambio_estado->estado=0;
                        $cambio_estado->save();
                    }
                }
         // FIN PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
                return redirect()->route('sis_facturacion.index');
         // FIN PREGUNTA SI TODOS LOS CAMPOS ESTAN LLENOS PARA QUE ASI PUEDA OTORGAR LA ACTIVACION DE LA EMPRESA
            }

            public function estado(Request $request, $id)
            {

                $empresa=$request->get('accion');
          // return response()->json(['mensaje'=>'<div class="alert alert-success">'.$empresa.' ']);

                $estado_empresa=SisFacturacion::find($empresa);
                if ($estado_empresa->estado==0) {
                    rename("C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado , "C:\laragon\www/".$estado_empresa->nombre_carpeta);
                    $estado_empresa->estado=1;
                    $estado_empresa->save();

                    $empresa_activas=SisFacturacion::where('estado','1')->get();
                    $texto2='cd /
                    cd C:\laragon\www/facturacion
                    git pull
                    ';

                    /*CREAR GIT PULL*/
                    if (file_exists('C:\laragon\www/git_pull_facturaciones.bat'))
                    {
                        unlink('C:\laragon\www/git_pull_facturaciones.bat');
                        //A-Crear archivo Bat para crear BD
                        $bdatos = fopen('C:\laragon\www/git_pull_facturaciones.bat', 'a');
                        foreach ($empresa_activas as $empresa_activass) {
                           $texto2=$texto2.'cd/
                           cd C:\laragon\www/facturacion_'.$empresa_activass->ruc.'
                           git pull
                           ';
                       }
                        // $texto2='333333333';
                       fwrite($bdatos,$texto2);
                   }
                   /*CREAR GIT PULL*/

                   return response()->json(['mensaje'=>'<div class="alert alert-info alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>La Empresa "'.$estado_empresa->name.'" ha sido <b>Activado</b> Exitosamente</div> ']);
               }
               elseif ($estado_empresa->estado==1) {
                rename("C:\laragon\www/".$estado_empresa->nombre_carpeta , "C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado);
                $estado_empresa->estado=0;
                $estado_empresa->save();
                $empresa_activas=SisFacturacion::where('estado','1')->get();
                $texto2='cd /
                cd C:\laragon\www/facturacion
                git pull
                ';
                /*CREAR GIT PULL*/
                if (file_exists('C:\laragon\www/git_pull_facturaciones.bat'))
                {
                    unlink('C:\laragon\www/git_pull_facturaciones.bat');
                        //A-Crear archivo Bat para crear BD
                    $bdatos = fopen('C:\laragon\www/git_pull_facturaciones.bat', 'a');
                    foreach ($empresa_activas as $empresa_activass) {
                       $texto2=$texto2.'cd/
                       cd C:\laragon\www/facturacion_'.$empresa_activass->ruc.'
                       git pull
                       ';
                   }
                        // $texto2='333333333';
                   fwrite($bdatos,$texto2);
               }
               /*CREAR GIT PULL*/
               return response()->json(['mensaje'=>'<div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>La Empresa "'.$estado_empresa->name.'" ha sido <b>Desactivado</b> Exitosamente</div> ']);
           }

       }

   }
