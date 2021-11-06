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
        Route::resource('/empresa','EmpresaController');
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

