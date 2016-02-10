<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello-world',function () {
    return "ciao mondo";
});

Route::get('/hello/{nome}',function ($n) {
   return "ciao " . $n;
});
Route::get('/hello/{nome}/{cognome}',function ($n,$c) {
    return "ciao " . $n ." " . $c;
});

Route::get('/ciao-mondo','MioController@ciao_mondo');
Route::get('/ciao/belli',function(){
    return "buona notte";
});
Route::get('/ciao/{nome}','MioController@ciao_mondo_con_parametro');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/progetto',[
        'as' => 'project',
        'uses' => 'ControllerProgetto@index'
    ]);
    Route::get('/article','ControllerArticoli@show');

});
