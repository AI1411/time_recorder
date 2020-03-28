<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{id}', 'UsersController@show')->name('users,show');
Route::get('/stores/{id}', 'StoreController@show')->name('stores.show');


Route::get('/attendances', 'AttendanceController@index')->name('attendances.index');
Route::post('/attendances', 'AttendanceController@store')->name('attendances.store');


Route::get('/atd_confirm', 'AtdConfirmController@index')->name('atd_confirm.index');
