<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\FinalisController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
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
// Route::post('/payment', [VoucherController::class, 'payment']);
Route::get('/finalis', [FinalisController::class, 'index']);
Route::get('/chart', [ChartController::class, 'index']);
Route::get('/voucher', [VoucherController::class, 'index']);
// Route::get('/invoice/{id}', [VoucherController::class, 'invoice']);
Route::post('/kode', [FinalisController::class, 'kode']);
Route::post('/finalis', [FinalisController::class, 'post']);
Route::post('/voucher', [VoucherController::class, 'payment']);
Route::post('/vouchers', [VoucherController::class, 'save']);
