<?php

use App\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/categories/upsert', 'CategoryController@upsert');

Route::delete('/categories/{id}', 'CategoryController@destroy');

Route::post('/menu-items/add-item', 'MenuItemController@store');

Route::post('/menu-items/add-image', function (Request $request) {
    $file = $request->file('file');
    $dir = 'public/images';
    $path = $file->store($dir);
    return str_replace("$dir/", '', $path);
});

Route::get('/categories/{category}/items', 'CategoryController@items');

Route::get('/menu-items/{menuItem}', function (MenuItem $menuItem) {
    return $menuItem;
});

Route::post('/menu-items/{menuItem}', 'MenuItemController@update');
