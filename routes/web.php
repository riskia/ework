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
    return view('login', ['title' => 'Halaman Login']);
});


Route::get('/logout', 'LoginController@logout');
Route::get('/dashboard', 'IndexController@dashboard')->middleware('usersession');
Route::middleware(['usersession','usermenu'])->group(function() {
    Route::get('/user', 'IndexController@user');
    Route::get('/profile', 'IndexController@profile');
    Route::get('/menu', 'IndexController@menu');
    Route::get('/zona', 'ZonaController@index');
});

Route::post('/addwilayah', 'ZonaController@addwilayah');

Route::get('/test', 'TestController@menu')->middleware('usersession');
Route::get('/getuser', 'TestController@getuser');

Route::post('/loginpost', 'LoginController@loginpost');
Route::post('/changepassword', 'LoginController@changepass');
Route::post('/addmenu', 'IndexController@addmenu');
Route::post('/addusermenu', 'IndexController@addusermenu');