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
    return redirect()->route("login");
});

Auth::routes();

Route::group(['prefix' => '/account', 'as' => 'account.'], function() {
    Route::get('/index', 'AccountController@index')->name('index');
    Route::get('/create', 'AccountController@create')->name('create');
    Route::post('/store', 'AccountController@store')->name('store');
    Route::get('/edit/{account}', 'AccountController@edit')->name('edit');
    Route::post('/update/{account}', 'AccountController@update')->name('update');
    Route::post('/delete/{account}', 'AccountController@delete')->name('delete');
});

Route::group(['prefix' => '/user', 'as' => 'user.'], function() {
    Route::get('/index', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::post('/delete/{user}', 'UserController@delete')->name('delete');
});