<?php

use App\Http\Controllers\API\APIController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/thongke/top3_sanpham_moinhat', 'API\APIController@thongke_top3_sanpham_moinhat')->name('api.thongke.top3_sanpham_moinhat');
Route::post('/sanpham/timkiem', 'API\APIController@tim_sp')->name('api.sanpham.timkiem');