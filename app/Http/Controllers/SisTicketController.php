<?php

namespace App\Http\Controllers;

use App\SisFacturacion;
use App\SisTicket;
use App\User;
use Illuminate\Http\Request;

class SisTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sis_ticket = SisTicket::all();
        $sis_facturacion = SisFacturacion::all();

        if ($sis_ticket) {
            foreach ($sis_ticket as $sis_tick) {
                $mifecha=$sis_tick->created_at;
                $NuevaFecha = strtotime ( '+2 minute' , strtotime ($mifecha) ) ;
                $NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha);

                if ($NuevaFecha<date('Y-m-d H:i:s' )) {
                    $sis_tick= SisTicket::find($sis_tick->id);
                    $sis_tick->estado_duplicado=1;
                    $sis_tick->save();
                }
            }
        }

        return view('sistemas.sis_ticket.index',compact('sis_ticket'));
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
        $busqueda=SisTicket::where('ruc',$nombre)->first();
        if ($busqueda) {
            return back()->withErrors(['El numero de R.U.C:'. $nombre.' ya esta creado, revise bien su Registro.']);
        }


        // $nombre= (string)$nombre;

    //1- Crear directorio de Laravel
        //A-Crear archivo Bat para clonar
        $copy_page = fopen("C:\laragon\www/puntos_bat/ticket_".$nombre.".bat", 'a');
        $texto='robocopy C:\laragon\www\ticket  C:\laragon\www/ticket_'.$nombre.'_d1s4bl3d /e
        cd/
        cd C:\laragon\www/puntos_bat/
        DEL /F /A ticket_'.$nombre.'.bat
        ';
        fwrite($copy_page,$texto);
        // fclose($copy_page);

        //B-Correr el Archivo Bat
        $c='start /b  C:\laragon\www/puntos_bat/ticket_'.$nombre.'.bat';
        $r=pclose(popen($c, 'r'));

    //2- Crear Base de Datos
        //A-Crear archivo Bat para crear BD
        $bdatos = fopen('C:\laragon\www/puntos_bat/bd_ticket_'.$nombre.'.bat', 'a');
        $texto2='cd/
        cd C:\laragon\bin\mysql\mysql-5.7.33-winx64\bin
        mysql -u root -e " create DATABASE ticket_'.$nombre.' ;"
        cd/
        cd C:\laragon\www/puntos_bat/
        DEL /F /A bd_ticket_'.$nombre.'.bat
        ';
        fwrite($bdatos,$texto2);
        //B-Correr el Archivo Bat
        $w='start /b  C:\laragon\www/puntos_bat/bd_ticket_'.$nombre.'.bat';
        $r=pclose(popen($w, 'r'));
        sleep(5);

    //3- Borrar .env y Crear .ENV con nueva base de datos
        //A-Borrar ENV
        unlink('C:\laragon\www/ticket_'.$nombre.'_d1s4bl3d/.env');
        //B-Crear archivo Bat para crear BD
        $env = fopen('C:\laragon\www/ticket_'.$nombre.'_d1s4bl3d/.env', 'a');
        $texto_env='APP_NAME=ticket_'.$nombre.'
        APP_ENV=local
        APP_KEY=base64:mJRlTzPKaapP9OqKdqsj7sTQxSa/HwXoGI2q7L6OwKo=
        APP_DEBUG=true
        APP_URL=http://localhost

        LOG_CHANNEL=stack

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE= ticket_'.$nombre.'
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
        $sistema_ticket = new SisTicket;
        $sistema_ticket->name = $request->get('nombre');
        $sistema_ticket->ruc =$request->get('ruc');
        $sistema_ticket->nombre_carpeta ='ticket_'.$nombre;
        $sistema_ticket->nombre_carpeta_desactivado ='ticket_'.$nombre.'_d1s4bl3d';
        $sistema_ticket->save();

         //A-Crear archivo Bat para crear las migraciones
        $migrate = fopen('C:\laragon\www/puntos_bat/BD/php_fresh_ticket_'.$nombre.'.bat', 'a');
        $texto_migrate='cd/
        cd laragon\www/ticket_'.$nombre.'_d1s4bl3d
        php artisan migrate:fresh
        php artisan migrate:fresh --seed
        cd/
        cd C:\laragon\bin\mysql\mysql-5.7.33-winx64\bin
        mysql -u root -e "use jyp_admin; UPDATE sis_ticket SET estado_migracion_bd="1" WHERE id="'.$sistema_ticket->id.'" "
        cd/
        cd C:\laragon\www/puntos_bat/BD
        DEL /F /A php_fresh_ticket_'.$nombre.'.bat
        ';
        fwrite($migrate,$texto_migrate);
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
        $descripcion=$request->get('descripcion');
        //RECOGIENDO LOS DATOS ENVIADOS DEL FORMULARIO
        //ENTRANDO A LA EMPRESA PARA REALIZAR LOS CAMBIOS
        $tick= SisTicket::find($id);
        $tick->descripcion=$descripcion;
        $tick->name=$nombre_empresa;
        $tick->save();
        //EMPEZANDO A REALIZAR CAMBIOS
        return redirect()->route('sis_ticket.index');
    }

    public function estado(Request $request, $id)
    {

        $empresa=$request->get('accion');
          // return response()->json(['mensaje'=>'<div class="alert alert-success">'.$empresa.' ']);

        $estado_empresa=SisTicket::find($empresa);
        if ($estado_empresa->estado==0) {
            rename("C:\laragon\www/".$estado_empresa->nombre_carpeta_desactivado , "C:\laragon\www/".$estado_empresa->nombre_carpeta);
            $estado_empresa->estado=1;
            $estado_empresa->save();

            $empresa_activas=SisTicket::where('estado','1')->get();
            $texto2='cd /
            cd C:\laragon\www/ticket
            git pull
            ';

            /*CREAR GIT PULL*/
            if (file_exists('C:\laragon\www/git_pull_tickets.bat'))
            {
                unlink('C:\laragon\www/git_pull_tickets.bat');
                        //A-Crear archivo Bat para crear BD
                $bdatos = fopen('C:\laragon\www/git_pull_tickets.bat', 'a');
                foreach ($empresa_activas as $empresa_activass) {
                 $texto2=$texto2.'cd/
                 cd C:\laragon\www/ticket_'.$empresa_activass->ruc.'
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
        $empresa_activas=SisTicket::where('estado','1')->get();
        $texto2='cd /
        cd C:\laragon\www/ticket
        git pull
        ';
        /*CREAR GIT PULL*/
        if (file_exists('C:\laragon\www/git_pull_tickets.bat'))
        {
            unlink('C:\laragon\www/git_pull_tickets.bat');
                        //A-Crear archivo Bat para crear BD
            $bdatos = fopen('C:\laragon\www/git_pull_tickets.bat', 'a');
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
