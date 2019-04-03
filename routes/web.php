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
Route::get('admin/dangnhap','PageController@getdangnhapAdmin');
Route::post('admin/dangnhap','PageController@postdangnhapAdmin');
Route::get('admin/logout','PageController@logout');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('/','PageController@getIndex');
    Route::group(['prefix'=>'ManagerOrder'],function(){
        //admin/ManagerOrder/danhsach
        Route::get('danhsach','OrderController@getDanhSach');
        Route::get('hanhly/{id}','OrderController@getHanhLy');
        Route::get('chitiet/{id}','OrderController@getChiTiet');
        Route::get('chitietluotve/{id}','OrderController@getChiTietLuotVe');
        Route::get('sua/{id}','OrderController@getSua');
        Route::post('sua/{id}','OrderController@postSua');
       // Route::get('xoa/{id}','TheLoaiController@postXoa');
    });
    Route::group(['prefix'=>'ManagerAdmin'],function(){
        //admin/ManagerAdmin/them
        Route::get('danhsach','AdminController@getDanhSach');
        Route::get('sua/{id}','AdminController@getSua');
        Route::post('sua/{id}','AdminController@postSua');
        Route::get('them','AdminController@getThem');
        Route::post('them','AdminController@postThem');
        Route::get('xoa/{id}','AdminController@getXoa')->where([ 'id' => '[0-9]+']);;

    });
    Route::group(['prefix'=>'ManagerUser'],function(){
        //admin/ManagerAdmin/them
        Route::get('danhsach','UserController@getDanhSach');
        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');
        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');
        Route::get('xoa/{id}','UserController@getXoa');
    });
});