<?php

use App\Http\Controllers\quoteExportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvidesController;
use App\Http\Controllers\QuoteExportController as ControllersQuoteExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Kho hàng
Route::resource('kho-hang', ProductController::class);
Route::get('/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
Route::get('/showProductInventory/{id?}', [ProductController::class, 'showProductInventory'])->name('kho-hang.showProductInventory');

// Nhà cung cấp
Route::resource('provides', ProvidesController::class);

Route::get('/', function () {
    return view('welcome');
});

//Bán hàng
//Báo giá
Route::resource('quoteExport', QuoteExportController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
