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
Route::get('/', 'AdminController@index');
Route::get('/management', 'AdminController@index');

Route::prefix('/management')->group(function () {
    Route::get('/login', 'AdminController@index')->name('getLogin');
    Route::post('/login', 'AdminController@postLogin')->name('postLogin');
    Route::get('/logout', 'AdminController@getLogout')->name('getLogout');

    Route::group(['middleware' => 'checkLogin'], function () {

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::prefix('/group')->group(function () {
            Route::get('/', 'GroupController@index')->name('group.index');
            Route::get('/add', 'GroupController@getAdd')->name('group.getAdd');
            Route::post('/add', 'GroupController@postAdd');
            Route::get('/add_confirm', 'GroupController@getAddConfirm')->name('group.getAddConfirm');
            Route::post('/add_confirm', 'GroupController@postAddConfirm');
            Route::get('/edit/{id}', 'GroupController@getEdit')->name('group.getEdit');
            Route::post('/edit/{id}', 'GroupController@postEdit');
            Route::get('/edit_confirm', 'GroupController@getEditConfirm')->name('group.getEditConfirm');
            Route::post('/edit_confirm', 'GroupController@postEditConfirm');
            Route::get('/delete/{id}', 'GroupController@delete')->name('group.delete');
            Route::get('/search', 'GroupController@getSearch')->name('group.getSearch');

        });
        Route::prefix('/team')->group(function () {
            Route::get('/', 'TeamController@index')->name('team.index');
            Route::get('/add', 'TeamController@getAdd')->name('team.add');
            Route::post('/add', 'TeamController@postAdd');
            Route::get('/add_confirm', 'TeamController@getAddConfirm')->name('team.getAddConfirm');
            Route::post('/add_confirm', 'TeamController@postAddConfirm');
            Route::get('/edit/{id}', 'TeamController@getEdit')->name('team.getEdit');
            Route::post('/edit/{id}', 'TeamController@postEdit');
            Route::get('/edit_confirm', 'TeamController@getEditConfirm')->name('team.getEditConfirm');
            Route::post('/edit_confirm', 'TeamController@postEditConfirm');
            Route::get('/delete/{id}', 'TeamController@delete')->name('team.delete');
            Route::get('/search', 'TeamController@getSearch')->name('team.getSearch');
        });

        Route::prefix('/employee')->group(function () {
            Route::get('/', 'EmployeeController@index')->name('employee.index');
            Route::get('/add', 'EmployeeController@getAdd')->name('employee.getAdd');
            Route::post('/add', 'EmployeeController@postAdd');
            Route::get('/add_confirm', 'EmployeeController@getAddConfirm')->name('employee.getAddConfirm');
            Route::post('/add_confirm', 'EmployeeController@postAddConfirm');
            Route::get('/edit/{id}', 'EmployeeController@getEdit')->name('employee.getEdit');
            Route::post('/edit/{id}', 'EmployeeController@postEdit');
            Route::get('/edit_confirm', 'EmployeeController@getEditConfirm')->name('employee.getEditConfirm');
            Route::post('/edit_confirm', 'EmployeeController@postEditConfirm');
            Route::get('/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
            Route::get('/search', 'EmployeeController@getSearch')->name('employee.getSearch');
            Route::get('/detail/{id}', 'EmployeeController@getDetail')->name('employee.getDetail');

        });
    });
});
