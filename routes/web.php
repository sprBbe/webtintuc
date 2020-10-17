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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','namespace'=>'App\Http\Controllers'], function () {
    Route::resource('theloai', 'TheLoaiController')->except(['show']);
    Route::resource('slide', 'SlideController')->except(['show']);
    Route::resource('loaitin', 'LoaiTinController')->except(['show']);
    Route::resource('tintuc', 'TinTucController')->except(['show']);
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
    });
    Route::resource('user', 'UserController')->except(['show']);
});
