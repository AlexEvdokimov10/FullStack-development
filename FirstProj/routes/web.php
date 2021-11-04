<?php
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

Route::get('/','PagesControler@home');

Route::get('/about','PagesControler@about');

Route::resource('fishs',"FishsController");

Route::resource('types',"TypeController");

//Route::get('/types',"TypeController@index");
//Route::get('/fishs',"FishsController@index");
//Route::get('/fishs/create',"FishsController@create");
//Route::post('/fishs',"FishsController@store");
//Route::get('/fishs/{id}/edit',"FishsController@edit");
//Route::patch('/fishs/{id}',"FishsController@update");
//Route::delete('/fishs/{id}',"FishsController@destroy");
//Route::get('/fishs/{id}',"FishsController@show");
//Route::get('/fishs-json',"FishsController@getList");
