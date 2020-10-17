<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

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
    return redirect('trangchu');
});

Route::get('admin/login', [UserController::class,'getdangnhapAdmin']);
Route::post('admin/login', [UserController::class,'postdangnhapAdmin']);
Route::get('admin/logout', [UserController::class,'getdangxuatAdmin']);

Route::group(['prefix' => 'admin','namespace'=>'App\Http\Controllers', 'middleware'=>'adminLogin'], function () {
    Route::resource('theloai', 'TheLoaiController')->except(['show']);
    Route::resource('slide', 'SlideController')->except(['show']);
    Route::resource('loaitin', 'LoaiTinController')->except(['show']);
    Route::resource('tintuc', 'TinTucController')->except(['show']);
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::delete('delete/{id}/{idTinTuc}', 'CommentController@destroy');
    });
    Route::resource('user', 'UserController')->except(['show']);
});

Route::get('trangchu', [PagesController::class,'trangchu']);
