<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\WorkspaceController;
use App\Http\Controllers\BillSaleController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DetailExportController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DetailImportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HistoryReceiveController;
use App\Http\Controllers\PayExportController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvidesController;
use App\Http\Controllers\QuoteExportController;
use App\Http\Controllers\DateFormController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\RecieptController;
use App\Models\DetailImport;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
Route::resource('{workspace}/inventory', ProductController::class);
Route::get('/searchInventory', [ProductController::class, 'search'])->name('searchInventory');

Route::get('{workspacename}/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
Route::get('/showProductInventory/{id?}', [ProductController::class, 'showProductInventory'])->name('inventory.showProductInventory');

// Nhà cung cấp
Route::resource('{workspace}/provides', ProvidesController::class);
Route::get('/searchProvides', [ProvidesController::class, 'search'])->name('searchProvides');

// Khách hàng
Route::resource('{workspace}/guests', GuestController::class);
Route::get('/search', [GuestController::class, 'search'])->name('search');
Route::get('/searchDetailGuest', [GuestController::class, 'searchDetailGuest'])->name('searchDetailGuest');

// Mua hàng
Route::resource('{workspace}/import', DetailImportController::class);
Route::get('/show_provide', [DetailImportController::class, 'show_provide'])->name('show_provide');
Route::get('/show_project', [DetailImportController::class, 'show_project'])->name('show_project');
Route::get('/addNewProvide', [DetailImportController::class, 'addNewProvide'])->name('addNewProvide');
Route::get('/getAllProducts', [DetailImportController::class, 'getAllProducts'])->name('getAllProducts');
Route::get('/showProductName', [DetailImportController::class, 'showProductName'])->name('showProductName');
Route::get('/checkSN', [DetailImportController::class, 'checkSN'])->name('checkSN');
Route::get('/checkduplicateSN', [DetailImportController::class, 'checkduplicateSN'])->name('checkduplicateSN');
Route::POST('addAttachment', [DetailImportController::class, 'addAttachment'])->name('addAttachment');
Route::get('/download/{folder}/{file?}', [DetailImportController::class, 'downloadFile'])->name('downloadFile');
Route::delete('/deleteFile/{folder}/{file}', [DetailImportController::class, 'deleteFile'])->name('deleteFile');
Route::get('/checkQuotetion', [DetailImportController::class, 'checkQuotetion'])->name('checkQuotetion');

Route::get('/checkQuotetionExport', [DetailExportController::class, 'checkQuotetionExport'])->name('checkQuotetionExport');
Route::get('/checkQuotetionExportEdit', [DetailExportController::class, 'checkQuotetionExportEdit'])->name('checkQuotetionExportEdit');

Route::resource('DateForm', DateFormController::class);
Route::get('/addDateForm', [DateFormController::class, 'addDateForm'])->name('addDateForm');
Route::get('/updateDateForm', [DateFormController::class, 'updateDateForm'])->name('updateDateForm');
Route::get('/deleteDateForm', [DateFormController::class, 'deleteDateForm'])->name('deleteDateForm');
Route::get('/setDefault', [DateFormController::class, 'setDefault'])->name('setDefault');
Route::get('/searchDateForm', [DateFormController::class, 'searchDateForm'])->name('searchDateForm');
Route::get('/searchFormByGuestId', [DetailExportController::class, 'searchFormByGuestId'])->name('searchFormByGuestId');
Route::get('/getDataForm', [DetailImportController::class, 'getDataForm'])->name('getDataForm');
Route::get('/addNewForm', [DetailImportController::class, 'addNewForm'])->name('addNewForm');
Route::get('/updateForm', [DetailImportController::class, 'updateForm'])->name('updateForm');
Route::get('/deleteForm', [DetailImportController::class, 'deleteForm'])->name('deleteForm');
Route::get('/setDefault', [DetailImportController::class, 'setDefault'])->name('setDefault');
Route::get('/showData', [DetailImportController::class, 'showData'])->name('showData');



// Đơn nhận hàng
Route::resource('{workspace}/receive', ReceiveController::class);
Route::get('/show_receive', [ReceiveController::class, 'show_receive'])->name('show_receive');
Route::get('/getProduct_receive', [ReceiveController::class, 'getProduct_receive'])->name('getProduct_receive');
// Xác nhận đơn nhận hàng
// Route::resource('historyReceive', HistoryReceiveController::class);

// Hóa đơn mua hàng
Route::resource('{workspace}/reciept', RecieptController::class);
Route::get('/show_reciept', [RecieptController::class, 'show_reciept'])->name('show_reciept');
Route::get('/getProduct_reciept', [RecieptController::class, 'getProduct_reciept'])->name('getProduct_reciept');


// Thanh toán nhập hàng
Route::resource('{workspace}/paymentOrder', PayOrderController::class);
Route::get('getPaymentOrder', [PayOrderController::class, 'getPaymentOrder'])->name('getPaymentOrder');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// PDF
// Route::resource('pdf', PdfController::class);
Route::get('/pdf/{id?}', [PdfController::class, 'index'])->name('pdf');
Route::get('/pdfdelivery{id?}', [PdfController::class, 'pdfdelivery'])->name('pdfdelivery');
Route::get('/excel/{id?}', [PdfController::class, 'export'])->name('excel');


//Bán hàng
//Báo giá
Route::resource('{workspace}/detailExport', DetailExportController::class);
Route::get('{workspace}/seeInfo/{id}', [DetailExportController::class, 'seeInfo'])->name('seeInfo');
//tìm kiếm tên khách hàng
Route::get('/searchExport', [DetailExportController::class, 'searchGuest'])->name('searchExport');
//người đại diện
Route::get('/searchRepresent', [DetailExportController::class, 'searchRepresent'])->name('searchRepresent');
//Xóa người đại diện
Route::get('/deleteRepresentGuest', [DetailExportController::class, 'deleteRepresentGuest'])->name('deleteRepresentGuest');
//thông tin chi tiết người đại diện
Route::get('/editRepresent', [DetailExportController::class, 'editRepresent'])->name('editRepresent');
//tìm kiếm tên project
Route::get('/searchProject', [DetailExportController::class, 'searchProject'])->name('searchProject');
//Thêm khách hàng
Route::get('/addGuest', [DetailExportController::class, 'addGuest'])->name('addGuest');
//Thêm người đại diện
Route::get('/addRepresentGuest', [DetailExportController::class, 'addRepresentGuest'])->name('addRepresentGuest');
//Lấy thông tin sản phẩm
Route::get('/getProduct', [DetailExportController::class, 'getProduct'])->name('getProduct');
//Lấy mã sản phẩm
Route::get('/getProductCode', [DetailExportController::class, 'getProductCode'])->name('getProductCode');
//Lấy người đại diện theo khách hàng
Route::get('/getRepresentGuest', [DetailExportController::class, 'getRepresentGuest'])->name('getRepresentGuest');

//Giao hàng
Route::resource('{workspace}/delivery', DeliveryController::class);
Route::get('{workspace}/watchDelivery/{id}', [DeliveryController::class, 'watchDelivery'])->name('watchDelivery');
//Lấy thông tin từ số báo giá
Route::get('/getInfoQuote', [DeliveryController::class, 'getInfoQuote'])->name('getInfoQuote');
Route::get('/getProductQuote', [DeliveryController::class, 'getProductQuote'])->name('getProductQuote');
Route::get('/getProductFromQuote', [DeliveryController::class, 'getProductFromQuote'])->name('getProductFromQuote');
//Hóa đơn bán hàng
Route::resource('{workspace}/billSale', BillSaleController::class);
//lấy thông tin từ số báo giá trong hóa đơn
Route::get('/getInfoDelivery', [BillSaleController::class, 'getInfoDelivery'])->name('getInfoDelivery');
Route::get('/getProductDelivery', [BillSaleController::class, 'getProductDelivery'])->name('getProductDelivery');

//thanh toán bán hàng
Route::resource('{workspace}/payExport', PayExportController::class);

Route::get('/getInfoPay', [PayExportController::class, 'getInfoPay'])->name('getInfoPay');
Route::get('/getProductPay', [PayExportController::class, 'getProductPay'])->name('getProductPay');

//danh sách serial number theo product
Route::get('/getProductSeri', [ProductController::class, 'getProductSeri'])->name('getProductSeri');
Route::get('/getProductSeriEdit', [ProductController::class, 'getProductSeriEdit'])->name('getProductSeriEdit');

Route::get('exportDatabase', [ProductController::class, 'exportDatabase'])->name('exportDatabase');
Route::post('import', [ProductController::class, 'import'])->name('import');

// Lịch sử giao dịch
Route::resource('{workspace}/history', HistoryController::class);
Route::get('getSN', [HistoryController::class, 'getSN'])->name('getSN');
Route::get('/searchHistory', [HistoryController::class, 'searchHistory'])->name('searchHistory');

// Invite workspace
Route::get('/login/{token}/invite/{workspace_id}', [InvitationController::class, 'inviteUser'])->name('invite');

Route::get('/updateInvitations', [InvitationController::class, 'updateInvitations'])->name('updateInvitations');

Route::post('/invite', [InvitationController::class, 'index'])->name('sendInvitation');
Route::get('/send-mail', [InvitationController::class, 'index']);



Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
Route::post('/create-workspace', [ProviderController::class, 'createWorkspace'])->name('createWorkspace');

Route::resource('workspace', WorkspaceController::class);
Route::get('/updateWorkspaceUser', [WorkspaceController::class, 'updateWorkspaceUser'])->name('updateWorkspaceUser');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect()->route('workspace.index');
    })->name('dashboard');
});
