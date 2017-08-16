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


Route::resource('users', 'UserController');

Route::get('users/{id}/destroy', [
    'as' => 'admin.users.destroy',
    'uses' => 'UserController@destroy'
]);

Route::resource('images', 'ImageController');
Route::resource('tags', 'TagController');
Route::resource('categories', 'CategoryController');
Route::get('categories/{id}/destroy', [
    'as' => 'admin.categories.destroy',
    'uses' => 'CategoryController@destroy'
]);

// Authentication routes...
#Route::get('/login', 'Auth\LoginController@getLogin');
Route::get('/login', [
    'as' => '/login', 'uses' => 'Auth\LoginController@getLogin'
]);

Route::post('/login', [
    'as' => 'auth.login', 'uses' => 'Auth\LoginController@postLogin'
]);

Route::get('/logout', [
    'as' => '/logout', 'uses' => 'Auth\LoginController@getLogout'
]);

// Registration routes...
#Route::get('auth/register', 'Auth\AuthController@getRegister');
#Route::post('auth/register', 'Auth\AuthController@postRegister');