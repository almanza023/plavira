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






Route::resource('areas', 'AreaController');
Route::resource('grados', 'GradoController');
Route::resource('actividades', 'ActividadController');
Route::resource('estudiante', 'EstudianteController');
Route::resource('usuarios', 'UsuarioController');
Route::resource('cargaacademica', 'CargaAcademicaController');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', 'Auth\LoginController@showLoginForm');

Route::post('/obtcarga', 'CargaAcademicaController@obtenerCarga')->name('obtcarga');
Route::post('/obtcarga-doc', 'CargaAcademicaController@obtenerCargaDocente')->name('obtcarga-doc');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tabla/est', 'EstudianteController@tabla')->name('tabla-est');
Route::get('/tabla/act', 'ActividadController@tabla')->name('tabla-actv');
Route::get('/tabla/areas', 'AreaController@tabla')->name('tabla-areas');
Route::get('/tabla/ciclos', 'CicloController@tabla')->name('tabla-grados');
Route::get('/tabla/usuarios', 'UsuarioController@tabla')->name('tabla-usuarios');
Route::get('/consulta', 'ConsultaController@index')->name('consulta.index');
Route::get('/consulta/show', 'ConsultaController@show')->name('consulta.show');
Route::get('/descargar/archivo/{name}', 'ConsultaController@descargar')->name('descargar.archivo');

Auth::routes();




