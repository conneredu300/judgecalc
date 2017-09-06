<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@Index')->name('home');

Route::get('/contextos', 'ContextoController@Index')->name('listar-contextos')->middleware('auth');

Route::get('/novo-contexto', 'ContextoController@Create')->name('novo-contexto')->middleware('auth');

Route::post('/inserir-contexto', 'ContextoController@Store')->name('salvar-contexto')->middleware('auth');


Route::get('/valores', 'ValoresController@Index')->name('listar-valores')->middleware('auth');

Route::get('/novo-valor', 'ValoresController@Create')->name('novo-valor')->middleware('auth');

Route::post('/inserir-valor', 'ValoresController@Store')->name('salvar-valor')->middleware('auth');