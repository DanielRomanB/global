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

        Route::resource('/empresa','EmpresaController')->except(['destroy']);;
        Route::put('/empresa/estado/{id}','EmpresaController@estado')->name('empresa.estado');

        Route::resource('/sis_facturacion','SisFacturacionController')->except(['destroy']);;
        Route::put('/sis_facturacion/estado/{id}','SisFacturacionController@estado')->name('sis_facturacion.estado');
    }
);
// Route::get('/clear',function(){
//     Artisan::call('migrate:fresh --seed');
//     return Redirect::to('http://global.test:190/empresa');
// });
Auth::routes();
Route::get('/','ViewController@login_ruc')->name('login_ruc');
Route::post('/sesion','ViewController@sesion')->name('sesion');
Route::get('/home', 'HomeController@index')->name('home');

