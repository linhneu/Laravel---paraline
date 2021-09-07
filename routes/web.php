<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminControler;
use App\Http\Controllers\Admin\DashBoardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'AdminController@index' );
Route::get('/admin', 'AdminController@index' );

Route::prefix('/admin')->group(function() {
    Route::get('/login', 'AdminController@index')->name('getLogin');
    Route::post('/login', 'AdminController@postLogin')->name('postLogin');
    //Route::group(['middleware' => 'checkLogin'], function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //});
    Route::prefix('/group')->group(function(){
        Route::get('/', 'GroupController@index');
        Route::get('/add', 'GroupController@create');
        Route::get('/edit/{id}', 'GroupController@update');
        Route::get('/delete/{id}', 'GroupController@delete');
    });
});

