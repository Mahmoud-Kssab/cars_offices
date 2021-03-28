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

Route::get('/', function () {
    return view('dashboard.index');
});


Route::group([ 'namespace' => 'Admin', 'prefix'=>'admin'], function (){
    Route::group(['namespace' => 'Main'], function (){

        //////////// Admin Module /////////////
        Route::resource('admin','AdminController');
        Route::resource('roles','RoleController');

        Route::get('/home','MainController@index')->name('admin.home');



        //////////// User Module /////////////
        Route::resource('/user','UserController');
        Route::get('/activate{id}','UserController@activate')->name('user.activate');
        Route::get('/deactivate{id}','UserController@deactivate')->name('user.deactivate');


        //////////// Office Module /////////////
        Route::resource('/office','OfficeController');
        // Route::get('/activate{id}','UserController@activate')->name('user.activate');
        // Route::get('/deactivate{id}','UserController@deactivate')->name('user.deactivate');



    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
