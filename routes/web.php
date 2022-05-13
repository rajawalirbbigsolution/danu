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

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/adminview', 'AdminController@index')->name('adminview');
Route::post('/adminadd', 'Admincontroller@adminadd')->name('adminadd');
Route::get('/adminedit/{id}', 'AdminController@adminedit')->name('adminedit');
Route::post('/adminupdate', 'AdminController@adminupdate')->name('adminupdate');
Route::get('/admindelete/{id}', 'AdminController@admindelete')->name(('admindelete'));