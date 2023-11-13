<?php

use App\Http\Controllers\BillSaleController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DetailExportController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DetailImportController;
use App\Http\Controllers\PayExportController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvidesController;
use App\Http\Controllers\QuoteExportController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\RecieptController;
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
Route::get('/searchInventory', [ProductController::class, 'search'])->name('searchInventory');

Route::get('/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
Route::get('/showProductInventory/{id?}', [ProductController::class, 'showProductInventory'])->name('inventory.showProductInventory');

// Nhà cung cấp
Route::resource('provides', ProvidesController::class);
// Khách hàng
Route::resource('guests', GuestController::class);
Route::get('/search', [GuestController::class, 'search'])->name('search');

// Mua hàng
Route::resource('import', DetailImportController::class);
Route::get('/show_provide', [DetailImportController::class, 'show_provide'])->name('show_provide');
Route::get('/show_project', [DetailImportController::class, 'show_project'])->name('show_project');
Route::get('/addNewProvide', [DetailImportController::class, 'addNewProvide'])->name('addNewProvide');
Route::get('/getAllProducts', [DetailImportController::class, 'getAllProducts'])->name('getAllProducts');
Route::get('/showProductName', [DetailImportController::class, 'showProductName'])->name('showProductName');
Route::get('/checkSN', [DetailImportController::class, 'checkSN'])->name('checkSN');
Route::get('/checkduplicateSN', [DetailImportController::class, 'checkduplicateSN'])->name('checkduplicateSN');

// Đơn nhận hàng
Route::resource('receive', ReceiveController::class);
Route::get('/show_receive', [ReceiveController::class, 'show_receive'])->name('show_receive');
Route::get('/getProduct_receive', [ReceiveController::class, 'getProduct_receive'])->name('getProduct_receive');


// Hóa đơn mua hàng
Route::resource('reciept', RecieptController::class);
Route::get('/show_reciept', [RecieptController::class, 'show_reciept'])->name('show_reciept');
Route::get('/getProduct_reciept', [RecieptController::class, 'getProduct_reciept'])->name('getProduct_reciept');


// Thanh toán nhập hàng
Route::resource('paymentOrder', PayOrderController::class);

Route::get('/', function () {
    return view('welcome');
});

//Bán hàng
//Báo giá
Route::resource('detailExport', DetailExportController::class);
//tìm kiếm tên khách hàng
Route::get('/searchExport', [DetailExportController::class, 'searchGuest'])->name('searchExport');
//Thêm khách hàng
Route::get('/addGuest', [DetailExportController::class, 'addGuest'])->name('addGuest');
//Lấy thông tin sản phẩm
Route::get('/getProduct', [DetailExportController::class, 'getProduct'])->name('getProduct');
//Lấy mã sản phẩm
Route::get('/getProductCode', [DetailExportController::class, 'getProductCode'])->name('getProductCode');

//Giao hàng
Route::resource('delivery', DeliveryController::class);
//Lấy thông tin từ số báo giá
Route::get('/getInfoQuote', [DeliveryController::class, 'getInfoQuote'])->name('getInfoQuote');
Route::get('/getProductQuote', [DeliveryController::class, 'getProductQuote'])->name('getProductQuote');
Route::get('/getProductFromQuote', [DeliveryController::class, 'getProductFromQuote'])->name('getProductFromQuote');
//Hóa đơn bán hàng
Route::resource('billSale', BillSaleController::class);
//lấy thông tin từ số báo giá trong hóa đơn
Route::get('/getInfoDelivery', [BillSaleController::class, 'getInfoDelivery'])->name('getInfoDelivery');
Route::get('/getProductDelivery', [BillSaleController::class, 'getProductDelivery'])->name('getProductDelivery');

//thanh toán bán hàng
Route::resource('payExport', PayExportController::class);
Route::get('/getInfoPay', [PayExportController::class, 'getInfoPay'])->name('getInfoPay');
Route::get('/getProductPay', [PayExportController::class, 'getProductPay'])->name('getProductPay');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
