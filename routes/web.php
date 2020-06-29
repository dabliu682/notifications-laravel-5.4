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

Route::resource('posts', 'PostController');

Route::get('mensajes/create', 'MensajesController@create')->name('mensajes.create');
Route::post('mensajes', 'MensajesController@store')->name('mensajes.store');
Route::get('mensajes/{id}', 'MensajesController@show')->name('mensajes.show');
Route::get('notificaciones', 'NotificationsContoller@index')->name('notifications.index');
Route::patch('notificaciones/{id}', 'NotificationsContoller@read')->name('notifications.read');
Route::delete('notificaciones/{id}', 'NotificationsContoller@destroy')->name('notifications.destroy');
