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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'role:admin'], function() {
    //	Route::group(['middleware' => 'role:admin,edit-posts'], function() {});
    
            Route::get('/admin/Dashboard','AdminController@dashboard');

            //category
            Route::resource('category','CategoryController');
            Route::get('category/status/{id}','CategoryController@status');
            //role
            Route::resource('role', 'RoleController');
    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
