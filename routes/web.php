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
            
            //user
            Route::get('users', 'UserController@index');
            Route::get('user/register', 'UserController@userRegister')->name('user.create');
            Route::post('user/register', 'UserController@registerUser')->name('user.register');
            Route::get('user/roleManagement/{id}', 'UserController@userManagement');
            Route::post('user/roleManagement', 'UserController@roleManagement');

            //role
            Route::resource('role', 'RoleController');
            //permissions
            Route::resource('permission', 'PermissionController');

            Route::get('post','PostController@index');
            Route::get('admin/postAssign/{post_id}/{user_id}','PostController@postAssign');
           
    });

Route::group(['middleware' =>['role:admin'||'role:author']], function() {
            Route::get('post/create','PostController@createPost')->name('post.create');
            Route::post('post/store','PostController@storePost')->name('post.store');
});

Route::group(['middleware' => 'role:author'], function() {

        Route::get('/author/Dashboard','AdminController@dashboard');
        Route::get('/author/posts','AuthorController@index');

 });

Route::group(['middleware' => 'role:editor'], function() {

        Route::get('/editor/Dashboard','AdminController@dashboard');
             Route::get('/editor/posts','EditorController@index');
             Route::get('/editor/post','EditorController@index');
             Route::get('post-info/{id}','EditorController@postInfo');

 });
Auth::routes();

Route::get('/home', 'AdminController@dashboard')->middleware('auth');
