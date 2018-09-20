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
Route::get('/user', 'IndexController@user')->middleware('usersession','usermenu');
Route::get('/profile', 'IndexController@profile')->middleware('usersession','usermenu');
Route::get('/menu', 'IndexController@menu')->middleware('usersession','usermenu');
Route::get('/test', 'TestController@menu')->middleware('usersession');
Route::get('/getuser', 'TestController@getuser');

Route::post('/loginpost', 'LoginController@loginpost');
Route::post('/changepassword', 'LoginController@changepass');
Route::post('/addmenu', 'IndexController@addmenu');
Route::post('/addusermenu', 'IndexController@addusermenu');