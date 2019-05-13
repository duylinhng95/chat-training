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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat/{id}', 'HomeController@messageView')->name('chat');
Route::post('/chat/{id}', 'HomeController@sendMessage')->name('chat.message');

Route::get('/hrm', 'HRMController@index');
Route::get('/hrm/holiday', 'HRMController@holiday');
Route::post('/hrm/holiday', 'HRMController@selectHoliday');
