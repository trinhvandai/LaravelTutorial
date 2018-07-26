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

Route::get('/','PagesController@home');
/*Route::get('/',function(){
	return "welcome the web";
});*/
Route::get('/about','PagesController@about');
Route::get('/contact','TicketsController@create');
Route::post('/contact','TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/tickets/{slug?}','TicketsController@show');
Route::get('/tickets/{slug?}/edit','TicketsController@edit');
Route::post('/tickets/{slug?}/edit','TicketsController@update');
Route::post('tickets/{slug?}/delete','TicketsController@destroy');
Route::post('/comment','CommentsController@newComment');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/register','Auth\RegisterController@showRegistrationForm');
Route::post('users/register','Auth\RegisterController@register');
Route::get('users/logout','Auth\LoginController@logout');
Route::get('users/login','Auth\LoginController@showLoginForm');
Route::post('users/login','Auth\LoginController@login');
//Route::group(array('prefix' => 'admin','namespace'=>'Admin','middleware'=>'auth' ),function(){

Route::group(array(
'prefix'=>'admin','namespace'=>'Admin','middleware'=>'manager'),function(){
	Route::get('users', ['as'=> 'admin.user.index','uses'=>'UsersController@index']);
   Route::get('role','RolesController@index');
   Route::get('roles/create','RolesController@create');
   Route::post('roles/create','RolesController@store');
});

Auth::routes();


