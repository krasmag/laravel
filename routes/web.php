<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','MainController@index')->name('home');
Route::get('/map','MainController@map')->name('map');
Route::get('/search','MainController@search')->name('search');
Route::get('/company','MainController@company')->name('company');
Route::get('/redact','MainController@redact')->name('redact');
Route::get('/delete{id}','MainController@delete')->name('delete');
Route::get('/dbredakt','MainController@dbredakt')->name('dbredakt');
Route::post('/updatedb','MainController@updatedb')->name('updatedb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
