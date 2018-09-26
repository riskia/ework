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

Route::middleware(['usersession','usermenu'])->group(function() {
    Route::get('/user', 'IndexController@user');
    Route::get('/profile', 'IndexController@profile');
    Route::get('/menu', 'IndexController@menu');
    Route::get('/zona', 'ZonaController@index');
    Route::get('/work', 'WorkController@index');
});

Route::middleware(['usersession'])->group(function() {
    Route::get('/profile', 'IndexController@profile');
    Route::get('/dashboard', 'IndexController@dashboard');
});

Route::post('/addwilayah', 'ZonaController@addwilayah');
Route::post('/addarea', 'ZonaController@addarea');
Route::post('/addrayon', 'ZonaController@addrayon');

Route::get('/test', 'TestController@menu')->middleware('usersession');
Route::get('/getuser', 'TestController@getuser');

Route::post('/loginpost', 'LoginController@loginpost');
Route::post('/changepassword', 'LoginController@changepass');
Route::post('/adduser', 'LoginController@adduser');

Route::post('/addmenu', 'IndexController@addmenu');
Route::post('/addusermenu', 'IndexController@addusermenu');