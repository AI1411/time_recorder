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


Route::middleware(['auth'])->group(function () {
    //従業員一覧
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/{id}', 'UsersController@show')->name('users.show');
    //従業員CSVエクスポート
    Route::get('/userExport', 'UsersController@export')->name('users.export');
    //店舗ページ
    Route::get('/stores/{id}', 'StoreController@show')->name('stores.show');
    //勤怠管理
    Route::get('/attendances', 'AttendanceController@index')->name('attendances.index');
    Route::post('/attendances', 'AttendanceController@store')->name('attendances.store');
    //勤怠確認
    Route::get('/atd_confirm', 'AtdConfirmController@index')->name('atd_confirm.index');
    //経費申請
    Route::resource('expenses', 'ExpenseController')->only(['index', 'store']);
});
