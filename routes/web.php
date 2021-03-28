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

  Auth::routes();

Route::group(['namespace' => 'Admin','prefix'=>'admin'], function (){
    

    Route::group(['namespace' => 'Auth'], function (){

        Route::get('login', 'AuthController@login')->name('admin-login');

        Route::post('login-check', 'AuthController@loginCheck')->name('login-check');


    
    });
    Route::group(['middleware' => 'auth:admin'], function(){
                    
        Route::group(['namespace' => 'Auth'], function (){

            Route::get('changepassword', 'ChangePasswordController@index')->name('changepassword.index');
            Route::post('changepassword/update', 'ChangePasswordController@update')->name('updatepassword');
            Route::get('logout', 'AuthController@logout')->name('admin.logout');
        });

        Route::group(['namespace' => 'Main'], function (){

            Route::get('home','MainController@index')->name('admin.home');

            Route::resource('/user','UserController');

            Route::get('/activate{id}','UserController@activate')->name('user.activate');

            Route::get('/deactivate{id}','UserController@deactivate')->name('user.deactivate');
            ////////////////////////start types//////////////////////////
            Route::resource('types','TypeController'); 
            Route::delete('types/destroy/all','TypeController@multi_delete'); 
            ////////////////////////end types////////////////////////////////////////////
            ////////////////////start drivrs/////////////////////////////////
            Route::resource('driver','DriverController'); 
            Route::get('drivers/activate{id}','DriverController@activate')->name('drivers.activate');
            Route::get('drivers/deactivate{id}','DriverController@deactivate')->name('drivers.deactivate');
            Route::delete('driver/destroy/all','DriverController@multi_delete'); 

        /////////////////////////end drivers////////////////////////////////////////////////////////////

       ////////////////////////start trip///////////////////////////////////////////////
       Route::resource('trip','TripController'); 


       ////////////////////////////////////////////////////////////////////
        });
    });

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


