<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\DapurReportController;
use App\Http\Controllers\PramusajiReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use App\Models\PramusajiReport;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cabang', CabangController::class);
Route::resource('category', SubCategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('task', TaskController::class);
Route::resource('dapur', DapurReportController::class);
Route::resource('pramusaji', PramusajiReportController::class);
Route::get('/dapur/export/dapur', [DapurReportController::class, 'export'])->name('dapur.export');
Route::resource('test', TestController::class);
Route::resource('absensi', AbsensiController::class);