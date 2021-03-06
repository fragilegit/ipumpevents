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


Route::get('/', 'HomeController@index')->name('event.home'); 
Route::get('/events/{slug}', 'EventController@show')->name('event.slug')->where('slug', '[\w\d\-\_ ]+');
Route::get('/category/{category}', 'EventController@category')->name('category');
Route::get('/author/{user}', 'EventController@author')->name('author');
Route::get('/tag/{tag}', 'EventController@tag')->name('tag');

Auth::routes();
// email verification
Route::get('verify/{token}', 'VerifyController@verify')->name('verify');

// front end event controller
Route::resource('/events', 'EventController');
// Route::get('/events/{event}', 'EventController@show');
//needs to be rename to above
Route::get('/event', 'EventController@index')->name('event');

// backend event controller
Route::prefix('dashboard')->group(function(){
    
    Route::get('/', 'Backend\BackendController@index')->name('admin.dashboard');
    Route::resource('event', 'Backend\EventController');
    Route::put('event/restore/{event}', 'Backend\EventController@restored')->name('admin.restore');
    Route::delete('event/force-destroy/{event}', 'Backend\EventController@forceDestroy')->name('admin.force-destroy');
    Route::resource('categories', 'Backend\CategoriesController');
    Route::resource('users', 'Backend\UsersController');
    Route::get('users/confirm/{user}', 'Backend\UsersController@confirm')->name('admin.users.confirm');
    Route::get('edit-account', 'Backend\MainController@edit')->name('edit.account');
    Route::put('edit-account', 'Backend\MainController@update')->name('edit.account');
}); 

//examples
Route::get('/zoë', 'HomeController@zoe');

// facebook socialite login
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


