<?php

namespace App\Http\Controllers;

use App\Exports\GenericExport;
use App\Models\ContentGroups;
use App\Models\DetailImport;
use App\Models\PayOder;
use App\Models\ProductWarehouse;
use App\Models\ProvideRepesent;
use App\Models\Provides;
use App\Models\Warehouse;
use App\Models\WarehouseManager;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InitialSetupController extends Controller
{
    // Công nợ khách hàng
    public function exportDebtGuest(Request $request, string $id)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $historyGuest = (new \App\Models\DetailExport)->historyGuest($id);
        $cash_receipts = (new \App\Models\CashReceipt())->cashReceiptByGuest($id);

        // Kết hợp và sắp xếp dữ liệu theo ngày tạo (created_at)
        $combined = $historyGuest->concat($cash_receipts);
        $sortedCombined = $combined->sortBy('created_at');

        // Chuẩn bị dữ liệu và tiêu đề cho Excel
        $collection = $sortedCombined->map(function ($item) {
            return [
                'Chứng từ' => isset($item->quotation_number) ? $item->quotation_number : $item->receipt_code,
                'Ngày' => date_format(new \DateTime($item->created_at), 'd/m/Y'),
                'Diễn giải' => isset($item->quotation_number) ? 'Phiếu bán hàng' : 'Phiếu thu',
                'Tiền toa' => isset($item->total_price) && isset($item->total_tax) ? $item->total_price + $item->total_tax : 0,
                'Thu' => isset($item->amount) ? $item->amount : 0,
                'Còn nợ' => isset($item->total_price) && isset($item->total_tax) ? $item->total_price + $item->total_tax : (isset($item->amount) ? -$item->amount : 0),
            ];
        });

        $headings = ['Chứng từ', 'Ngày', 'Diễn giải', 'Tiền toa', 'Thu', 'Còn nợ'];

        // Xuất file Excel
        return Excel::download(new GenericExport($collection, $headings), 'debt_guest_report.xlsx');
    }
    // Đơn hàng khách hàng
    public function exportDetailGuest(Request $request, string $id)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $productDelivered = (new \App\Models\QuoteExport())->sumProductsQuoteByGuest($id);
        $allDelivery = (new \App\Models\DetailExport())->getSumDetailEByGuest($id);

        // Prepare the collection
        $collection = collect();
        foreach ($allDelivery as $itemDelivery) {
            $matchedItems = $productDelivered->where('detailexport_id', $itemDelivery->id)->where('guest_id', $id);

            if ($matchedItems->isNotEmpty()) {
                foreach ($matchedItems as $matchedItem) {
                    $collection->push([
                        'Số chứng từ' => $itemDelivery->maPhieu,
                        'CTV bán hàng' => $itemDelivery->nameUser,
                        'Mã hàng' => $matchedItem->product_code,
                        'Tên hàng' => $matchedItem->product_name,
                        'ĐVT' => $matchedItem->product_unit,
                        'SL bán' => $matchedItem->product_qty,
                        'Đơn giá' => $matchedItem->giaXuat,
                        'Thành tiền' => $matchedItem->giaXuat * $matchedItem->product_qty,
                    ]);
                }
            }
        }

        // Create the headings for the Excel file
        $headings = [
            'Số chứng từ',
            'CTV bán hàng',
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'SL bán',
            'Đơn giá',
            'Thành tiền',
        ];

        // Xuất file Excel
        return Excel::download(new GenericExport($collection, $headings), 'detail_guest_report.xlsx');
    }

    // Công nợ chi tiết nhà cung cấp
    public function exportDebtProvides(Request $request, string $id)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $provide = Provides::findOrFail($id);
        if ($provide) {
            $title = $provide->provide_name_display;
            $repesent = ProvideRepesent::where('provide_id', $provide->id)->get();
        }
        $payOrder = PayOder::where('guest_id', $id)->get();

        // Kết hợp và sắp xếp dữ liệu theo ngày tạo (created_at)
        $sortedCombined = $provide->getAllDetail
            ->concat($payOrder)
            ->sortBy('created_at');

        // Khởi tạo biến để giữ giá trị còn nợ
        $currentDebt = 0;

        // Chuẩn bị dữ liệu để xuất ra Excel
        $collection = $sortedCombined->map(function ($item) use (&$currentDebt) {
            if (isset($item->total_price)) {
                $currentDebt += $item->total_price;
            } elseif (isset($item->total)) {
                $currentDebt -= $item->total;
            }

            return [
                'Chứng từ' => isset($item->quotation_number) ? $item->quotation_number : $item->payment_code,
                'Ngày' => date_format(new DateTime($item->created_at), 'd/m/Y'),
                'Diễn giải' => isset($item->quotation_number) ? 'Phiếu đặt hàng' : 'Phiếu chi',
                'Tiền toa' => isset($item->total_price) ? number_format($item->total_price) : 0,
                'Chi' => isset($item->total) ? number_format($item->total) : 0,
                'Còn nợ' => number_format($currentDebt),
            ];
        });

        // Định nghĩa tiêu đề các cột trong Excel
        $headings = [
            'Chứng từ',
            'Ngày',
            'Diễn giải',
            'Tiền toa',
            'Chi',
            'Còn nợ'
        ];

        // Xuất file Excel
        return Excel::download(new GenericExport($collection, $headings), 'debt_provides_report.xlsx');
    }
    // Đơn hàng chi tiết nhà cung cấp
    public function exportDetailProvide(Request $request, string $id)
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $productDelivered = (new \App\Models\QuoteImport())->sumProductsQuoteByProvide($id);
        $allDelivery = (new \App\Models\DetailImport())->getSumDetailEByProvide($id);

        // Chuẩn bị collection và headers cho Excel
        $collection = collect();
        $headings = [
            'Số chứng từ',
            'Mã hàng',
            'Tên hàng',
            'ĐVT',
            'SL Mua',
            'Đơn giá',
            'Thành tiền'
        ];

        $stt = 1;
        $totalQty = 0;
        $totalAmount = 0;

        foreach ($allDelivery as $itemDelivery) {
            $matchedItems = $productDelivered
                ->where('detailimport_id', $itemDelivery->id)
                ->where('provide_id', $id);

            if ($matchedItems->isNotEmpty()) {
                $isFirst = true; // Đặt biến cờ để xác định mục đầu tiên trong vòng lặp
                foreach ($matchedItems as $matchedItem) {
                    $collection->push([
                        'Số chứng từ' => $isFirst ? $itemDelivery->maPhieu : '',
                        'Mã hàng' => $matchedItem->product_code,
                        'Tên hàng' => $matchedItem->product_name,
                        'ĐVT' => $matchedItem->product_unit,
                        'SL Mua' => number_format($matchedItem->product_qty),
                        'Đơn giá' => number_format($matchedItem->price_export),
                        'Thành tiền' => number_format($matchedItem->product_qty * $matchedItem->price_export),
                    ]);

                    // Đặt lại biến cờ sau lần đầu tiên
                    $isFirst = false;

                    // Tính tổng số lượng và tổng tiền
                    $totalQty += $matchedItem->product_qty;
                    $totalAmount += $matchedItem->product_qty * $matchedItem->price_export;
                }
            }
            $stt++;
        }

        // Thêm dòng tổng cộng vào cuối collection
        $collection->push([
            'Số chứng từ' => '',
            'Mã hàng' => '',
            'Tên hàng' => 'Tổng cộng',
            'ĐVT' => '',
            'SL Mua' => number_format($totalQty),
            'Đơn giá' => '',
            'Thành tiền' => number_format($totalAmount),
        ]);

        // Xuất file Excel
        return Excel::download(new GenericExport($collection, $headings), 'detail_provide_report.xlsx');
    }
    // sản phẩm chi tiết hàng hoá/ Bán hàng
    public function exportDetailSale(Request $request, string $id)
    {
        // Retrieve the detailed export data by product ID
        $quoteExport = (new \App\Models\DetailExport())->getAllDetailExportByProduct($id);

        // Prepare the data for export
        $collection = $quoteExport->map(function ($item) {
            return [
                'Mã phiếu' => $item->quotation_number,
                'Số phiếu' => $item->reference_number,
                'Ngày lập' => date('d/m/Y', strtotime($item->ngayBG)),
                'Khách hàng' => $item->guest_name_display,
                'Người tạo' => $item->name,
                'Giao hàng' => $this->getStatusReceiveText($item->status_receive),
                'Tổng tiền' => number_format($item->total_price + $item->total_tax),
            ];
        });

        // Define the headings for the Excel file
        $headings = [
            'Mã phiếu',
            'Số phiếu',
            'Ngày lập',
            'Khách hàng',
            'Người tạo',
            'Giao hàng',
            'Tổng tiền',
        ];

        // Export the data to an Excel file
        return Excel::download(new GenericExport($collection, $headings), 'detail_sale_product.xlsx');
    }

    private function getStatusReceiveText($status)
    {
        switch ($status) {
            case 1:
                return 'Pending';  // Update the text based on your requirement
            case 2:
                return 'Completed';
            case 3:
                return 'In Progress';
            default:
                return 'Unknown';
        }
    }

    // sản phẩm chi tiết hàng hoá/ Đặt hàng
    public function exportDetailOrder(Request $request, string $id)
    {
        // Fetch the order details
        $import = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('detailimport.id', 'detailimport.quotation_number', 'detailimport.reference_number', 'detailimport.created_at', 'provides.provide_name_display', 'detailimport.status_receive', 'detailimport.total_tax')
            ->orderBy('detailimport.id', 'desc');

        // Filter based on user role
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $import->where('user_id', Auth::user()->id);
            }
        }

        // Fetch the data
        $import = $import->get();

        // Define the column headings for the Excel file
        $headings = [
            'Mã Phiếu',
            'Số Phiếu',
            'Ngày Lập',
            'Nhà Cung Cấp',
            'Người Tạo',
            'Nhận Hàng',
            'Tổng Tiền'
        ];

        // Prepare the data for export
        $collection = $import->map(function ($item) {
            return [
                $item->quotation_number,
                $item->reference_number,
                date('d/m/Y', strtotime($item->created_at)),
                $item->provide_name_display,
                optional($item->getNameUser)->name,
                $this->getStatusReceive($item->status_receive),
                number_format($item->total_tax),
            ];
        });

        // Export to Excel
        return Excel::download(new GenericExport($collection, $headings), 'detail_order.xlsx');
    }

    // Helper method to get the status receive text
    private function getStatusReceive($status)
    {
        switch ($status) {
            case 1:
                return 'Pending';
            case 2:
                return 'Received';
            case 3:
                return 'Cancelled';
            default:
                return 'Unknown';
        }
    }
    // chi tiết Quỹ
    public function exportDetailFund(Request $request, string $id)
    {
        // Retrieve fund receipts
        $fundReceipts = DB::table('cash_receipts')
            ->join('funds', 'cash_receipts.fund_id', '=', 'funds.id')
            ->select(
                'cash_receipts.fund_id',
                'funds.name as fund_name',
                'cash_receipts.created_at',
                'cash_receipts.amount',
                'cash_receipts.receipt_code as code', // Use a common name 'code'
                DB::raw('NULL as payment') // Set payment as NULL for receipts
            )
            ->where('cash_receipts.fund_id', $id)
            ->get();

        // Retrieve fund payments
        $fundPayments = DB::table('pay_order')
            ->join('funds', 'pay_order.fund_id', '=', 'funds.id')
            ->select(
                'pay_order.fund_id',
                'funds.name as fund_name',
                'pay_order.created_at',
                DB::raw('NULL as amount'), // Set amount as NULL for payments
                'pay_order.payment',
                'pay_order.payment_code as code' // Use a common name 'code'
            )
            ->where('pay_order.fund_id', $id)
            ->get();

        // Combine and sort the data by date
        $combined = $fundReceipts->concat($fundPayments)->sortBy('created_at');

        // Prepare the data for export
        $data = $combined->map(function ($item) {
            return [
                'Ngày' => date('d/m/Y', strtotime($item->created_at)),
                'Chứng từ' => $item->code,
                'Tên quỹ' => $item->fund_name,
                'Thu' => $item->amount ? number_format($item->amount) : 0,
                'Chi' => $item->payment ? number_format($item->payment) : 0,
            ];
        });

        // Define the headings
        $headings = ['Ngày', 'Chứng từ', 'Tên quỹ', 'Thu', 'Chi'];

        // Export to Excel
        return Excel::download(new GenericExport($data, $headings), 'detail_fund.xlsx');
    }
    // Chi tiết nội dung thu chi
    public function exportDetailContent(Request $request, string $id)
    {
        // Retrieve contentChi data
        $contentChi = ContentGroups::where('pay_order.content_pay', $id)
            ->leftJoin('pay_order', 'pay_order.content_pay', 'contentgroups.id')
            ->leftJoin('funds', 'pay_order.fund_id', 'funds.id')
            ->select('contentgroups.name', 'pay_order.payment_code as code', 'funds.name as tenQuy', 'pay_order.note')
            ->get();

        // Retrieve contentThu data
        $contentThu = ContentGroups::where('cash_receipts.content_id', $id)
            ->leftJoin('cash_receipts', 'cash_receipts.content_id', 'contentgroups.id')
            ->leftJoin('funds', 'cash_receipts.fund_id', 'funds.id')
            ->select('contentgroups.name', 'cash_receipts.receipt_code as code', 'funds.name as tenQuy', 'cash_receipts.note')
            ->get();

        // Combine the two collections
        $combined = $contentChi->concat($contentThu);

        // Prepare the data for export
        $data = $combined->map(function ($item) {
            return [
                'Mã phiếu' => $item->code,
                'Nội dung' => $item->name,
                'Quỹ' => $item->tenQuy,
                'Ghi chú' => $item->note,
            ];
        });

        // Define the headings
        $headings = ['Mã phiếu', 'Nội dung', 'Quỹ', 'Ghi chú'];

        // Export to Excel
        return Excel::download(new GenericExport($data, $headings), 'detail_content.xlsx');
    }
    // Chi tiết kho hàng 
    public function exportDetailWH(Request $request, string $id)
    {
        // Find the warehouse details
        $wareHouse = Warehouse::findOrFail($id);

        // Retrieve the product details associated with the warehouse
        $product = ProductWarehouse::where('productwarehouse.warehouse_id', $id)
            ->leftJoin('products', 'productwarehouse.product_id', 'products.id')
            ->select('products.product_code', 'products.product_name', 'products.product_unit', 'productwarehouse.qty')
            ->where('productwarehouse.workspace_id', Auth::user()->current_workspace)
            ->get();

        // Prepare the data for export
        $data = $product->map(function ($item) {
            return [
                'Mã hàng hóa' => $item->product_code,
                'Tên hàng hóa' => $item->product_name,
                'ĐVT' => $item->product_unit,
                'Số lượng tồn' => is_int($item->qty) ? $item->qty : rtrim(rtrim(number_format($item->qty, 4, '.', ''), '0'), '.'),
            ];
        });

        // Define the headings
        $headings = ['Mã hàng hóa', 'Tên hàng hóa', 'ĐVT', 'Số lượng tồn'];

        // Export to Excel
        return Excel::download(new GenericExport($data, $headings), 'detail_warehouse.xlsx');
    }
    // Chi tiết nhân viên đơn hàng
    public function exportDetailUser(Request $request, string $id)
    {
        // Fetch detail export data
        $detailExport = (new \App\Models\DetailExport())->getAllDetailExportByUser($id);

        // Fetch detail import data with joined data for provides
        $detailImport = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('detailimport.*', 'provides.provide_name_display')
            ->orderBy('detailimport.created_at', 'asc') // Use created_at for sorting
            ->get(); // Fetch all records

        // Combine and sort both collections by created_at
        $combined = $detailExport->concat($detailImport);
        $sortedCombined = $combined->sortBy('created_at');

        // Prepare the data for export
        $data = $sortedCombined->map(function ($item) {
            return [
                'Mã phiếu' => $item->quotation_number,
                'Ngày lập' => date_format(new DateTime($item->created_at), 'd/m/Y'),
                'Diễn giải' => isset($item->guest_id) ? 'Phiếu bán hàng' : 'Phiếu đặt hàng NCC',
                'Khách hàng / NCC' => isset($item->guest_name_display) ? $item->guest_name_display : $item->provide_name_display,
            ];
        });

        // Define the headings
        $headings = ['Mã phiếu', 'Ngày lập', 'Diễn giải', 'Khách hàng / NCC'];

        // Export to Excel
        return Excel::download(new GenericExport($data, $headings), 'detail_user.xlsx');
    }
    // Chi tiết nhân viên doanh số
    public function exportDetailUserSales(Request $request, string $id)
    {
        // Fetch data
        $productDelivered = (new \App\Models\QuoteExport())->sumProductsQuote();
        $allDelivery = (new \App\Models\DetailExport())->getSumDetailE();

        // Prepare data
        $data = [];
        $totalDeliverQty = 0;
        $totalPriceExport = 0;
        $totalProductTotalVat = 0;
        $totalItemDeliveryTotalProductVat = 0;
        $totalPay = 0;
        $totalRemai = 0;
        $stt = 1; // Initialize the STT variable

        foreach ($allDelivery as $itemDelivery) {
            $matchedItems = $productDelivered
                ->where(
                    'detailexport_id',
                    $itemDelivery->id
                )
                ->where('id_sale', $id);
            $count = $matchedItems->count();

            if ($matchedItems->isNotEmpty()) {
                $totalItemDeliveryTotalProductVat += $itemDelivery->totalProductVat + $itemDelivery->total_tax;
                $Pay = $itemDelivery->totalProductVat + $itemDelivery->total_tax - $itemDelivery->amount_owed;
                $Remai = $itemDelivery->amount_owed;
                $totalPay += $Pay;
                $totalRemai += $Remai;

                foreach ($matchedItems as $matchedItem) {
                    $totalDeliverQty += $matchedItem->product_qty;
                    $totalPriceExport += $matchedItem->price_export;
                    $totalProductTotalVat += $matchedItem->product_total;

                    $data[] = [
                        'Mã phiếu' => $itemDelivery->maPhieu,
                        'Khách hàng' => $itemDelivery->nameGuest,
                        'Nhóm hàng' => $matchedItem->nameGr,
                        'Mã hàng' => $matchedItem->product_code,
                        'Tên hàng' => $matchedItem->product_name,
                        'Đơn vị tính' => $matchedItem->product_unit,
                        'Số lượng' => $matchedItem->product_qty,
                        'Đơn giá' => $matchedItem->price_export,
                        'Thành tiền' => $matchedItem->product_total,
                    ];
                }

                $stt++; // Increment STT after each invoice
            }
        }

        // Convert data array to Collection
        $dataCollection = collect($data);

        // Define headings
        $headings = [
            'Mã phiếu',
            'Khách hàng',
            'Nhóm hàng',
            'Mã hàng',
            'Tên hàng',
            'Đơn vị tính',
            'Số lượng',
            'Đơn giá',
            'Thành tiền'
        ];

        // Export to Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'detail_user_sales.xlsx');
    }
}
