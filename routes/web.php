<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\DetailImportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvidesController;
use App\Http\Controllers\QuoteExportController;
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
Route::resource('inventory', ProductController::class);
Route::get('/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
Route::get('/showProductInventory/{id?}', [ProductController::class, 'showProductInventory'])->name('inventory.showProductInventory');

// Nhà cung cấp
Route::resource('provides', ProvidesController::class);
// Khách hàng
Route::resource('guests', GuestController::class);

// Mua hàng
Route::resource('import',DetailImportController::class);
Route::get('/show_provide',[DetailImportController::class,'show_provide'])->name('show_provide');
Route::get('/addNewProvide',[DetailImportController::class,'addNewProvide'])->name('addNewProvide');

Route::get('/', function () {
    return view('welcome');
});

//Bán hàng
//Báo giá
Route::resource('quoteExport', QuoteExportController::class);
//tìm kiếm tên khách hàng
Route::get('/searchExport', [QuoteExportController::class, 'searchGuest'])->name('searchExport');
//Thêm khách hàng
Route::get('/addGuest', [QuoteExportController::class, 'addGuest'])->name('addGuest');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
