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

Route::get('admin', function () {
    return redirect('admin/theloai');
});

Route::get('admin/login', [UserController::class,'getdangnhapAdmin']);
Route::post('admin/login', [UserController::class,'postdangnhapAdmin']);
Route::get('admin/logout', [UserController::class,'getdangxuatAdmin']);

Route::group(['prefix' => 'admin', 'namespace'=>'App\Http\Controllers', 'middleware'=>'adminLogin'], function () {
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

Route::get('trangchu', [PagesController::class, 'trangchu']);
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', [PagesController::class, 'tintuc']);
Route::get('loaitin/{id}/{TenKhongDau}.html', [PagesController::class, 'loaitin']);
Route::get('timkiem', [PagesController::class, 'getTimKiem']);
Route::get('trending', [PagesController::class, 'getTrending']);
Route::get('newest_cmt', [PagesController::class, 'getnewest_cmt']);
Route::get('tinnoibat', [PagesController::class, 'tinnoibat']);
Route::get('login', [PagesController::class, 'getLogin']);
Route::post('login', [PagesController::class, 'postLogin']);
Route::get('logout', [PagesController::class, 'getLogout']);
Route::get('register', [PagesController::class, 'getRegister']);
Route::post('register', [PagesController::class, 'postRegister']);
Route::post('comment/{id}', [PagesController::class, 'postbinhluan']);
Route::get('user', [PagesController::class, 'getnguoidung']);
Route::post('nguoidung', [PagesController::class, 'postnguoidung']);
