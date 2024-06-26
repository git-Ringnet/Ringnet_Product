<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\WorkspaceController;
use App\Http\Controllers\BillSaleController;
use App\Http\Controllers\CashReceiptController;
use App\Http\Controllers\ChangeInventoryController;
use App\Http\Controllers\ChangeWarehouseController;
use App\Http\Controllers\ContentGroupsController;
use App\Http\Controllers\ContentImportExportController;
use App\Http\Controllers\DashboardController;
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
use App\Http\Controllers\FundController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReturnExportController;
use App\Http\Controllers\ReturnImportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserFlowController;
use App\Http\Controllers\UserWorkspacesController;
use App\Http\Controllers\WarehouseController;
use App\Http\Middleware\CheckLogin;
use App\Models\ContentImportExport;
use App\Models\DetailImport;
use App\Models\ReturnExport;
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
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/inventory', ProductController::class);
    Route::get('/searchInventory', [ProductController::class, 'search'])->name('searchInventory');
    Route::get('/checkProductName', [ProductController::class, 'checkProductName'])->name('checkProductName');
    Route::get('{workspacename}/editProduct', [ProductController::class, 'editProduct'])->name('editProduct');
    Route::get('/showProductInventory/{id?}', [ProductController::class, 'showProductInventory'])->name('inventory.showProductInventory');
    Route::resource('{workspace}/warehouse', WarehouseController::class);
    Route::resource('{workspace}/content', ContentGroupsController::class);
});

Route::resource('{workspace}/changeFund', ContentImportExportController::class);
// Route::resource('{workspace}/changeInventory',ChangeInventoryController::class);
// Route::get('/checkInventory',[ChangeInventoryController::class,'checkInventory'])->name('checkInventory');

// Nhà cung cấp
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/provides', ProvidesController::class)->middleware(CheckLogin::class);
    Route::get('/checkKeyProvide', [ProvidesController::class, 'checkKeyProvide'])->name('checkKeyProvide');
    Route::get('/searchProvides', [ProvidesController::class, 'search'])->name('searchProvides');
});

// Khách hàng
Route::resource('{workspace}/guests', GuestController::class);
Route::get('/search', [GuestController::class, 'search'])->name('searchGuest');
Route::get('/searchDetailGuest', [GuestController::class, 'searchDetailGuest'])->name('searchDetailGuest');

// Mua hàng
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/import', DetailImportController::class);
    Route::get('/show_provide', [DetailImportController::class, 'show_provide'])->name('show_provide');
    Route::get('/show_project', [DetailImportController::class, 'show_project'])->name('show_project');
    Route::get('/addNewProvide', [DetailImportController::class, 'addNewProvide'])->name('addNewProvide');
    Route::get('/updateProvide', [DetailImportController::class, 'updateProvide'])->name('updateProvide');
    Route::get('/getAllProducts', [DetailImportController::class, 'getAllProducts'])->name('getAllProducts');
    Route::get('/showProductName', [DetailImportController::class, 'showProductName'])->name('showProductName');
    Route::get('/checkSN', [DetailImportController::class, 'checkSN'])->name('checkSN');
    Route::get('/checkduplicateSN', [DetailImportController::class, 'checkduplicateSN'])->name('checkduplicateSN');
    Route::POST('addAttachment', [DetailImportController::class, 'addAttachment'])->name('addAttachment');
    Route::get('/download/{folder}/{file?}', [DetailImportController::class, 'downloadFile'])->name('downloadFile');
    Route::delete('/deleteFile/{folder}/{file}', [DetailImportController::class, 'deleteFile'])->name('deleteFile');
    Route::get('/checkQuotetion', [DetailImportController::class, 'checkQuotetion'])->name('checkQuotetion');
    Route::get('/getInventory', [DetailImportController::class, 'getInventory'])->name('getInventory');
    Route::get('/getHistoryImport', [DetailImportController::class, 'getHistoryImport'])->name('getHistoryImport');
    Route::get('/searchImport', [DetailImportController::class, 'searchImport'])->name('searchImport');
    Route::get('/getDataForm', [DetailImportController::class, 'getDataForm'])->name('getDataForm');
    Route::get('/addNewForm', [DetailImportController::class, 'addNewForm'])->name('addNewForm');
    Route::get('/updateForm', [DetailImportController::class, 'updateForm'])->name('updateForm');
    Route::get('/deleteForm', [DetailImportController::class, 'deleteForm'])->name('deleteForm');
    Route::get('/setDefault', [DetailImportController::class, 'setDefault'])->name('setDefault');
    Route::get('/showData', [DetailImportController::class, 'showData'])->name('showData');
    Route::get('/getDataImport', [DetailImportController::class, 'getDataImport'])->name('getDataImport');
    Route::get('/checkAction', [DetailImportController::class, 'checkAction'])->name('checkAction');
    Route::resource('{workspace}/groups', GroupsController::class);
    Route::get('/dataObj', [GroupsController::class, 'dataObj'])->name('dataObj');
    Route::get('/updateDataGroup', [GroupsController::class, 'updateDataGroup'])->name('updateDataGroup');
    Route::resource('funds', FundController::class);

    Route::get('/getWarehouse', [DetailImportController::class, 'getWarehouse'])->name('getWarehouse');
});

// Trả hàng KH
Route::resource('{workspace}/returnExport', ReturnExportController::class);
// Phiếu Thu
Route::resource('{workspace}/cash_receipts', CashReceiptController::class);
Route::get('/getInfoDeliveryReciepts', [CashReceiptController::class, 'getInfoDeliveryReciepts'])->name('getInfoDeliveryReciepts');


// Phiếu chuyển kho
// Route::resource('{workspace}/changeWarehouse',[ChangeWarehouseController::class]);
Route::resource('{workspace}/changeWarehouse', ChangeWarehouseController::class);
Route::get('/getProductByWarehouse', [ChangeWarehouseController::class, 'getProductByWarehouse'])->name('getProductByWarehouse');

// Trả hàng NCC
Route::resource('{workspace}/returnImport', ReturnImportController::class);
Route::get('/show_receiveBill', [ReturnImportController::class, 'show_receiveBill'])->name('show_receiveBill');
Route::get('/getSNByBill', [ReturnImportController::class, 'getSNByBill'])->name('getSNByBill');

Route::get('/checkQuotetionExport', [DetailExportController::class, 'checkQuotetionExport'])->name('checkQuotetionExport');
Route::get('/checkQuotetionExportEdit', [DetailExportController::class, 'checkQuotetionExportEdit'])->name('checkQuotetionExportEdit');
Route::get('/searchDetailExport', [DetailExportController::class, 'searchDetailExport'])->name('searchDetailExport');

Route::resource('DateForm', DateFormController::class);
Route::get('/addUserFlow', [DateFormController::class, 'addUserFlow'])->name('addUserFlow');

Route::get('/addDateForm', [DateFormController::class, 'addDateForm'])->name('addDateForm');
Route::get('/updateDateForm', [DateFormController::class, 'updateDateForm'])->name('updateDateForm');
Route::get('/deleteDateForm', [DateFormController::class, 'deleteDateForm'])->name('deleteDateForm');
Route::get('/setDefaultGuest', [DateFormController::class, 'setDefault'])->name('setDefaultGuest');
Route::get('/searchDateForm', [DateFormController::class, 'searchDateForm'])->name('searchDateForm');
Route::get('/searchFormByGuestId', [DetailExportController::class, 'searchFormByGuestId'])->name('searchFormByGuestId');

// Đơn nhận hàng
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/receive', ReceiveController::class);
    Route::get('/show_receive', [ReceiveController::class, 'show_receive'])->name('show_receive');
    Route::get('/getProduct_receive', [ReceiveController::class, 'getProduct_receive'])->name('getProduct_receive');
    Route::get('/searchReceive', [ReceiveController::class, 'searchReceive'])->name('searchReceive');
});
// Xác nhận đơn nhận hàng
// Route::resource('historyReceive', HistoryReceiveController::class);

// Hóa đơn mua hàng
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/reciept', RecieptController::class);
    Route::get('/show_reciept', [RecieptController::class, 'show_reciept'])->name('show_reciept');
    Route::get('/getProduct_reciept', [RecieptController::class, 'getProduct_reciept'])->name('getProduct_reciept');
    Route::get('/searchReciept', [RecieptController::class, 'searchReciept'])->name('searchReciept');
});

// Thanh toán nhập hàng
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/paymentOrder', PayOrderController::class);
    Route::get('getPaymentOrder', [PayOrderController::class, 'getPaymentOrder'])->name('getPaymentOrder');
    Route::get('searchPaymentOrder', [PayOrderController::class, 'searchPaymentOrder'])->name('searchPaymentOrder');
    Route::get('/getReturnProduct', [PayOrderController::class, 'getReturnProduct'])->name('getReturnProduct');
});


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// PDF
// Route::resource('pdf', PdfController::class);
Route::get('/pdf/{id?}', [PdfController::class, 'index'])->name('pdf');
Route::get('/pdfdelivery{id?}', [PdfController::class, 'pdfdelivery'])->name('pdfdelivery');
Route::get('/pdfBillSale{id?}', [PdfController::class, 'pdfBillSale'])->name('pdfBillSale');
Route::get('/pdfPayExport{id?}', [PdfController::class, 'pdfPayExport'])->name('pdfPayExport');
Route::get('/excel/{id?}', [PdfController::class, 'export'])->name('excel');

Route::get('/download-excel', [DetailExportController::class, 'downloadExcel'])->name('download.excel');
Route::get('/clear-session', [DetailExportController::class, 'clearSession'])->name('clear.session');

Route::get('/download-pdf', [DetailExportController::class, 'downloadPdf'])->name('download.pdf');
Route::get('/download-pdf-delivery', [DeliveryController::class, 'downloadPdf'])->name('download.pdf.delivery');
Route::get('/download-pdf-billsale', [BillSaleController::class, 'downloadPdf'])->name('download.pdf.billsale');
Route::get('/download-pdf-payExport', [PayExportController::class, 'downloadPdf'])->name('download.pdf.payexport');
Route::get('/clear-pdf-session', [DetailExportController::class, 'clearPdfSession'])->name('clear.pdf.session');


//Bán hàng
//Lưu thao tác
Route::get('/addActivity', [UserFlowController::class, 'addActivity'])->name('addActivity');
//Báo giá
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/detailExport', DetailExportController::class);
    Route::get('{workspace}/seeInfo/{id}', [DetailExportController::class, 'seeInfo'])->name('seeInfo');
});

//tìm kiếm tên khách hàng
Route::get('/searchExport', [DetailExportController::class, 'searchGuest'])->name('searchExport');
//người đại diện
Route::get('/searchRepresent', [DetailExportController::class, 'searchRepresent'])->name('searchRepresent');
//Xóa người đại diện
Route::get('/deleteRepresentGuest', [DetailExportController::class, 'deleteRepresentGuest'])->name('deleteRepresentGuest');
//Xóa dự án
Route::get('/deleteProject', [DetailExportController::class, 'deleteProject'])->name('deleteProject');
//thông tin chi tiết người đại diện
Route::get('/editRepresent', [DetailExportController::class, 'editRepresent'])->name('editRepresent');
//Lấy thông tin chi tiết khách
Route::get('/editGuest', [DetailExportController::class, 'editGuest'])->name('editGuest');
//Cập nhật thông tin khách hàng
Route::get('/updateGuest', [DetailExportController::class, 'updateGuest'])->name('updateGuest');
//Cập nhật thông tin người đại diện
Route::get('/updateRepresent', [DetailExportController::class, 'updateRepresent'])->name('updateRepresent');
//Mặc định thông tin người đại diện
Route::get('/defaultRepresent', [DetailExportController::class, 'defaultRepresent'])->name('defaultRepresent');
//tìm kiếm tên project
Route::get('/searchProject', [DetailExportController::class, 'searchProject'])->name('searchProject');
//Thêm khách hàng
Route::get('/addGuest', [DetailExportController::class, 'addGuest'])->name('addGuest');
//
Route::get('/deleteGuest', [DetailExportController::class, 'deleteGuest'])->name('deleteGuest');
//Thêm người đại diện
Route::get('/addRepresentGuest', [DetailExportController::class, 'addRepresentGuest'])->name('addRepresentGuest');
//Thêm dự án
Route::get('/addProject', [DetailExportController::class, 'addProject'])->name('addProject');
//Lấy thông tin sản phẩm
Route::get('/getProduct', [DetailExportController::class, 'getProduct'])->name('getProduct');
//Lấy mã sản phẩm
Route::get('/getProductCode', [DetailExportController::class, 'getProductCode'])->name('getProductCode');
//Lấy người đại diện theo khách hàng
Route::get('/getRepresentGuest', [DetailExportController::class, 'getRepresentGuest'])->name('getRepresentGuest');
//
Route::get('/getRecentTransaction', [DetailExportController::class, 'getRecentTransaction'])->name('getRecentTransaction');
//
Route::get('/checkProductExist', [DetailExportController::class, 'checkProductExist'])->name('checkProductExist');
//
Route::get('/getDataExport', [DetailExportController::class, 'getDataExport'])->name('getDataExport');
Route::get('/getListExport', [DetailExportController::class, 'getListExport'])->name('getListExport');

//Giao hàng
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/delivery', DeliveryController::class);
    Route::get('{workspace}/watchDelivery/{id}', [DeliveryController::class, 'watchDelivery'])->name('watchDelivery');
});

Route::get('searchDelivery', [DeliveryController::class, 'searchDelivery'])->name('searchDelivery');
//Lấy thông tin từ số báo giá
Route::get('/getInfoQuote', [DeliveryController::class, 'getInfoQuote'])->name('getInfoQuote');
Route::get('/getProductQuote', [DeliveryController::class, 'getProductQuote'])->name('getProductQuote');
Route::get('/getProductFromQuote', [DeliveryController::class, 'getProductFromQuote'])->name('getProductFromQuote');
Route::get('/getInfoDeliveryReturnExport', [ReturnExportController::class, 'getInfoDeliveryReturnExport'])->name('getInfoDeliveryReturnExport');
Route::get('/getProductDeliveryRtExport', [ReturnExportController::class, 'getProductDeliveryRtExport'])->name('getProductDeliveryRtExport');
//Hóa đơn bán hàng
Route::resource('{workspace}/billSale', BillSaleController::class);
//lấy thông tin từ số báo giá trong hóa đơn
Route::get('/getInfoDelivery', [BillSaleController::class, 'getInfoDelivery'])->name('getInfoDelivery');
Route::get('/getProductDelivery', [BillSaleController::class, 'getProductDelivery'])->name('getProductDelivery');
//Kiểm tra số hóa đơn
Route::get('/checkNumberBill', [BillSaleController::class, 'checkNumberBill'])->name('checkNumberBill');
// ajax Bilsale
Route::get('/searchBillSale', [BillSaleController::class, 'searchBillSale'])->name('searchBillSale');
//Kiểm tra mã giao hàng
Route::get('/checkCodeDelivery', [DeliveryController::class, 'checkCodeDelivery'])->name('checkCodeDelivery');
//Kiểm tra mã thanh toán
Route::get('/checkCodePayment', [PayExportController::class, 'checkCodePayment'])->name('checkCodePayment');

//thanh toán bán hàng
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/payExport', PayExportController::class);
    Route::get('searchPayExport', [PayExportController::class, 'searchPayExport'])->name('searchPayExport');
    Route::get('/getInfoPay', [PayExportController::class, 'getInfoPay'])->name('getInfoPay');
    Route::get('/getProductPay', [PayExportController::class, 'getProductPay'])->name('getProductPay');
});

//danh sách serial number theo product
Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/getProductSeri', [ProductController::class, 'getProductSeri'])->name('getProductSeri');
    Route::get('/getProductSeribyIdDilivery', [ProductController::class, 'getProductSeribyIdDilivery'])->name('getProductSeribyIdDilivery');
    Route::get('/getProductSeriEdit', [ProductController::class, 'getProductSeriEdit'])->name('getProductSeriEdit');

    Route::get('exportDatabase', [ProductController::class, 'exportDatabase'])->name('exportDatabase');
    Route::post('import', [ProductController::class, 'import'])->name('import');
    Route::POST('/importDatabase', [ProductController::class, 'importDatabase'])->name('importDatabase');
    Route::get('/checkProductTax', [ProductController::class, 'checkProductTax'])->name('checkProductTax');
});


Route::get('/report', function () {
    return view('tables.report.report');
});
// Lịch sử giao dịch
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/history', HistoryController::class);
    Route::get('getSN', [HistoryController::class, 'getSN'])->name('getSN');
    Route::get('/searchHistory', [HistoryController::class, 'searchHistory'])->name('searchHistory');
});
// Invite workspace
Route::get('/login/{token}/invite/{workspace_id}', [InvitationController::class, 'inviteUser'])->name('invite');

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/updateInvitations', [InvitationController::class, 'updateInvitations'])->name('updateInvitations');
    Route::post('/invite', [InvitationController::class, 'index'])->name('sendInvitation');
    Route::get('/send-mail', [InvitationController::class, 'index']);
});

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
Route::post('/create-workspace', [ProviderController::class, 'createWorkspace'])->name('createWorkspace');
Route::get('/landing-page', [WorkspaceController::class, 'landingPage'])->name('landingPage');
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('workspace', WorkspaceController::class);
    Route::get('/updateWorkspaceUser', [WorkspaceController::class, 'updateWorkspaceUser'])->name('updateWorkspaceUser');
    Route::get('/updateWorkspace', [WorkspaceController::class, 'updateWorkspace'])->name('updateWorkspace');
    Route::get('/checkWorkspaceName', [WorkspaceController::class, 'checkWorkspaceName'])->name('checkWorkspaceName');

    Route::resource('{workspace}/userWorkspace', UserWorkspacesController::class);
    Route::get('/updateRoleWorkspace', [UserWorkspacesController::class, 'updateRoleWorkspace'])->name('updateRoleWorkspace');
    Route::get('/searchUserWorkspace', [UserWorkspacesController::class, 'searchUserWorkspace'])->name('searchUserWorkspace');
    Route::get('/deleteUserWorkspace', [UserWorkspacesController::class, 'deleteUserWorkspace'])->name('deleteUserWorkspace');
});

// Report
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/report', ReportController::class);
    Route::get('searchReportGuests', [ReportController::class, 'searchReportGuests'])->name('searchReportGuests');
    Route::get('searchReportProvides', [ReportController::class, 'searchReportProvides'])->name('searchReportProvides');
    Route::get('/view', [ReportController::class, 'view'])->name('view');
    Route::get('{workspace}/sumDelivery', [ReportController::class, 'viewReportDelivery'])->name('viewReportDelivery');
    Route::get('{workspace}/viewReportSumReturnExport', [ReportController::class, 'viewReportSumReturnExport'])->name('viewReportSumReturnExport');
    Route::get('{workspace}/viewReportSell', [ReportController::class, 'viewReportSell'])->name('viewReportSell');
    Route::get('{workspace}/viewReportSumSellProfit', [ReportController::class, 'viewReportSumSellProfit'])->name('viewReportSumSellProfit');
    Route::get('{workspace}/viewReportDebtGuests', [ReportController::class, 'viewReportDebtGuests'])->name('viewReportDebtGuests');

    Route::get('{workspace}/viewReportProvides', [ReportController::class, 'viewReportProvides'])->name('viewReportProvides');
    Route::get('{workspace}/viewReportImport', [ReportController::class, 'viewReportImport'])->name('viewReportImport');
    Route::get('{workspace}/viewReportChangeFunds', [ReportController::class, 'viewReportChangeFunds'])->name('viewReportChangeFunds');
    Route::get('{workspace}/viewReportIE', [ReportController::class, 'viewReportIE'])->name('viewReportIE');
    Route::get('{workspace}/viewReportReturnImport', [ReportController::class, 'viewReportReturnImport'])->name('viewReportReturnImport');
    Route::get('{workspace}/viewReportIEFunds', [ReportController::class, 'viewReportIEFunds'])->name('viewReportIEFunds');
    Route::get('{workspace}/viewReportIEEnventory', [ReportController::class, 'viewReportIEEnventory'])->name('viewReportIEEnventory');
    
});

Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/settings', SettingController::class);
    Route::get('{workspace}/overview', [SettingController::class, 'overview'])->name('overview');
    Route::get('{workspace}/user', [SettingController::class, 'viewUser'])->name('viewUser');
    Route::get('{workspace}/viewCompany', [SettingController::class, 'viewCompany'])->name('viewCompany');
    Route::post('/deleteAllTable', [SettingController::class, 'deleteAllTable'])->name('deleteAllTable');
    Route::get('/searchUser', [SettingController::class, 'search'])->name('searchUser');
    Route::get('/searchUser', [SettingController::class, 'search'])->name('searchUser');
    Route::post('/updateUser', [SettingController::class, 'updateUser'])->name('user.update');
    Route::post('/updateWorkspaceName', [SettingController::class, 'updateWorkspaceName'])->name('updateWorkspaceName');
});
//Dashboard
Route::middleware([CheckLogin::class])->group(function () {
    Route::resource('{workspace}/dashboardProduct', DashboardController::class);
    //Sản phẩm bán chạy nhất
    Route::get('/productSell', [DashboardController::class, 'productSell'])->name('productSell');
    //Hoạt động bán hàng
    Route::get('/statusSales', [DashboardController::class, 'statusSales'])->name('statusSales');
    //Đơn báo giá đã xác nhận
    Route::get('/exportAccept', [DashboardController::class, 'exportAccept'])->name('exportAccept');
    //
    Route::get('/topEmployee', [DashboardController::class, 'topEmployee'])->name('topEmployee');
    //
    Route::get('/revenueByQuarter', [DashboardController::class, 'revenueByQuarter'])->name('revenueByQuarter');
    //Dự nợ
    Route::get('/debtChart', [DashboardController::class, 'debtChart'])->name('debtChart');
});

// User flow
Route::resource('{workspace}/userflow', UserFlowController::class)->middleware(CheckLogin::class);

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
