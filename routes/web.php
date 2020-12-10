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
Route::post('admin/loai/create', 'Backend\LoaiController@store')->name('backend.loai.store');