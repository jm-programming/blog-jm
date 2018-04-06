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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

	#-----------------Rutas del Home----------------------#
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('useredit', [
    	'as' => 'user.edit',
    	'uses' => 'HomeController@edit'
    ]);

    Route::put('usersupdate/{id}', 'HomeController@update');
    
    Route::put('users/{id}/update', [
    	'as' => 'user.update',
	    'uses' => 'HomeController@update'
	]);
    #-------------------------------------------------------#
    Route::group(['middleware' => 'admin'], function() {
        //
    
    #---------------Rutas de Usuarios ---------------------#
    Route::resource('users', 'UserController');
    
	Route::get('users/{id}/destroy', [
	    'as' => 'admin.users.destroy',
	    'uses' => 'UserController@destroy'
	]);

	#----------------------------------------------------------#

	#---------------------Rutas de las Imagenes------------------#
	#Route::resource('images', 'ImageController');
	Route::get('images', [
    	'as' => 'admin.images.index', 
    	'uses' => 'ImageController@index'
	]);

	#-----------------------------------------------------------------#


	#-----rutas de los Tags-----------------------------#
	Route::resource('tags', 'TagController');
	Route::get('tags/{id}/destroy', [
	    'as' => 'admin.tags.destroy',
	    'uses' => 'TagController@destroy'
	]);
	#------------------------------------------------#

	#-----------Rutas de las categorias-----------------------#
	Route::resource('categories', 'CategoryController');
	Route::get('categories/{id}/destroy', [
	    'as' => 'admin.categories.destroy',
	    'uses' => 'CategoryController@destroy'
	]);
	#-------------------------------------------------------------#

	#---------------------rutas de los articulos---------------------#

	Route::resource('articles', 'ArticlesController');
	Route::get('articles/{id}/destroy', [
	    'as' => 'admin.articles.destroy',
	    'uses' => 'ArticlesController@destroy'
	]);

	#--------------------------------------------------------------------#


	#-----------------Rutas del calendario-----------------------------------#
	Route::resource('calendars', 'CalendarController');

	});	
});


