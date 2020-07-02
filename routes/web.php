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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');

Route::get('/menu-editor/{any?}', 'AdminController@menu')->middleware('can:edit-menu')->where('any', '.*');

Route::get('menu', 'HomeController@menu');
