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

//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

// Allows activation of verification of user emails after registration.
//Auth::routes(['verify' => true]);

Route::auth(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index');
//Route::get('/admin/dashboard', 'AdminController@index');

Route::get('menu-editor', 'AdminController@menu')->middleware('can:edit-menu');


