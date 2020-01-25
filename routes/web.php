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

Route::get('/', 'ContactsController@index')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admins', 'AdminsController@index')->name('admin')->middleware('isadmin');

Route::post('/admin', 'AdminsController@store');

Route::delete('/admin/{id}', 'AdminsController@delete');

Route::post('/admin/{id}/edit', 'AdminsController@edit');

Route::post('/admin/{id}/save', 'AdminsController@update');
