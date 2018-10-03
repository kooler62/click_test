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

Route::get('/', 'ClickController@index');
Route::get('/error/{id}', 'ClickController@error')->name('error');
Route::get('/success/{id}', 'ClickController@success')->name('success');
Route::get('click', 'ClickController@click');
Route::resource('bad_domains', 'BadDomainController');
