<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [ 'middleware' => ['auth','api']],
    function(){
        Route::get('/login' , 'ViewController@home')->name('inicio');
        Route::get('/pull' , 'HomeController@pull')->name('pull');

        // Route::resource('/empresa','EmpresaController')->except(['destroy']);;
        // Route::put('/empresa/estado/{id}','EmpresaController@estado')->name('empresa.estado');

    //SISTEMAS
        //FACTURACION
        Route::resource('/sis_facturacion','SisFacturacionController')->except(['destroy']);
        // Route::resource('/sis_facturacion','SisFacturacionController@index')->except(['destroy']);
        Route::post('/sis_facturacion/estado','SisFacturacionController@estado')->name('sis_facturacion.estado');
        Route::post('/sis_facturacion/delete', 'SisFacturacionController@delete_sis')->name('sis_facturacion.delete_sis');
        //TICKET
        Route::resource('/sis_ticket','SisTicketController')->except(['destroy']);;
        Route::put('/sis_ticket/estado/{id}','SisTicketController@estado')->name('sis_ticket.estado');
    }
);
// Route::get('/clear',function(){
//     Artisan::call('migrate:fresh --seed');
//     return Redirect::to('http://global.test:190/empresa');
// });
Auth::routes();
Route::get('/','ViewController@login_leonosoft')->name('redirect_all');
//Seleccionar LEONOSOFT
// Route::get('/leonosoft','ViewController@login_leonosoft')->name('login_leonosoft');
Route::post('/sesion-leonosoft','ViewController@sesion_leono')->name('sesion_leono');
//Seleccionar WOLKE
Route::get('/wolke','ViewController@login_wolke')->name('login_wolke');
Route::post('/sesion-wolke','ViewController@sesion_wolke')->name('sesion_wolke');
//Seleccionar TICKET
// Route::get('/leonosoft','ViewController@login_leonosoft')->name('login_leonosoft');
// Route::post('/sesion-leonosoft','ViewController@sesion_leono')->name('sesion_leono');
// Route::post('/sesion','ViewController@sesion')->name('sesion');
// Route::post('/sesion','ViewController@sesion')->name('sesion');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/consulta','SisFacturacionController@consulta_comprobante')->name('leonosoft.consulta');

