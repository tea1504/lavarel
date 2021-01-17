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

// Route::get('/', function () {
//     return view('frontend.layouts.master');
// });
Route::get('/hello', 'ExampleController@hello')->name('example.hello');
Route::get('/gioithieubanthan', 'ExampleController@gioithieu');
Route::get('/hoc/php', 'ExampleController@php');
Route::get('/hienthi', 'ExampleController@hienthi');
Route::get('/dangnhap', 'ExampleController@dangnhap');
Route::get('/test/Loai', 'LayDuLieuController@getLoai');
Route::get('/test/VanChuyen', 'LayDuLieuController@getVanChuyen');
Route::get('/test/SanPham', 'LayDuLieuController@getSanPham');
Route::get('/test/ChucNangBackend', function () {
    return view('test.chucNangBackend');
});
Route::get('admin/loai', 'Backend\LoaiController@index')->name('backend.loai.index');

Route::get('admin/loai/create', 'Backend\LoaiController@create')->name('backend.loai.create');
Route::post('admin/loai/store', 'Backend\LoaiController@store')->name('backend.loai.store');
Route::get('admin/loai/edit/{id}', 'Backend\LoaiController@edit')->name('backend.loai.edit');
Route::put('admin/loai/update/{id}', 'Backend\LoaiController@update')->name('backend.loai.update');
Route::delete('admin/loai/destroy/{id}', 'Backend\LoaiController@destroy')->name('backend.loai.destroy');
Route::get('admin/loai/print', 'Backend\LoaiController@print')->name('backend.loai.print');
Route::get('/admin/loai/excel', 'Backend\LoaiController@excel')->name('backend.loai.excel');
Route::get('/admin/loai/pdf', 'Backend\LoaiController@pdf')->name('backend.loai.pdf');

Route::resource('/admin/vanchuyen', 'Backend\VanChuyenController', ['as' => 'backend']);

Route::get('/admin/danhsachsanpham/pdf', 'Backend\SanPhamController@pdf')->name('backend.sanpham.pdf');
Route::get('/admin/sanpham/print', 'Backend\SanPhamController@print')->name('backend.sanpham.print');
Route::get('/admin/sanpham/excel', 'Backend\SanPhamController@excel')->name('backend.sanpham.excel');
Route::resource('/admin/sanpham', 'Backend\SanPhamController', ['as' => 'backend']);

Route::resource('/admin/donhang', 'Backend\DonHangController', ['as' => 'backend']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/laymatkhau', function () {
    return bcrypt("1");
});
Route::get('/lienhe', 'Frontend\FrontendController@contact')->name('frontend.lienhe');
Route::post('/lienhe/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');
Route::get('/admin/baocao/donhang', 'Admin\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Admin\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');
