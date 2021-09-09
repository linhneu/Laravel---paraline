<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminControler;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Middleware\checkLogin;
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
    Route::get('/logout', 'AdminController@getLogout')->name('getLogout');
    Route::group(['middleware' => 'checkLogin'], function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
    Route::prefix('/group')->group(function(){
        Route::get('/', 'GroupController@index');
        Route::get('/add', 'GroupController@getAdd')->name('group.add');
        //Route::get('/add_confirm', 'GroupController@postAdd');
        Route::post('/add', 'GroupController@postAdd');
        Route::get('/edit/{id}', 'GroupController@getEdit')->name('group.getEdit');
        Route::post('/edit/{id}', 'GroupController@postEdit');
        Route::get('/delete/{id}', 'GroupController@delete')->name('group.delete');
    });
    Route::prefix('/team')->group(function(){
        Route::get('/', 'TeamController@index');
        Route::get('/add', 'TeamController@getAdd')->name('team.add');
        Route::post('/add', 'TeamController@postAdd');
        Route::get('/edit/{id}', 'TeamController@getEdit')->name('team.getEdit');
        Route::post('/edit/{id}', 'TeamController@postEdit');
        Route::get('/delete/{id}', 'TeamController@delete')->name('team.delete');
    });
});

