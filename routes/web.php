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
Route::get('/hello','ExampleController@hello')->name('example.hello');
Route::get('/gioithieubanthan','ExampleController@gioithieu');
Route::get('/hoc/php', 'ExampleController@php');
Route::get('/hienthi','ExampleController@hienthi');
Route::get('/dangnhap','ExampleController@dangnhap');
Route::get('/test/Loai','LayDuLieuController@getLoai');
Route::get('/test/VanChuyen','LayDuLieuController@getVanChuyen');
Route::get('/test/SanPham','LayDuLieuController@getSanPham');
Route::get('/test/ChucNangBackend',function(){
    return view('test.chucNangBackend');
});
Route::get('admin/loai', 'Backend\LoaiController@index')->name('backend.loai.index');

Route::get('admin/loai/create', 'Backend\LoaiController@create')->name('backend.loai.create');
Route::post('admin/loai/store', 'Backend\LoaiController@store')->name('backend.loai.store');
Route::get('admin/loai/edit/{id}', 'Backend\LoaiController@edit')->name('backend.loai.edit');
Route::put('admin/loai/update/{id}', 'Backend\LoaiController@update')->name('backend.loai.update');
Route::delete('admin/loai/destroy/{id}', 'Backend\LoaiController@destroy')->name('backend.loai.destroy');

Route::get('admin/vanchuyen', 'Backend\VanChuyenController@index')->name('backend.vanchuyen.index');
Route::get('admin/vanchuyen/create', 'Backend\VanChuyenController@create')->name('backend.vanchuyen.create');
Route::post('admin/vanchuyen/store', 'Backend\VanChuyenController@store')->name('backend.vanchuyen.store');
Route::get('admin/vanchuyen/edit/{id}', 'Backend\VanChuyenController@edit')->name('backend.vanchuyen.edit');
Route::put('admin/vanchuyen/update/{id}', 'Backend\VanChuyenController@update')->name('backend.vanchuyen.update');
Route::delete('admin/vanchuyen/destroy/{id}', 'Backend\VanChuyenController@destroy')->name('backend.vanchuyen.destroy');

Route::resource('/admin/sanpham', 'Backend\SanPhamController', ['as' => 'backend']);