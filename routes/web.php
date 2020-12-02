<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('layouts.template');
})->name('home');

Auth::routes();

Route::resource('/user','Backend\Role_User\UserController',['except'=>['create','store']])->names('user');
Route::resource('/role','Backend\Role_User\RoleController')->names('role');
Route::resource('/category','Backend\Role_User\CategoryController')->names('category');
Route::resource('/permission','Backend\Role_User\PermissionController')->names('permission');

Route::resource('/carrera','Backend\Catalogos\CarreraController')->names('carrera');

/*
|--------------------------------------------------------------------------
| Directivos Routes
|--------------------------------------------------------------------------
|
| Routes for directives
|
*/
Route::get('/concentradoUnidades','Backend\Directivo\ConcentradoUnidadesController@index')->name('concentradoUnidades');
Route::get('/concentradoUnidadesLoad','Backend\Directivo\ConcentradoUnidadesController@load')->name('concentradoUnidadesLoad');
Route::get('/loaddata/getCuatrimestresByIdCarreraAndIdPeriodo/{carreraID}/{periodoID}','Backend\LoadData\LoadFromAjaxController@getCuatrimestresByIdCarreraAndIdPeriodo')->name('getCuatrimestresByIdCarrera');
Route::get('/loaddata/getCarrerasByIdCarreraAndIdPeriodoAndCuatrimestre/{carreraID}/{periodoID}/{cuatrimestre}','Backend\LoadData\LoadFromAjaxController@getCarrerasByIdCarreraAndIdPeriodoAndCuatrimestre')->name('getCarrerasByIdCarreraAndIdPeriodoAndCuatrimestre');
Route::get('/loaddata/getMateriasByIdCarreraAndCuatrimestre/{carreraID}/{cuatrimestre}','Backend\LoadData\LoadFromAjaxController@getMateriasByIdCarreraAndCuatrimestre')->name('getMateriasByIdCarreraAndCuatrimestre');


