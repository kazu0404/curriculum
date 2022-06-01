<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('welcome');
});
    
Route::group(['prefix' => 'admin'], function() {
    /*Route::get('news/create',  [SampleController::class   , 'Admin\NewsController@add']);*/
    /*Route::get('resources\views\admin\news\create', 'App\Http\Controllers\Admin\NewsController@add');*/
    Route::get('resources/views/admin/news/create', [NewsController::class, 'add']);
    //Route::post('news/create', 'Admin\NewsController@create'); # 追記
    });

