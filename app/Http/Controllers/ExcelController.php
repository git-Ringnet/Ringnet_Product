<?php

namespace App\Http\Controllers;

use App\Exports\DebtGuestsExport;
use App\Exports\ExportSumBusiness;
use App\Exports\SalesReportExport;
use App\Exports\GenericExport;
use App\Exports\GuestExport;
use App\Models\CashReceipt;
use App\Models\Commission;
use App\Models\ContentGroups;
use App\Models\ContentImportExport;
use App\Models\Delivered;
use App\Models\DetailImport;
use App\Models\Fund;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\PayOder;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\Provides;
use App\Models\User;
use App\Models\Warehouse;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportGuests(Request $request)
    {
        $guests = Guest::leftJoin('users', 'guest.user_id', '=', 'users.id')
            ->leftJoin('represent_guest', function ($join) {
                $join->on('guest.id', '=', 'represent_guest.guest_id')
                    ->whereRaw('represent_guest.id = (select min(id) from represent_guest where guest_id = guest.id)');
            })
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->orderBy('guest.id', 'DESC')
            ->groupBy(
                'guest.key',
                'guest.guest_name_display',
                'guest.guest_address',
                'guest.guest_phone',
                'guest.birthday',
                'guest.guest_code',
                'guest.guest_email',
                'guest.fax',
                'guest.debt_limit',
                'guest.initial_debt',
                'represent_guest.represent_name',
                'represent_guest.represent_address',
                'represent_guest.represent_phone',
                'users.name',
                'guest.group_id',
            )
            ->select(
                'guest.key',
                'guest.guest_name_display',
                'guest.guest_address',
                'guest.guest_phone',
                'guest.guest_email',
                'guest.debt_limit',
                'guest.initial_debt',
            )
            ->get();
        $headings =
            [
                'Mã',
                'Tên',
                'Địa chỉ',
                'Điện thoại',
                'Email',
                'Loại giá',
                'Định mức nợ',
                'Công nợ ban đầu',
            ];

        return Excel::download(new GenericExport($guests, $headings), 'guests.xlsx');
    }

    public function exportProvides(Request $request)
    {
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)
            ->select(
                'provides.key',
                'provides.provide_name_display',
                'provides.provide_address',
                'provides.provide_phone',
                'provides.provide_email',
                'provides.quota_debt',
                'provides.provide_debt',
            )
            ->get();
        $headings =
            [
                'Mã',
                'Tên',
                'Địa chỉ',
                'Điện thoại',
                'Email',
                'Định mức nợ',
                'Công nợ ban đầu',
            ];
        return Excel::download(new GenericExport($provides, $headings), 'provides.xlsx');
    }
    public function exportProducts(Request $request)
    {
        $products =  Products::where('workspace_id', Auth::user()->current_workspace)
            ->select(
                'product_code',
                'product_name',
                'product_unit',
                'product_price_import',
                'price_retail',
                'price_wholesale',
                'price_specialsale',
                'product_weight',
                'product_inventory'
            )
            ->get();
        $headings =
            [
                'Mã',
                'Tên',
                'ĐVT',
                'Giá nhập',
                'Giá bán lẻ',
                'Giá bán sỉ',
                'Giá đặc biệt',
                'Trọng lượng',
                'Số lượng tồn',
            ];
        return Excel::download(new GenericExport($products, $headings), 'products.xlsx');
    }
    public function exportFunds(Request $request)
    {
        $funds = Fund::where('workspace_id', Auth::user()->current_workspace)
            ->select('name', 'amount', 'start_date')
            ->get();
        $headings =
            [
                'Tên',
                'Tiền quỹ',
                'Ngày bắt đầu',
            ];
        return Excel::download(new GenericExport($funds, $headings), 'funds.xlsx');
    }
    public function exportUsers(Request $request)
    {
        $users = User::select('user_code', 'name', 'address', 'phone_number', 'email')
            ->get();
        $headings =
            [
                'Mã',
                'Tên',
                'Địa chỉ',
                'Điện thoại',
                'Email',
            ];
        return Excel::download(new GenericExport($users, $headings), 'users.xlsx');
    }
    public function exportWH(Request $request)
    {
        $warehouse = Warehouse::where('workspace_id', Auth::user()->current_workspace)
            ->select(
                'warehouse_code',
                'warehouse_name',
                'warehouse_address',
            )
            ->get();
        $headings =
            [
                'Mã',
                'Tên',
                'Địa chỉ',
            ];
        return Excel::download(new GenericExport($warehouse, $headings), 'warehouse.xlsx');
    }

    public function exportContent(Request $request)
    {
        $content = ContentGroups::leftJoin('contenttype', 'contenttype.id', 'contentgroups.contenttype_id')
            ->where('contentgroups.workspace_id', Auth::user()->current_workspace)
            ->select('contentgroups.name as ten', 'contenttype.name as loai')
            ->get();
        $headings =
            [
                'Tên nội dung',
                'Loại nội dung',
            ];
        return Excel::download(new GenericExport($content, $headings), 'content.xlsx');
    }
    // Xuất excel Công nợ khách hàng
    public function exportDebtGuests(Request $request)
    {
        // Lấy dữ liệu khách hàng nợ và nhóm khách hàng
        $debtGuests = (new \App\Models\Guest)->debtGuest($request->all()); // Thay thế bằng truy vấn thực tế của bạn
        // dd($request->all());
        $groups = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();

        // Tạo Collection để lưu trữ dữ liệu xuất ra Excel
        $collection = collect();

        // Không nhóm
        $collection->push([
            'Nhóm khách hàng' => 'Chưa chọn nhóm',
            'Mã khách hàng' => '',
            'Tên khách hàng' => '',
            'Nợ đầu kì' => '',
            'Bán hàng' => '',
            'Khách trả hàng' => '',
            'Thu' => '',
            'Chi' => '',
            'Nợ cuối kì' => ''
        ]);

        foreach ($debtGuests as $item) {
            if ($item->group_id == 0) {
                $collection->push([
                    'Nhóm khách hàng' => '',
                    'Mã khách hàng' => $item->maKhach,
                    'Tên khách hàng' => $item->tenKhach,
                    'Nợ đầu kì' => 'Nợ đầu kì',
                    'Bán hàng' => number_format($item->totalProductVat),
                    'Khách trả hàng' => number_format($item->totalReturn),
                    'Thu' => number_format($item->totalCashReciept),
                    'Chi' => number_format($item->chiKH),
                    'Nợ cuối kì' => number_format($item->totalProductVat - $item->totalCashReciept - ($item->totalReturn - $item->chiKH))
                ]);
            }
        }

        // Có nhóm
        foreach ($groups as $group) {
            $collection->push([
                'Nhóm khách hàng' => $group->name,
                'Mã khách hàng' => '',
                'Tên khách hàng' => '',
                'Nợ đầu kì' => '',
                'Bán hàng' => '',
                'Khách trả hàng' => '',
                'Thu' => '',
                'Chi' => '',
                'Nợ cuối kì' => ''
            ]);

            foreach ($debtGuests as $item) {
                if ($item->group_id == $group->id) {
                    $collection->push([
                        'Nhóm khách hàng' => '',
                        'Mã khách hàng' => $item->maKhach,
                        'Tên khách hàng' => $item->tenKhach,
                        'Nợ đầu kì' => 'Nợ đầu kì',
                        'Bán hàng' => number_format($item->totalProductVat),
                        'Khách trả hàng' => number_format($item->totalReturn),
                        'Thu' => number_format($item->totalCashReciept),
                        'Chi' => number_format($item->chiKH),
                        'Nợ cuối kì' => number_format($item->totalProductVat - $item->totalCashReciept - ($item->totalReturn - $item->chiKH))
                    ]);
                }
            }
        }

        // Đặt tiêu đề cho các cột
        $headings = [
            'Nhóm khách hàng',
            'Mã khách hàng',
            'Tên khách hàng',
            'Nợ đầu kì',
            'Bán hàng',
            'Khách trả hàng',
            'Thu',
            'Chi',
            'Nợ cuối kì',
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'debt_guests.xlsx');
    }
    // Xuất excel doanh số bán hàng
    public function exportSalesReport(Request $request)
    {
        $productDelivered = (new \App\Models\QuoteExport())->sumProductsQuote();
        $allDelivery = (new \App\Models\DetailExport())->getSumDetailE($request->all());
        $groupGuests = Groups::where('grouptype_id', 2)->where('workspace_id', Auth::user()->current_workspace)->get();
        $guests = Guest::where('workspace_id', Auth::user()->current_workspace)->get();

        $collection = collect();

        // Xử lý khách hàng không có nhóm
        $ungroupedGuests = $guests->where('group_id', 0);

        if ($ungroupedGuests->isNotEmpty()) {
            $collection->push([
                'Nhóm' => 'Nhóm khách hàng: Không có nhóm',
                'Tên khách hàng' => '',
                'Số chứng từ' => '',
                'CTV bán hàng' => '',
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'SL bán' => ''
            ]);

            foreach ($ungroupedGuests as $item) {
                $collection->push([
                    'Nhóm' => '',
                    'Tên khách hàng' => 'Tên khách hàng: ' . $item->guest_name_display,
                    'Số chứng từ' => '',
                    'CTV bán hàng' => '',
                    'Mã hàng' => '',
                    'Tên hàng' => '',
                    'ĐVT' => '',
                    'SL bán' => ''
                ]);

                foreach ($allDelivery as $itemDelivery) {
                    $matchedItems = $productDelivered->where('detailexport_id', $itemDelivery->id)->where('guest_id', $item->id);

                    if ($matchedItems->isNotEmpty()) {
                        foreach ($matchedItems as $matchedItem) {
                            $collection->push([
                                'Nhóm' => '',
                                'Tên khách hàng' => '',
                                'Số chứng từ' => $itemDelivery->maPhieu,
                                'CTV bán hàng' => $itemDelivery->nameUser,
                                'Mã hàng' => $matchedItem->product_code,
                                'Tên hàng' => $matchedItem->product_name,
                                'ĐVT' => $matchedItem->product_unit,
                                'SL bán' => number_format($matchedItem->product_qty),
                            ]);
                        }
                    }
                }
            }
        }

        // Xử lý khách hàng có nhóm
        foreach ($groupGuests as $group) {
            $collection->push([
                'Nhóm' => 'Nhóm khách hàng: ' . $group->name,
                'Tên khách hàng' => '',
                'Số chứng từ' => '',
                'CTV bán hàng' => '',
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'SL bán' => ''
            ]);

            $groupedGuests = $guests->where('group_id', $group->id);

            foreach ($groupedGuests as $item) {
                $collection->push([
                    'Nhóm' => '',
                    'Tên khách hàng' => 'Tên khách hàng: ' . $item->guest_name_display,
                    'Số chứng từ' => '',
                    'CTV bán hàng' => '',
                    'Mã hàng' => '',
                    'Tên hàng' => '',
                    'ĐVT' => '',
                    'SL bán' => ''
                ]);

                foreach ($allDelivery as $itemDelivery) {
                    $matchedItems = $productDelivered->where('detailexport_id', $itemDelivery->id)->where('guest_id', $item->id);

                    if ($matchedItems->isNotEmpty()) {
                        foreach ($matchedItems as $matchedItem) {
                            $collection->push([
                                'Nhóm' => '',
                                'Tên khách hàng' => '',
                                'Số chứng từ' => $itemDelivery->maPhieu,
                                'CTV bán hàng' => $itemDelivery->nameUser,
                                'Mã hàng' => $matchedItem->product_code,
                                'Tên hàng' => $matchedItem->product_name,
                                'ĐVT' => $matchedItem->product_unit,
                                'SL bán' => number_format($matchedItem->product_qty),
                            ]);
                        }
                    }
                }
            }
        }

        $headings = [
            'Nhóm',
            'Tên khách hàng',
            'Số chứng từ',
            'CTV bán hàng',
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'SL bán'
        ];

        return Excel::download(new SalesReportExport($collection, $headings), 'sales_report.xlsx');
    }

    // Doanh số mua hàng
    public function exportReportBuy(Request $request)
    {
        // Lấy sản phẩm trong đơn đó
        $productsQuoteI = (new \App\Models\QuoteImport())->sumProductsQuote();
        // Get All đơn
        $allImport = DetailImport::leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('groups', 'groups.id', 'provides.group_id')
            ->leftJoin('users', 'users.id', 'detailimport.user_id')
            ->select(
                'detailimport.*',
                'users.name as nameUser',
                'detailimport.created_at as ngayTao',
                'detailimport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'provides.provide_name_display as nameProvide',
                'detailimport.total_price as totalProductVat',
            )
            ->where('detailimport.workspace_id', Auth::user()->current_workspace);
        $allImport = filterByDate($request->all(), $allImport, 'detailimport.created_at');
        $allImport = $allImport->get();
        $groupProvides = Groups::where('grouptype_id', 3)->where('workspace_id', Auth::user()->current_workspace)->get();
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();

        // Chuẩn bị dữ liệu tương tự như trong view
        $collection = collect();

        // Dữ liệu nhóm nhà cung cấp không có nhóm
        $collection->push([
            'Nhóm nhà cung cấp' => 'Chưa chọn nhóm',
            'Tên nhà cung cấp' => '',
            'Số chứng từ' => '',
            'Người đặt hàng' => '',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'SL đặt' => '',
        ]);

        foreach ($provides as $item) {
            if ($item->group_id == 0) {
                $collection->push([
                    'Nhóm nhà cung cấp' => '',
                    'Tên nhà cung cấp' => 'Nhà cung cấp: ' . $item->provide_name_display,
                    'Số chứng từ' => '',
                    'Người đặt hàng' => '',
                    'Mã hàng' => '',
                    'Tên hàng' => '',
                    'ĐVT' => '',
                    'SL đặt' => '',
                ]);

                foreach ($allImport as $itemDetail) {
                    $matchedItems = $productsQuoteI
                        ->where('detailimport_id', $itemDetail->id)
                        ->where('provide_id', $item->id);

                    if ($matchedItems->isNotEmpty()) {
                        foreach ($matchedItems as $matchedItem) {
                            $collection->push([
                                'Nhóm nhà cung cấp' => '',
                                'Tên nhà cung cấp' => '',
                                'Số chứng từ' => $itemDetail->maPhieu,
                                'Người đặt hàng' => $itemDetail->nameUser,
                                'Mã hàng' => $matchedItem->product_code,
                                'Tên hàng' => $matchedItem->product_name,
                                'ĐVT' => $matchedItem->product_unit,
                                'SL đặt' => number_format($matchedItem->product_qty),
                            ]);
                        }
                    }
                }
            }
        }

        // Dữ liệu nhóm nhà cung cấp có nhóm
        foreach ($groupProvides as $value) {
            $collection->push([
                'Nhóm nhà cung cấp' => 'Nhóm nhà cung cấp: ' . $value->name,
                'Tên nhà cung cấp' => '',
                'Số chứng từ' => '',
                'Người đặt hàng' => '',
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'SL đặt' => '',
            ]);

            foreach ($provides as $item) {
                if ($item->group_id == $value->id) {
                    $collection->push([
                        'Nhóm nhà cung cấp' => '',
                        'Tên nhà cung cấp' => 'Nhà cung cấp: ' . $item->provide_name_display,
                        'Số chứng từ' => '',
                        'Người đặt hàng' => '',
                        'Mã hàng' => '',
                        'Tên hàng' => '',
                        'ĐVT' => '',
                        'SL đặt' => '',
                    ]);

                    foreach ($allImport as $itemDetail) {
                        $matchedItems = $productsQuoteI
                            ->where('detailimport_id', $itemDetail->id)
                            ->where('provide_id', $item->id);

                        if ($matchedItems->isNotEmpty()) {
                            foreach ($matchedItems as $matchedItem) {
                                $collection->push([
                                    'Nhóm nhà cung cấp' => '',
                                    'Tên nhà cung cấp' => '',
                                    'Số chứng từ' => $itemDetail->maPhieu,
                                    'Người đặt hàng' => $itemDetail->nameUser,
                                    'Mã hàng' => $matchedItem->product_code,
                                    'Tên hàng' => $matchedItem->product_name,
                                    'ĐVT' => $matchedItem->product_unit,
                                    'SL đặt' => number_format($matchedItem->product_qty),
                                ]);
                            }
                        }
                    }
                }
            }
        }

        $headings = [
            'Nhóm nhà cung cấp',
            'Tên nhà cung cấp',
            'Số chứng từ',
            'Người đặt hàng',
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'SL đặt',
        ];

        return Excel::download(new SalesReportExport($collection, $headings), 'sumbuy.xlsx');
    }

    // Báo cáo tổng kết giao hàng
    public function exportReportDelivery(Request $request)
    {
        // Lấy sản phẩm trong đơn đó
        $sumDelivery = (new \App\Models\Delivery())->getSumDelivery($request->all());

        // Chuẩn bị dữ liệu tương tự như trong view
        $collection = collect();

        foreach ($sumDelivery as $item) {
            $collection->push([
                'Ngày' => $item->ngayTao,
                'Mã phiếu' => $item->maPhieu,
                'Tên khách hàng' => $item->nameGuest,
                'Ngày giao hàng' => $item->ngayGiao,
                'Trạng thái giao' => $item->trangThai == 1 ? 'Nháp' : 'Đã giao',
            ]);
        }

        $headings = [
            'Ngày',
            'Mã phiếu',
            'Tên khách hàng',
            'Ngày giao hàng',
            'Trạng thái giao',
        ];

        return Excel::download(new SalesReportExport($collection, $headings), 'sumdelivery.xlsx');
    }

    public function exportReportReturnE(Request $request)
    {
        // Lấy dữ liệu từ model ProductReturnExport và ReturnExport
        $sumReturnExport = (new \App\Models\ProductReturnExport())->sumReturnExport();
        $allReturn = (new \App\Models\ReturnExport())->getSumReport($request->all());

        // Chuẩn bị collection để lưu dữ liệu cho từng hàng trong bảng Excel
        $collection = collect();

        foreach ($allReturn as $itemReturn) {
            // Lấy tất cả các item liên quan đến từng phiếu trả hàng
            $matchedItems = $sumReturnExport->where('idReturn', $itemReturn->id);

            // Kiểm tra nếu có item trùng khớp
            if ($matchedItems->isNotEmpty()) {
                $isFirstRow = true; // Biến này dùng để kiểm tra nếu là dòng đầu tiên của một nhóm

                foreach ($matchedItems as $item) {
                    // Tính toán các giá trị cần thiết
                    $totalReturn = $itemReturn->total_return ?? 0; // Tổng cộng
                    $payment = $itemReturn->payment ?? 0;          // Thanh toán
                    $remaining = $totalReturn - $payment;          // Còn lại

                    // Lưu trữ dữ liệu cho từng hàng trong bảng
                    $collection->push([
                        'Ngày' => $isFirstRow ? $itemReturn->created_at : '', // Chỉ điền ở hàng đầu tiên
                        'Mã phiếu' => $isFirstRow ? $itemReturn->code_return : '',
                        'Tên khách hàng' => $isFirstRow ? $itemReturn->nameGuest : '',
                        'Tên hàng hoá' => $item->nameProduct,
                        'ĐVT' => $item->unitProduct,
                        'Số lượng' => $item->qtyReturn,
                        'Đơn giá' => number_format($item->priceProduct),
                        'Thành tiền' => number_format($item->product_total),
                        'Tổng cộng' => $isFirstRow ? number_format($totalReturn) : '', // Chỉ điền ở hàng đầu tiên
                        'Thanh toán' => $isFirstRow ? number_format($payment) : '',
                        'Còn lại' => $isFirstRow ? number_format($remaining) : '',
                        'Ghi chú' => $isFirstRow ? $itemReturn->description : '',
                        'Trạng thái giao' => $isFirstRow ? ($itemReturn->status == 1 ? 'Nháp' : 'Đã giao') : '',
                    ]);

                    // Sau dòng đầu tiên, chuyển biến $isFirstRow thành false để không điền lại các cột phiếu
                    $isFirstRow = false;
                }
            }
        }

        // Định nghĩa các cột trong Excel
        $headings = [
            'Ngày',
            'Mã phiếu',
            'Tên khách hàng',
            'Tên hàng hoá',
            'ĐVT',
            'Số lượng',
            'Đơn giá',
            'Thành tiền',
            'Tổng cộng',
            'Thanh toán',
            'Còn lại',
            'Ghi chú',
            'Trạng thái giao',
        ];

        // Xuất dữ liệu ra file Excel
        return Excel::download(new SalesReportExport($collection, $headings), 'returnE.xlsx');
    }

    // Xuất excel lợi nhuận bán hàng product
    public function exportSellProfit(Request $request)
    {
        // Get all sales data
        $allDeliveries = (new \App\Models\DetailExport())->allProductsSell($request->all());

        // Get product groups by type
        $groups = Groups::where('grouptype_id', 4)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();

        // Initialize data collection
        $collection = collect();

        // Initialize totals for ungrouped items
        $totalUngrouped = [
            'totalSlXuat' => 0,
            'totalImport' => 0,
            'totalPriceImport' => 0,
            'totalPriceExport' => 0,
            'totalProductTotalVat' => 0,
            'totalProfit' => 0,
        ];
        $grandTotal = [
            'totalSlXuat' => 0,
            'totalImport' => 0,
            'totalPriceImport' => 0,
            'totalPriceExport' => 0,
            'totalProductTotalVat' => 0,
            'totalProfit' => 0,
        ];

        // Add header for ungrouped items
        $collection->push([
            'Số chứng từ' => 'Nhóm hàng hoá: Chưa chọn nhóm',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'Số lượng bán' => '',
            'Đơn giá vốn' => '',
            'Giá trị vốn' => '',
            'Giá xuất' => '',
            'Doanh số' => '',
            'Chênh lệch' => '',
        ]);

        foreach ($allDeliveries as $item) {
            if ($item->group_id == 0) {
                $giaNhap = $item->giaNhap;
                $slxuat = $item->slxuat;
                $priceExport = $item->price_export;
                $productTotalVat = $item->product_total_vat;

                $collection->push([
                    'Số chứng từ' => $item->maPhieu,
                    'Mã hàng' => $item->product_code,
                    'Tên hàng' => $item->product_name,
                    'ĐVT' => $item->product_unit,
                    'Số lượng bán' => number_format($slxuat),
                    'Đơn giá vốn' => number_format($giaNhap),
                    'Giá trị vốn' => number_format($slxuat * $giaNhap),
                    'Giá xuất' => number_format($priceExport),
                    'Doanh số' => number_format($productTotalVat),
                    'Chênh lệch' => number_format($productTotalVat - ($slxuat * $giaNhap)),
                ]);

                // Accumulate ungrouped totals
                $totalUngrouped['totalSlXuat'] += $slxuat;
                $totalUngrouped['totalImport'] += $giaNhap;
                $totalUngrouped['totalPriceImport'] += $slxuat * $giaNhap;
                $totalUngrouped['totalPriceExport'] += $priceExport;
                $totalUngrouped['totalProductTotalVat'] += $productTotalVat;
                $totalUngrouped['totalProfit'] += $productTotalVat - ($slxuat * $giaNhap);
            }
        }

        // Add totals for ungrouped items
        $collection->push([
            'Số chứng từ' => 'Tổng cộng:',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'Số lượng bán' => number_format($totalUngrouped['totalSlXuat']),
            'Đơn giá vốn' => number_format($totalUngrouped['totalImport']),
            'Giá trị vốn' => number_format($totalUngrouped['totalPriceImport']),
            'Giá xuất' => number_format($totalUngrouped['totalPriceExport']),
            'Doanh số' => number_format($totalUngrouped['totalProductTotalVat']),
            'Chênh lệch' => number_format($totalUngrouped['totalProfit']),
        ]);
        // Accumulate ungrouped totals into grand total
        foreach ($totalUngrouped as $key => $value) {
            $grandTotal[$key] += $value;
        }

        // Process grouped items
        foreach ($groups as $group) {
            $collection->push([
                'Số chứng từ' => 'Nhóm hàng hoá: ' . $group->name,
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'Số lượng bán' => '',
                'Đơn giá vốn' => '',
                'Giá trị vốn' => '',
                'Giá xuất' => '',
                'Doanh số' => '',
                'Chênh lệch' => '',
            ]);

            $totalGrouped = [
                'totalSlXuat' => 0,
                'totalImport' => 0,
                'totalPriceImport' => 0,
                'totalPriceExport' => 0,
                'totalProductTotalVat' => 0,
                'totalProfit' => 0,
            ];

            foreach ($allDeliveries as $item) {
                if ($item->group_id == $group->id) {
                    $giaNhap = $item->giaNhap;
                    $slxuat = $item->slxuat;
                    $priceExport = $item->price_export;
                    $productTotalVat = $item->product_total_vat;

                    $collection->push([
                        'Số chứng từ' => $item->maPhieu,
                        'Mã hàng' => $item->product_code,
                        'Tên hàng' => $item->product_name,
                        'ĐVT' => $item->product_unit,
                        'Số lượng bán' => number_format($slxuat),
                        'Đơn giá vốn' => number_format($giaNhap),
                        'Giá trị vốn' => number_format($slxuat * $giaNhap),
                        'Giá xuất' => number_format($priceExport),
                        'Doanh số' => number_format($productTotalVat),
                        'Chênh lệch' => number_format($productTotalVat - ($slxuat * $giaNhap)),
                    ]);

                    // Accumulate group totals
                    $totalGrouped['totalSlXuat'] += $slxuat;
                    $totalGrouped['totalImport'] += $giaNhap;
                    $totalGrouped['totalPriceImport'] += $slxuat * $giaNhap;
                    $totalGrouped['totalPriceExport'] += $priceExport;
                    $totalGrouped['totalProductTotalVat'] += $productTotalVat;
                    $totalGrouped['totalProfit'] += $productTotalVat - ($slxuat * $giaNhap);
                }
            }

            // Add totals for the current group
            $collection->push([
                'Số chứng từ' => 'Tổng cộng:',
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'Số lượng bán' => number_format($totalGrouped['totalSlXuat']),
                'Đơn giá vốn' => number_format($totalGrouped['totalImport']), // Average unit cost
                'Giá trị vốn' => number_format($totalGrouped['totalPriceImport']),
                'Giá xuất' => number_format($totalGrouped['totalPriceExport']),
                'Doanh số' => number_format($totalGrouped['totalProductTotalVat']),
                'Chênh lệch' => number_format($totalGrouped['totalProfit']),
            ]);
        }
        foreach ($totalGrouped as $key => $value) {
            $grandTotal[$key] += $value;
        }

        // Add grand totals
        $collection->push([
            'Số chứng từ' => 'Tổng cộng tất cả:',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'Số lượng bán' => number_format($grandTotal['totalSlXuat']),
            'Đơn giá vốn' => number_format($grandTotal['totalImport']), // Average unit cost
            'Giá trị vốn' => number_format($grandTotal['totalPriceImport']),
            'Giá xuất' => number_format($grandTotal['totalPriceExport']),
            'Doanh số' => number_format($grandTotal['totalProductTotalVat']),
            'Chênh lệch' => number_format($grandTotal['totalProfit']),
        ]);

        $headings = [
            'Số chứng từ',
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'Số lượng bán',
            'Đơn giá vốn',
            'Giá trị vốn',
            'Giá xuất',
            'Doanh số',
            'Chênh lệch'
        ];

        return Excel::download(new SalesReportExport($collection, $headings), 'sales_report.xlsx');
    }

    // Xuất excel lợi nhuận bán hàng khách hàng
    public function exportSellProfitGuest(Request $request)
    {
        // Get all sales data
        $allDeliveries = (new \App\Models\DetailExport())->allProductsSell($request->all());

        // Get customer groups
        $groupGuests = Groups::where('grouptype_id', 2)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();

        // Initialize data collection
        $collection = collect();

        // Initialize totals for ungrouped items
        $totalUngrouped = [
            'totalSlXuat' => 0,
            'totalPriceImport' => 0,
            'totalPriceExport' => 0,
            'totalProductTotalVat' => 0,
            'totalProfit' => 0,
            'totalGiaNhap' => 0,
        ];

        // Initialize grand total
        $grandTotal = [
            'totalSlXuat' => 0,
            'totalPriceImport' => 0,
            'totalPriceExport' => 0,
            'totalProductTotalVat' => 0,
            'totalProfit' => 0,
            'totalGiaNhap' => 0,
        ];

        // Add header for ungrouped items
        $collection->push([
            'Số chứng từ' => 'Nhóm khách hàng: Chưa chọn nhóm',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'Số lượng bán' => '',
            'Đơn giá vốn' => '',
            'Giá trị vốn' => '',
            'Giá xuất' => '',
            'Doanh số' => '',
            'Chênh lệch' => '',
        ]);

        foreach ($allDeliveries as $item) {
            if ($item->group_idGuest == 0) {
                $giaNhap = $item->giaNhap;
                $slxuat = $item->slxuat;
                $priceExport = $item->price_export;
                $productTotalVat = $item->product_total_vat;

                $collection->push([
                    'Số chứng từ' => $item->maPhieu,
                    'Mã hàng' => $item->product_code,
                    'Tên hàng' => $item->product_name,
                    'ĐVT' => $item->product_unit,
                    'Số lượng bán' => number_format($slxuat),
                    'Đơn giá vốn' => number_format($giaNhap),
                    'Giá trị vốn' => number_format($slxuat * $giaNhap),
                    'Giá xuất' => number_format($priceExport),
                    'Doanh số' => number_format($productTotalVat),
                    'Chênh lệch' => number_format($productTotalVat - ($slxuat * $giaNhap)),
                ]);

                // Accumulate ungrouped totals
                $totalUngrouped['totalSlXuat'] += $slxuat;
                $totalUngrouped['totalPriceImport'] += $slxuat * $giaNhap;
                $totalUngrouped['totalPriceExport'] += $priceExport;
                $totalUngrouped['totalProductTotalVat'] += $productTotalVat;
                $totalUngrouped['totalProfit'] += $productTotalVat - ($slxuat * $giaNhap);
                $totalUngrouped['totalGiaNhap'] += ($giaNhap);

                // Accumulate grand totals
                $grandTotal['totalSlXuat'] += $slxuat;
                $grandTotal['totalPriceImport'] += $slxuat * $giaNhap;
                $grandTotal['totalPriceExport'] += $priceExport;
                $grandTotal['totalProductTotalVat'] += $productTotalVat;
                $grandTotal['totalProfit'] += $productTotalVat - ($slxuat * $giaNhap);
                $grandTotal['totalGiaNhap'] += ($giaNhap);
            }
        }

        // Add totals for ungrouped items
        $collection->push([
            'Số chứng từ' => 'Tổng cộng:',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'Số lượng bán' => number_format($totalUngrouped['totalSlXuat']),
            'Đơn giá vốn' => number_format($totalUngrouped['totalGiaNhap']),
            'Giá trị vốn' => number_format($totalUngrouped['totalPriceImport']),
            'Giá xuất' => number_format($totalUngrouped['totalPriceExport']),
            'Doanh số' => number_format($totalUngrouped['totalProductTotalVat']),
            'Chênh lệch' => number_format($totalUngrouped['totalProfit']),
        ]);

        // Process grouped items
        foreach ($groupGuests as $group) {
            $collection->push([
                'Số chứng từ' => 'Nhóm khách hàng: ' . $group->name,
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'Số lượng bán' => '',
                'Đơn giá vốn' => '',
                'Giá trị vốn' => '',
                'Giá xuất' => '',
                'Doanh số' => '',
                'Chênh lệch' => '',
            ]);

            $totalGrouped = [
                'totalSlXuat' => 0,
                'totalPriceImport' => 0,
                'totalPriceExport' => 0,
                'totalProductTotalVat' => 0,
                'totalProfit' => 0,
                'totalGiaNhap' => 0,
            ];

            foreach ($allDeliveries as $item) {
                if ($item->group_idGuest == $group->id) {
                    $giaNhap = $item->giaNhap;
                    $slxuat = $item->slxuat;
                    $priceExport = $item->price_export;
                    $productTotalVat = $item->product_total_vat;

                    $collection->push([
                        'Số chứng từ' => $item->maPhieu,
                        'Mã hàng' => $item->product_code,
                        'Tên hàng' => $item->product_name,
                        'ĐVT' => $item->product_unit,
                        'Số lượng bán' => number_format($slxuat),
                        'Đơn giá vốn' => number_format($giaNhap),
                        'Giá trị vốn' => number_format($slxuat * $giaNhap),
                        'Giá xuất' => number_format($priceExport),
                        'Doanh số' => number_format($productTotalVat),
                        'Chênh lệch' => number_format($productTotalVat - ($slxuat * $giaNhap)),
                    ]);

                    // Accumulate group totals
                    $totalGrouped['totalSlXuat'] += $slxuat;
                    $totalGrouped['totalPriceImport'] += $slxuat * $giaNhap;
                    $totalGrouped['totalPriceExport'] += $priceExport;
                    $totalGrouped['totalProductTotalVat'] += $productTotalVat;
                    $totalGrouped['totalProfit'] += $productTotalVat - ($slxuat * $giaNhap);
                    $totalGrouped['totalGiaNhap'] += ($giaNhap);

                    // Accumulate grand totals
                    $grandTotal['totalSlXuat'] += $slxuat;
                    $grandTotal['totalPriceImport'] += $slxuat * $giaNhap;
                    $grandTotal['totalPriceExport'] += $priceExport;
                    $grandTotal['totalProductTotalVat'] += $productTotalVat;
                    $grandTotal['totalProfit'] += $productTotalVat - ($slxuat * $giaNhap);
                    $grandTotal['totalGiaNhap'] += ($giaNhap);
                }
            }

            // Add totals for the current group
            $collection->push([
                'Số chứng từ' => 'Tổng cộng:',
                'Mã hàng' => '',
                'Tên hàng' => '',
                'ĐVT' => '',
                'Số lượng bán' => number_format($totalGrouped['totalSlXuat']),
                'Đơn giá vốn' => number_format($totalGrouped['totalGiaNhap']),
                'Giá trị vốn' => number_format($totalGrouped['totalPriceImport']),
                'Giá xuất' => number_format($totalGrouped['totalPriceExport']),
                'Doanh số' => number_format($totalGrouped['totalProductTotalVat']),
                'Chênh lệch' => number_format($totalGrouped['totalProfit']),
            ]);
        }

        // Add grand totals
        $collection->push([
            'Số chứng từ' => 'Tổng cộng tất cả:',
            'Mã hàng' => '',
            'Tên hàng' => '',
            'ĐVT' => '',
            'Số lượng bán' => number_format($grandTotal['totalSlXuat']),
            'Đơn giá vốn' => number_format($grandTotal['totalGiaNhap']),
            'Giá trị vốn' => number_format($grandTotal['totalPriceImport']),
            'Giá xuất' => number_format($grandTotal['totalPriceExport']),
            'Doanh số' => number_format($grandTotal['totalProductTotalVat']),
            'Chênh lệch' => number_format($grandTotal['totalProfit']),
        ]);
        $headings = [
            'Số chứng từ',
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'Số lượng bán',
            'Đơn giá vốn',
            'Giá trị vốn',
            'Giá xuất',
            'Doanh số',
            'Chênh lệch'
        ];

        return Excel::download(new SalesReportExport($collection, $headings), 'sell_profit_guest.xlsx');
    }

    // Xuất excel Công nợ nhà cung cấp
    public function exportDebtProvides(Request $request)
    {
        $provide = Provides::with(['getAllDetailByID.getAllReceiveBill.getReturnImport.getAllCashReciept', 'getAllDetailByID.getPayOrders']);
        // $provide = filterByDate($request->all(), $provide, 'detailexport.created_at');
        $provide = $provide->get();

        $collection = collect();
        foreach ($provide as $item) {
            $total = $item->getAllDetailByID->whereIn('status', [2, 0, 1])->sum('total_tax');
            $totalReturn = 0;
            $totalCashReciept = 0;
            $totalPay = 0;

            foreach ($item->getAllDetailByID as $value) {
                foreach ($value->getAllReceiveBill as $value1) {
                    foreach ($value1->getReturnImport as $value2) {
                        $totalReturn += $value2->total;
                        foreach ($value2->getAllCashReciept as $value3) {
                            $totalCashReciept += $value3->amount;
                        }
                    }
                }
                foreach ($value->getPayOrders as $value1) {
                    $totalPay += $value1->total;
                }
            }

            $totalEnd = $total - $totalReturn + $totalCashReciept - $totalPay;

            $collection->push([
                'Mã nhà cung cấp' => $item->provide_code,
                'Tên nhà cung cấp' => $item->provide_name_display,
                'Đầu kì' => number_format($total),
                'Mua hàng' => number_format($total),
                'Trả hàng NCC' => number_format($totalReturn),
                'Thu' => number_format($totalCashReciept),
                'Chi' => number_format($totalPay),
                'Cuối kỳ' => number_format($totalEnd),
            ]);
        }

        $headings = [
            'Mã nhà cung cấp',
            'Tên nhà cung cấp',
            'Đầu kì',
            'Mua hàng',
            'Trả hàng NCC',
            'Thu',
            'Chi',
            'Cuối kỳ'
        ];

        return Excel::download(new DebtGuestsExport($collection, $headings), 'debt_provides.xlsx');
    }

    // Trả hàng NCC
    public function exportReportReturnI(Request $request)
    {
        // Lấy dữ liệu từ model ReturnProduct và ReturnImport
        $sumReturnImport = (new \App\Models\ReturnProduct())->sumReturnImport();
        $allReturn = (new \App\Models\ReturnImport())->getSumReport($request->all());

        // Khởi tạo collection để lưu dữ liệu xuất Excel
        $collection = collect();

        foreach ($allReturn as $itemReturn) {
            // Lấy các sản phẩm liên quan đến từng phiếu nhập
            $matchedItems = $sumReturnImport->where('idReturn', $itemReturn->id);

            // Kiểm tra số lượng mặt hàng
            if ($matchedItems->isNotEmpty()) {
                $isFirstRow = true; // Cờ để đảm bảo chỉ điền thông tin phiếu một lần

                foreach ($matchedItems as $item) {
                    $collection->push([
                        'Ngày' => $isFirstRow ? $itemReturn->created_at : '', // Chỉ điền ở dòng đầu tiên
                        'Số phiếu' => $isFirstRow ? $itemReturn->return_code : '',
                        'Tên nhà cung cấp' => $isFirstRow ? $itemReturn->nameProvide : '',
                        'Tên hàng hóa' => $item->nameProduct,
                        'ĐVT' => $item->unitProduct,
                        'Số lượng' => number_format($item->qtyReturn),
                        'Đơn giá' => number_format($item->priceProduct),
                        'Thành tiền' => number_format($item->qtyReturn * $item->priceProduct),
                        'Tổng cộng' => $isFirstRow ? number_format($itemReturn->total) : '', // Chỉ điền ở dòng đầu tiên
                        'Thanh toán' => $isFirstRow ? number_format($itemReturn->payment) : '',
                        'Còn lại' => $isFirstRow ? number_format($itemReturn->total - $itemReturn->payment) : '',
                        'Ghi chú' => $isFirstRow ? $itemReturn->description : '',
                        'Trạng thái' => $isFirstRow ? ($itemReturn->status == 1 ? 'Nháp' : 'Đã giao') : '',
                    ]);

                    // Sau dòng đầu tiên, tắt cờ $isFirstRow để không điền lại thông tin phiếu
                    $isFirstRow = false;
                }
            }
        }

        // Định nghĩa tiêu đề các cột trong Excel
        $headings = [
            'Ngày',
            'Số phiếu',
            'Tên nhà cung cấp',
            'Tên hàng hóa',
            'ĐVT',
            'Số lượng',
            'Đơn giá',
            'Thành tiền',
            'Tổng cộng',
            'Thanh toán',
            'Còn lại',
            'Ghi chú',
            'Trạng thái'
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'return_import.xlsx');
    }

    // Tổng hợp nội dung thu chi THU
    public function exportReportIE(Request $request)
    {
        $contetnType1 = ContentGroups::where('contenttype_id', 1)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        $listIDContent1 = [];
        foreach ($contetnType1 as $va) {
            array_push($listIDContent1, $va->id);
        }
        // Thu thập dữ liệu cho xuất khẩu
        $contentExport = CashReceipt::whereIn('content_id', $listIDContent1)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->select('id', 'receipt_code', 'workspace_id', 'amount', 'date_created', 'content_id', 'guest_id', 'fund_id', 'note')
            ->orderBy('content_id', 'asc');
        $contentExport = filterByDate($request->all(), $contentExport, 'cash_receipts.date_created');
        $contentExport = $contentExport->get();

        // Khởi tạo tập hợp dữ liệu cho xuất khẩu
        $collection = collect();
        $previousContentPay = null;
        $totalThu = 0;

        foreach ($contentExport as $item) {
            if ($previousContentPay !== $item->content_id) {
                $collection->push([
                    'Ngày' => $item->getContentPay ? $item->getContentPay->name : '',
                    'Chứng từ' => '',
                    'Tên' => '',
                    'Nội dung thu chi' =>  '',
                    'Số tiền' => '',
                    'Quỹ' => '',
                    'Ghi chú' => '',
                ]);
            }

            $collection->push([
                'Ngày' => date_format(new DateTime($item->date_created), 'd-m-Y'),
                'Chứng từ' => $item->receipt_code,
                'Tên' => $item->getGuest ? $item->getGuest->guest_name_display : '',
                'Nội dung thu chi' => '',
                'Số tiền' => number_format($item->amount),
                'Quỹ' => $item->getFund ? $item->getFund->name : '',
                'Ghi chú' => $item->note,
            ]);

            $previousContentPay = $item->content_id;
            $totalThu += $item->amount;
        }

        // Thêm dòng tổng cộng
        $collection->push([
            'Ngày' => '',
            'Chứng từ' => '',
            'Tên' => '',
            'Nội dung thu chi' => '',
            'Số tiền' => number_format($totalThu),
            'Quỹ' => '',
            'Ghi chú' => '',
        ]);

        // Định nghĩa tiêu đề
        $headings = [
            'Ngày',
            'Chứng từ',
            'Tên',
            'Nội dung thu chi',
            'Số tiền',
            'Quỹ',
            'Ghi chú',
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'baocao_thu.xlsx');
    }

    // Tổng hợp nội dung thu chi CHI
    public function exportReportIEChi(Request $request)
    {
        // Lấy dữ liệu từ bảng ContentGroups và PayOder
        $contentGroups = ContentGroups::where('contenttype_id', 2)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();

        $listIDContent = $contentGroups->pluck('id')->toArray();

        $contentImport = PayOder::whereIn('content_pay', $listIDContent)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->select('id', 'payment_code', 'workspace_id', 'total', 'payment_date', 'content_pay', 'guest_id', 'fund_id', 'note')
            ->orderBy('content_pay', 'asc');
        $contentImport = filterByDate($request->all(), $contentImport, 'pay_order.payment_date');
        $contentImport = $contentImport->get();

        // Khởi tạo tập hợp dữ liệu cho xuất khẩu
        $collection = collect();
        $previousContentPay = null;
        $totalChi = 0;

        foreach ($contentImport as $item) {
            if ($previousContentPay !== $item->content_pay) {
                $collection->push([
                    'Ngày' => $item->getContentPay ? $item->getContentPay->name : '',
                    'Chứng từ' => '',
                    'Tên' => '',
                    'Nội dung thu chi' => '',
                    'Số tiền' => '',
                    'Quỹ' => '',
                    'Ghi chú' => '',
                ]);
            }

            $collection->push([
                'Ngày' => date_format(new DateTime($item->payment_date), 'd-m-Y'),
                'Chứng từ' => $item->payment_code,
                'Tên' => $item->getGuest ? $item->getGuest->guest_name_display : '',
                'Nội dung thu chi' => '',
                'Số tiền' => number_format($item->total),
                'Quỹ' => $item->getFund ? $item->getFund->name : '',
                'Ghi chú' => $item->note,
            ]);

            $previousContentPay = $item->content_pay;
            $totalChi += $item->total;
        }

        // Thêm dòng tổng cộng
        $collection->push([
            'Ngày' => '',
            'Chứng từ' => '',
            'Tên' => '',
            'Nội dung thu chi' => '',
            'Số tiền' => number_format($totalChi),
            'Quỹ' => '',
            'Ghi chú' => '',
        ]);

        // Định nghĩa tiêu đề
        $headings = [
            'Ngày',
            'Chứng từ',
            'Tên',
            'Nội dung thu chi',
            'Số tiền',
            'Quỹ',
            'Ghi chú',
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'baocao_chi.xlsx');
    }
    // Chuyển tiền nội bộ
    public function exportReportChangeFunds(Request $request)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $content = ContentImportExport::with(['getFromFund', 'getToFund', 'getUser']) // Bao gồm các quan hệ cần thiết
            ->where('workspace_id', Auth::user()->current_workspace);
        $content = filterByDate($request->all(), $content, 'content-import-export.payment_day');
        $content = $content->get();

        // Khởi tạo tập hợp dữ liệu cho xuất khẩu
        $collection = collect();
        $totalAmount = 0;

        foreach ($content as $item) {
            $collection->push([
                'Ngày lập' => date_format(new DateTime($item->payment_day), 'd/m/Y'),
                'Mã phiếu' => $item->form_code,
                'Người lập' => $item->getUser ? $item->getUser->name : '', // Lấy tên người lập
                'Số tiền' => number_format($item->qty_money),
                'Từ quỹ' => $item->getFromFund ? $item->getFromFund->name : '', // Lấy tên quỹ 'Từ quỹ'
                'Đến quỹ' => $item->getToFund ? $item->getToFund->name : '', // Lấy tên quỹ 'Đến quỹ'
                'Ghi chú' => $item->notes,
            ]);

            // Tính tổng số tiền
            $totalAmount += $item->qty_money;
        }

        // Thêm dòng tổng cộng
        $collection->push([
            'Ngày lập' => '',
            'Mã phiếu' => '',
            'Người lập' => '',
            'Số tiền' => number_format($totalAmount),
            'Từ quỹ' => '',
            'Đến quỹ' => '',
            'Ghi chú' => '',
        ]);

        // Định nghĩa tiêu đề
        $headings = [
            'Ngày lập',
            'Mã phiếu',
            'Người lập',
            'Số tiền',
            'Từ quỹ',
            'Đến quỹ',
            'Ghi chú',
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'change_funds_report.xlsx');
    }

    // Thống kê thu chi tồn quỹ
    public function exportReportIEFund(Request $request)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $inventoryDebt = Fund::where('workspace_id', Auth::user()->current_workspace)->get();

        // Khởi tạo tập hợp dữ liệu cho xuất khẩu
        $collection = collect();

        // Khởi tạo các biến tổng cộng
        $grandTotalImport = 0;
        $grandTotalExport = 0;
        $grandTotal = 0;

        // Duyệt qua từng quỹ để lấy dữ liệu
        foreach ($inventoryDebt as $va) {
            // Thêm tên quỹ vào tập hợp dữ liệu
            $collection->push([
                'Ngày' => '',
                'Chứng từ' => '',
                'Tên' => $va->name,
                'Nội dung thu chi' => '',
                'Thu' => '',
                'Chi' => '',
                'Cuối kỳ' => '',
            ]);

            $totalImport = 0;
            $totalExport = 0;
            $total = 0;

            // Duyệt qua các giao dịch chi (PayOrder)
            if ($va->getPayOrder()->exists()) {
                // Áp dụng bộ lọc ngày lên mối quan hệ getPayOrder
                $filteredPayOrders = filterByDate($request->all(), $va->getPayOrder(), 'pay_order.payment_date')->get();

                foreach ($filteredPayOrders as $item) {
                    $collection->push([
                        'Ngày' => date_format(new DateTime($item->payment_date), 'd/m/Y'),
                        'Chứng từ' => $item->payment_code,
                        'Tên' => $item->getGuest ? $item->getGuest->guest_name_display : '',
                        'Nội dung thu chi' => $item->getContentPay ? $item->getContentPay->name : '',
                        'Thu' => 0,
                        'Chi' => number_format($item->total),
                        'Cuối kỳ' => '',
                    ]);

                    $total -= $item->total;
                    $totalExport += $item->total;
                }
            }

            // Duyệt qua các giao dịch thu (PayExport)
            if ($va->getPayExport()->exists()) {
                // Áp dụng bộ lọc ngày lên mối quan hệ getPayExport
                $filteredPayExports = filterByDate($request->all(), $va->getPayExport(), 'pay_export.date_created')->get();

                foreach ($filteredPayExports as $item) {
                    $collection->push([
                        'Ngày' => date_format(new DateTime($item->date_created), 'd/m/Y'),
                        'Chứng từ' => $item->receipt_code,
                        'Tên' => $item->getGuest ? $item->getGuest->guest_name_display : '',
                        'Nội dung thu chi' => $item->getContentPay ? $item->getContentPay->name : '',
                        'Thu' => number_format($item->amount),
                        'Chi' => 0,
                        'Cuối kỳ' => '',
                    ]);

                    $total += $item->amount;
                    $totalImport += $item->amount;
                }
            }

            // Thêm dòng tổng cộng cho từng quỹ
            $collection->push([
                'Ngày' => '',
                'Chứng từ' => '',
                'Tên' => 'Tổng cộng',
                'Nội dung thu chi' => '',
                'Thu' => number_format($totalImport),
                'Chi' => number_format($totalExport),
                'Cuối kỳ' => number_format($total),
            ]);

            // Cập nhật tổng cộng cuối kỳ cho toàn bộ quỹ
            $grandTotalImport += $totalImport;
            $grandTotalExport += $totalExport;
            $grandTotal += $total;
        }

        // Thêm dòng tổng cộng tất cả các quỹ
        $collection->push([
            'Ngày' => '',
            'Chứng từ' => '',
            'Tên' => 'Tổng cộng tất cả',
            'Nội dung thu chi' => '',
            'Thu' => number_format($grandTotalImport),
            'Chi' => number_format($grandTotalExport),
            'Cuối kỳ' => number_format($grandTotal),
        ]);

        // Định nghĩa tiêu đề
        $headings = [
            'Ngày',
            'Chứng từ',
            'Tên',
            'Nội dung thu chi',
            'Thu',
            'Chi',
            'Cuối kỳ',
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'funds_report.xlsx');
    }


    // Xuất nhập tồn kho
    public function exportReportEnventory(Request $request)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $delivery = Delivered::leftJoin('products', 'products.id', '=', 'delivered.product_id')
            ->select(DB::raw('SUM(delivered.deliver_qty) as totalExportQty'), 'products.id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->groupBy('delivered.product_id', 'products.id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();

        $receive = ProductImport::leftJoin('products', 'products.id', '=', 'products_import.product_id')
            ->select(DB::raw('SUM(products_import.product_qty) as totalImportQty'), 'products.id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->groupBy('products_import.product_id', 'products.id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();

        // Khởi tạo biến để lưu tổng cộng
        $totalSlNhap = 0;
        $totalSlXuat = 0;
        $totalFinalQty = 0;

        // Kết hợp dữ liệu từ bảng nhận và bảng giao
        $products = $receive->map(function ($item) use ($delivery, &$totalSlNhap, &$totalSlXuat, &$totalFinalQty) {
            $product = $delivery->firstWhere('id', $item->id);
            $totalImportQty = $item->totalImportQty;
            $totalExportQty = $product ? $product->totalExportQty : 0;
            $finalQty = $totalImportQty - $totalExportQty;

            // Tính tổng cộng cho các cột
            $totalSlNhap += $totalImportQty;
            $totalSlXuat += $totalExportQty;
            $totalFinalQty += $finalQty;

            return [
                'product_code' => $item->product_code,
                'product_name' => $item->product_name,
                'product_unit' => $item->product_unit,
                'totalImportQty' => $totalImportQty,
                'totalExportQty' => $totalExportQty,
                'finalQty' => $finalQty,
            ];
        });

        // Thêm các sản phẩm còn lại từ danh sách giao không có trong danh sách nhập
        $delivery->each(function ($item) use (&$products, &$totalSlNhap, &$totalSlXuat, &$totalFinalQty) {
            if (!$products->firstWhere('product_code', $item->product_code)) {
                $totalImportQty = 0;
                $totalExportQty = $item->totalExportQty;
                $finalQty = -$totalExportQty;

                // Cập nhật tổng cộng
                $totalSlNhap += $totalImportQty;
                $totalSlXuat += $totalExportQty;
                $totalFinalQty += $finalQty;

                $products->push([
                    'product_code' => $item->product_code,
                    'product_name' => $item->product_name,
                    'product_unit' => $item->product_unit,
                    'totalImportQty' => $totalImportQty,
                    'totalExportQty' => $totalExportQty,
                    'finalQty' => $finalQty,
                ]);
            }
        });

        // Thêm hàng tổng cộng vào cuối
        $products->push([
            'product_code' => 'Tổng cộng',
            'product_name' => '',
            'product_unit' => '',
            'totalImportQty' => $totalSlNhap,
            'totalExportQty' => $totalSlXuat,
            'finalQty' => $totalFinalQty,
        ]);

        // Khởi tạo tập hợp dữ liệu cho xuất khẩu
        $collection = collect();

        // Duyệt qua các sản phẩm và thêm vào tập hợp dữ liệu
        foreach ($products as $product) {
            $collection->push([
                'Mã hàng' => $product['product_code'],
                'Tên hàng' => $product['product_name'],
                'ĐVT' => $product['product_unit'],
                'Nhập' => number_format($product['totalImportQty']),
                'Xuất' => number_format($product['totalExportQty']),
                'Tồn cuối' => number_format($product['finalQty']),
            ]);
        }

        // Định nghĩa tiêu đề
        $headings = [
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'Nhập',
            'Xuất',
            'Tồn cuối',
        ];

        // Xuất file Excel
        return Excel::download(new DebtGuestsExport($collection, $headings), 'enventory_report.xlsx');
    }

    // Tổng hợp kết quả kinh doanh
    public function exportReportBusiness(Request $request)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu

        // Trả hàng khách hàng
        $trahangkh = (new \App\Models\ReturnExport())->getSumReport()->sum('total_return');

        // Doanh số bán hàng
        $doanhsobanhang = (new \App\Models\DetailExport())->allProductsSell()->sum('product_total_vat');

        // Tổng giá vốn bán hàng
        $giavon = (new \App\Models\DetailExport())->allProductsSell()->sum(function ($product) {
            return $product->slxuat * $product->giaNhap;
        });

        // Tổng lợi nhuận bán hàng
        $loinhuan = $doanhsobanhang - $trahangkh - $giavon;

        // Tỷ suất lợi nhuận bán hàng
        $tysuatloinhuan = $doanhsobanhang != 0 ? (($loinhuan / $doanhsobanhang) * 100) : 0;

        // Tổng nợ khách hàng
        $totalDebt = (new \App\Models\Guest())->debtGuest()->sum(function ($item) {
            return $item->totalProductVat - $item->totalCashReciept - ($item->totalReturn - $item->chiKH);
        });

        // Tổng tiền nhập hàng nhà cung cấp
        $tongnhap = (new \App\Models\DetailImport())->reportAll()->sum('total_tax');

        // Tổng nợ nhà cung cấp
        $provides = Provides::where('workspace_id', Auth::user()->current_workspace)->get();
        $totalProvideDebt = $provides->sum(function ($item) {
            return $item->calculateProvideDebt();
        });

        // Hoa hồng sale
        $hoahongSale = Commission::get()->sum('total_amount');

        // Lấy thông tin quỹ
        $funds = Fund::where('workspace_id', Auth::user()->current_workspace)
            ->orderby('id', 'desc')
            ->get();

        // Gán giá trị vào mảng
        $arrData = [
            'trahangkh' => $trahangkh,
            'allDeliveries' => $doanhsobanhang,
            'giavon' => $giavon,
            'loinhuan' => $loinhuan,
            'tysuatloinhuan' => $tysuatloinhuan,
            'totalDebt' => $totalDebt,
            'tongnhap' => $tongnhap,
            'totalProvideDebt' => $totalProvideDebt,
            'hoahongSale' => $hoahongSale,
        ];

        // Khởi tạo dữ liệu cho xuất khẩu
        $data = [
            ['STT', 'Nội dung', 'Số tiền', 'Đơn vị'],
            // Doanh thu và Lợi nhuận
            [1, 'Doanh số bán hàng', number_format($arrData['allDeliveries']), 'Đồng'],
            [2, 'Doanh số khách trả lại', number_format($arrData['trahangkh']), 'Đồng'],
            [3, 'Doanh số bán hàng còn lại (1-2)', number_format($arrData['allDeliveries'] - $arrData['trahangkh']), 'Đồng'],
            [4, 'Tổng giá vốn bán hàng', number_format($arrData['giavon']), 'Đồng'],
            [5, 'Tổng lợi nhuận bán hàng (3-4)', number_format($arrData['loinhuan']), 'Đồng'],
            [6, 'Tỷ suất lợi nhuận bán hàng (5*100/1)', number_format($arrData['tysuatloinhuan'], 2), '%'],
            [7, 'Tổng hợp lãi lỗ (5 + 11)', 0, 'Đồng'],

            // Khoản phải thu và thanh toán của khách hàng
            [8, 'Khách hàng còn nợ', number_format($arrData['totalDebt']), 'Đồng'],
            [9, 'Thực thu tiền bán hàng + khách đặt cọc*', 0, 'Đồng'],
            [10, 'Tỷ lệ thu tiền so với doanh số*', 0, 'Đồng'],
            [11, 'Trả tiền hàng khách trả lại*', 0, 'Đồng'],

            // Khoản thanh toán của nhà cung cấp
            [12, 'Tổng tiền nhập hàng nhà cung cấp', number_format($arrData['tongnhap']), 'Đồng'],
            [13, 'Trả tiền mua hàng nhà cung cấp*', 0, 'Đồng'],
            [14, 'Hàng trả lại nhà cung cấp*', 0, 'Đồng'],
            [15, 'Thu lại tiền xuất trả hàng nhà cung cấp*', 0, 'Đồng'],
            [16, 'Còn nợ tiền nhà cung cấp', number_format($arrData['totalProvideDebt']), 'Đồng'],

            // Doanh thu và chi phí khác
            [17, 'Tổng doanh thu khác*', 0, 'Đồng'],
            [18, 'Tổng chi phí hàng tháng*', 0, 'Đồng'],
            [19, 'Tổng lợi nhuận khác*', 0, 'Đồng'],

            // Hoa hồng bán hàng và khuyến mãi
            [20, 'Huê hồng sale', number_format($arrData['hoahongSale']), 'Đồng'],
            [21, 'Chương trình khuyến mãi khách hàng', 0, 'Đồng'],

            // Các tài khoản quỹ
        ];

        foreach ($funds as $fund) {
            $data[] = [22, $fund->name, number_format($fund->amount), 'Đồng'];
        }
        $headings = [];
        // Xuất file Excel
        return Excel::download(new ExportSumBusiness($data, $headings), 'business.xlsx');
    }
}
