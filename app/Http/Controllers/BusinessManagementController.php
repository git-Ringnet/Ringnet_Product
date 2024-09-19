<?php

namespace App\Http\Controllers;

use App\Exports\GenericExport;
use App\Models\CashReceipt;
use App\Models\ChangeWarehouse;
use App\Models\ContentImportExport;
use App\Models\Delivery;
use App\Models\DetailImport;
use App\Models\Groups;
use App\Models\Guest;
use App\Models\PayOder;
use App\Models\Promotion;
use App\Models\Receive_bill;
use App\Models\ReturnExport;
use App\Models\ReturnImport;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class BusinessManagementController extends Controller
{
    // Phiếu bán hàng
    public function exportQuote(Request $request)
    {
        // Lấy dữ liệu
        $quoteExport = (new \App\Models\DetailExport())->getAllDetailExport($request->all());

        // Chuẩn bị dữ liệu để xuất ra Excel
        $dataCollection = $quoteExport->map(function ($item) {
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

        // Định nghĩa tiêu đề cho các cột
        $headings = [
            'Mã phiếu',
            'Số phiếu',
            'Ngày lập',
            'Khách hàng',
            'Người tạo',
            'Giao hàng',
            'Tổng tiền',
        ];

        // Xuất file Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'quote.xlsx');
    }

    // Hàm chuyển đổi trạng thái giao hàng thành dạng chữ
    private function getStatusReceiveText($status)
    {
        switch ($status) {
            case 1:
                return 'Chờ xử lý';
            case 2:
                return 'Đã hoàn thành';
            case 3:
                return 'Đang xử lý';
            default:
                return 'Không xác định';
        }
    }
    // Đặt hàng NCC
    public function exportImport(Request $request)
    {
        // Lấy dữ liệu
        $import = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('detailimport.*', 'provides.provide_name_display')
            ->orderBy('detailimport.id', 'desc');

        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $import->where('user_id', Auth::user()->id);
            }
        }
        $data = $request->all();
        $import = filterByDate($data, $import, 'detailimport.created_at');

        // Lấy dữ liệu
        $import = $import->get();

        // Chuẩn bị dữ liệu cho file Excel
        $dataCollection = $import->map(function ($item) {
            return [
                'Mã phiếu' => $item->quotation_number,
                'Số phiếu' => $item->reference_number,
                'Ngày lập' => $item->created_at->format('Y-m-d'),
                'Nhà cung cấp' => $item->provide_name_display,
                'Người tạo' => $item->getNameUser->name, // Giả sử có mối quan hệ để lấy tên người tạo
                'Nhận hàng' => $this->getStatusReceiveText($item->status_receive),
                'Tổng tiền' => $item->total_tax,
            ];
        });

        // Định nghĩa tiêu đề cột cho file Excel
        $headings = [
            'Mã phiếu',
            'Số phiếu',
            'Ngày lập',
            'Nhà cung cấp',
            'Người tạo',
            'Nhận hàng',
            'Tổng tiền',
        ];

        // Xuất file Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'import.xlsx');
    }

    // Trả hàng NCC
    public function exportReturnI(Request $request)
    {
        // Lấy dữ liệu từ ReturnImport
        $data = ReturnImport::where('workspace_id', Auth::user()->current_workspace);
        $data = filterByDate(
            $request->all(),
            $data,
            'returnimport.created_at'
        );
        $data = $data->get();

        // Định nghĩa tiêu đề cho các cột
        $headings = [
            'Phiếu trả hàng',
            'Phiếu nhập kho',
            'Ngày trả hàng',
            'Người tạo',
            'Trạng thái',
            'Nội dung trả hàng'
        ];

        // Tạo collection dữ liệu để xuất
        $dataCollection = $data->map(function ($item) {
            return [
                'return_code' => $item->return_code,
                'delivery_code' => $item->getReceive ? $item->getReceive->delivery_code : '',
                'created_at' => $item->created_at->format('d/m/Y'),
                'user_name' => $item->getUser ? $item->getUser->name : '',
                'status' => $item->status == 1 ? 'Đơn nháp' : 'Đã trả',
                'description' => $item->description
            ];
        });

        // Xuất file Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'return.xlsx');
    }
    // Trả hàng Khách hàng
    public function exportReturnE(Request $request)
    {
        // Lấy dữ liệu từ ReturnExport
        $data = ReturnExport::where('workspace_id', Auth::user()->current_workspace);
        $data = filterByDate(
            $request->all(),
            $data,
            'return_export.created_at'
        );
        $data = $data->get();


        // Định nghĩa tiêu đề cho các cột
        $headings = [
            'Mã phiếu',
            'Phiếu bán hàng',
            'Ngày trả hàng',
            'Khách hàng',
            'Người tạo',
            'Trạng thái',
            'Nội dung trả hàng'
        ];

        // Tạo collection dữ liệu để xuất
        $dataCollection = $data->map(function ($item) {
            return [
                'return_code' => $item->code_return,
                'delivery_code' => $item->getDelivery ? $item->getDelivery->code_delivery : '',
                'created_at' => $item->created_at->format('d/m/Y'),
                'guest_name_display' => $item->getGuest ? $item->getGuest->guest_name_display : '',
                'user_name' => $item->getUser ? $item->getUser->name : '',
                'status' => $item->status == 1 ? 'Đơn nháp' : 'Đã trả',
                'description' => $item->description,
            ];
        });

        // Sử dụng Laravel Excel để xuất dữ liệu
        return Excel::download(new GenericExport($dataCollection, $headings), 'return_export.xlsx');
    }
    // Phiếu Nhập kho
    public function exportReceive(Request $request)
    {
        // Truy vấn dữ liệu
        $receive = Receive_bill::where('receive_bill.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'receive_bill.provide_id', 'provides.id')
            ->orderBy('receive_bill.id', 'desc');

        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $receive->join('detailimport', 'detailimport.id', 'receive_bill.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }
        $receive->select('receive_bill.*', 'provides.provide_name_display');
        $receive = filterByDate(
            $request->all(),
            $receive,
            'receive_bill.created_at'
        );
        $data = $receive->get();

        // Tạo dữ liệu cho xuất Excel
        $dataCollection = $data->map(function ($item) {
            return [
                'delivery_code' => $item->delivery_code,
                'created_at' => $item->created_at->format('d/m/Y'),
                'provide_name_display' => $item->provide_name_display,
                'user_name' => optional($item->getNameUser)->name ?? 'N/A',
                'status' => $item->status == 1 ? 'Chưa nhận' : 'Đã nhận',
            ];
        });

        // Định nghĩa tiêu đề cột
        $headings = [
            'Mã phiếu',
            'Ngày lập',
            'Nhà cung cấp',
            'Người tạo',
            'Trạng thái',
        ];

        // Xuất dữ liệu bằng Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'receive.xlsx');
    }
    // Phiếu xuất kho
    public function exportDelivery(Request $request)
    {
        $deliveriesQuery = Delivery::leftJoin('detailexport', 'detailexport.id', 'delivery.detailexport_id')
            ->leftJoin('guest', 'guest.id', 'delivery.guest_id')
            ->leftJoin('users', 'users.id', 'delivery.user_id')
            ->select(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'delivery.id as maGiaoHang',
                'delivery.created_at as ngayGiao',
                'delivery.status as trangThai',
                'users.name as user_name',
                'detailexport.guest_name',
                'guest.guest_name_display as nameGuest',
                'delivery.totalVAT as totalVAT',
                DB::raw('(
                SELECT 
                    CASE 
                        WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) != 0 THEN 
                            CASE 
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 1 THEN 
                                    (COALESCE(SUM(product_total_vat), 0) - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100))
                                WHEN JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.type")) = 2 THEN 
                                    ((COALESCE(SUM(product_total_vat), 0) * (100 - CAST(JSON_UNQUOTE(JSON_EXTRACT(delivery.promotion, "$.value")) AS DECIMAL)) / 100)) * (1 + (COALESCE(MAX(products.product_tax), 0) / 100))
                                ELSE 
                                    COALESCE(SUM(product_total_vat), 0)
                            END
                        ELSE
                            COALESCE(SUM(product_total_vat), 0)
                    END
                FROM delivered 
                LEFT JOIN products ON delivered.product_id = products.id
                WHERE delivered.delivery_id = delivery.id
            ) as totalProductVat')
            )
            ->where('delivery.workspace_id', Auth::user()->current_workspace)
            ->groupBy(
                'delivery.id',
                'delivery.guest_id',
                'delivery.quotation_number',
                'delivery.code_delivery',
                'delivery.shipping_unit',
                'delivery.shipping_fee',
                'users.name',
                'delivery.created_at',
                'delivery.status',
                'detailexport.guest_name',
                'delivery.totalVAT',
                'guest.guest_name_display',
                'delivery.promotion'
            )
            ->orderBy('delivery.id', 'desc');

        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $deliveriesQuery->where('delivery.user_id', Auth::user()->id);
        }
        $deliveriesQuery = filterByDate(
            $request->all(),
            $deliveriesQuery,
            'delivery.created_at'
        );
        $deliveries = $deliveriesQuery->get();

        $dataCollection = $deliveries->map(function ($item) {
            return [
                'delivery_code' => $item->code_delivery,
                'created_at' => $item->ngayGiao,
                'provide_name_display' => $item->nameGuest,
                'user_name' => $item->user_name ?? 'N/A',
                'status' => $item->trangThai == 1 ? 'Chưa nhận' : 'Đã nhận',
            ];
        });

        $headings = [
            'Mã phiếu',
            'Ngày lập',
            'Khách hàng',
            'Người tạo',
            'Trạng thái',
        ];

        return Excel::download(new GenericExport($dataCollection, $headings), 'delivery.xlsx');
    }
    // Phiếu thu
    public function exportCashRC(Request $request)
    {
        // Truy vấn dữ liệu
        $cashReceipts = CashReceipt::with(['guest', 'fund', 'user', 'workspace'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->orderby('id', 'DESC');
        $cashReceipts = filterByDate(
            $request->all(),
            $cashReceipts,
            'cash_receipts.date_created'
        );
        $cashReceipts = $cashReceipts->get();

        // Chuyển đổi dữ liệu thành định dạng phù hợp để xuất Excel
        $dataCollection = $cashReceipts->map(function ($item) {
            return [
                'Mã số phiếu' => $item->receipt_code,
                'Ngày lập' => date_format(new DateTime($item->date_created), 'd/m/Y'),
                'Khách hàng' => $item->guest->guest_name_display ?? 'N/A',
                'Người nộp' => $item->payer,
                'Nội dung' => $item->content->name ?? 'N/A',
                'Số tiền' => number_format($item->amount),
                'Quỹ' => $item->fund->name ?? 'N/A',
                'Nhân viên' => $item->user->name ?? 'N/A',
                'Ghi chú' => $item->note ?? 'N/A',
                'Trạng thái' => $this->getStatusLabel($item->status),
            ];
        });

        // Tiêu đề cột cho Excel
        $headings = [
            'Mã số phiếu',
            'Ngày lập',
            'Khách hàng',
            'Người nộp',
            'Nội dung',
            'Số tiền',
            'Quỹ',
            'Nhân viên',
            'Ghi chú',
            'Trạng thái'
        ];

        // Xuất dữ liệu bằng Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'cash_receipts.xlsx');
    }

    /**
     * Chuyển đổi mã trạng thái thành nhãn.
     *
     * @param int $status
     * @return string
     */
    protected function getStatusLabel($status)
    {
        switch ($status) {
            case 1:
                return 'Nháp';
            case 2:
                return 'Đã thu';
            default:
                return 'N/A';
        }
    }
    // Phiếu chi
    public function exportPayOrder(Request $request)
    {
        // Truy vấn dữ liệu
        $payment = PayOder::where('pay_order.workspace_id', Auth::user()->current_workspace)
            ->orderBy('pay_order.id', 'desc');

        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $payment->join('detailimport', 'detailimport.id', 'pay_order.detailimport_id')
                ->where('detailimport.user_id', Auth::user()->id);
        }

        $payment->select('pay_order.*');
        $payment = filterByDate(
            $request->all(),
            $payment,
            'pay_order.payment_date'
        );
        $payment = $payment->get();

        // Chuẩn bị dữ liệu để xuất
        $dataCollection = $payment->map(function ($item) {
            return [
                'payment_code' => $item->payment_code,
                'payment_date' => date_format(new DateTime($item->payment_date), 'd/m/Y'),
                'guest_name' => $item->getGuest ? $item->getGuest->provide_name_display : '',
                'receiver_name' => $item->payment_type,
                'creator_name' => $item->getNameUser ? $item->getNameUser->name : '',
                'total' => number_format($item->total),
                'content' => $item->getContentPay ? $item->getContentPay->name : '',
                'fund' => $item->getFund ? $item->getFund->name : '',
                'employee_name' => $item->getNameUser ? $item->getNameUser->name : '',
                'note' => $item->note
            ];
        });

        // Định nghĩa tiêu đề (headings)
        $headings = [
            'Mã phiếu chi',
            'Ngày',
            'Khách hàng',
            'Người nhận',
            'Người tạo',
            'Số tiền',
            'Nội dung',
            'Quỹ',
            'Nhân viên',
            'Ghi chú'
        ];

        // Xuất dữ liệu bằng Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'payment.xlsx');
    }
    // Chuyển tiền nội bộ
    public function exportChangeFund(Request $request)
    {
        $content = ContentImportExport::where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc');
        $content = filterByDate(
            $request->all(),
            $content,
            'content-import-export.payment_day'
        );
        $content = $content->get();

        // Prepare data for export
        $dataCollection = $content->map(function ($item) {
            return [
                'Ngày lập' => date_format(new \DateTime($item->payment_day), 'd/m/Y'),
                'Mã phiếu' => $item->form_code,
                'Người lập' => $item->getUser ? $item->getUser->name : '',
                'Số tiền' => number_format($item->qty_money),
                'Từ quỹ' => $item->getFromFund ? $item->getFromFund->name : '',
                'Đến quỹ' => $item->getToFund ? $item->getToFund->name : '',
                'Ghi chú' => $item->notes,
            ];
        });

        // Define headings
        $headings = ['Ngày lập', 'Mã phiếu', 'Người lập', 'Số tiền', 'Từ quỹ', 'Đến quỹ', 'Ghi chú'];

        // Export data using Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'funds.xlsx');
    }
    // Phiếu chuyển xuất kho
    public function exportChangeWH(Request $request)
    {
        // Fetching data for export
        $changeWarehouse = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
            ->where('type_change_warehouse', 1)
            ->orderBy('id', 'desc');
        $changeWarehouse = filterByDate(
            $request->all(),
            $changeWarehouse,
            'change_warehouse.created_at'
        );
        $changeWarehouse = $changeWarehouse->get();

        // Formatting data for export
        $dataCollection = $changeWarehouse->map(function ($item) {
            return [
                'day_created' => $item->created_at,
                'change_warehouse_code' => $item->change_warehouse_code,
                'from_warehouse' => $item->getFromWarehouse ? $item->getFromWarehouse->warehouse_name : 'N/A',
                'to_warehouse' => $item->getToWarehouse ? $item->getToWarehouse->warehouse_name : 'N/A',
                'created_by' => $item->getUser ? $item->getUser->name : 'N/A',
                'note' => $item->note,
            ];
        });

        // Defining headings
        $headings = [
            'Ngày lập phiếu',
            'Mã phiếu',
            'Kho xuất',
            'Kho nhập',
            'Người tạo',
            'Ghi chú'
        ];
        // Exporting data using Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'warehouse.xlsx');
    }
    // Phiếu nhập chuyển kho
    public function exportImportChangeWH(Request $request)
    {
        // Fetching data for export
        $changeWarehouse = ChangeWarehouse::where('workspace_id', Auth::user()->current_workspace)
            ->where('type_change_warehouse', 2)
            ->orderBy('id', 'desc');
        $changeWarehouse = filterByDate(
            $request->all(),
            $changeWarehouse,
            'change_warehouse.created_at'
        );
        $changeWarehouse = $changeWarehouse->get();

        // Formatting data for export
        $dataCollection = $changeWarehouse->map(function ($item) {
            return [
                'day_created' => $item->created_at,
                'change_warehouse_code' => $item->change_warehouse_code,
                'from_warehouse' => $item->getFromWarehouse ? $item->getFromWarehouse->warehouse_name : 'N/A',
                'to_warehouse' => $item->getToWarehouse ? $item->getToWarehouse->warehouse_name : 'N/A',
                'created_by' => $item->getUser ? $item->getUser->name : 'N/A',
                'note' => $item->note,
            ];
        });

        // Defining headings
        $headings = [
            'Ngày lập phiếu',
            'Mã phiếu',
            'Kho xuất',
            'Kho nhập',
            'Người tạo',
            'Ghi chú'
        ];
        // Exporting data using Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'warehouse.xlsx');
    }
    // Hoa hồng sale
    public function exportCommission(Request $request)
    {
        // Fetching data for export
        $users = User::all();
        $productDelivered = (new \App\Models\QuoteExport())->sumProductsQuoteSale();
        $allDelivery = (new \App\Models\DetailExport())->getSumDetailESale($request->all());
        $groupUsers = Groups::where('grouptype_id', 1)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();

        // Formatting data for export
        $dataCollection = collect();

        // Add users without a group first
        $dataCollection->push(['Nhóm đối tượng: Chưa chọn nhóm']);
        foreach ($users as $user) {
            if ($user->group_id == 0 || $user->group_id === null) {
                $dataCollection->push(['Nhân viên: ' . $user->name]);
                $this->addUserData($dataCollection, $user, $allDelivery, $productDelivered);
            }
        }

        // Then add users with groups
        foreach ($groupUsers as $group) {
            $dataCollection->push(['Nhóm nhân viên: ' . $group->name]);
            foreach ($users as $user) {
                if ($user->group_id == $group->id) {
                    $dataCollection->push(['Nhân viên: ' . $user->name]);
                    $this->addUserData($dataCollection, $user, $allDelivery, $productDelivered);
                }
            }
        }

        // Defining headings
        $headings = [
            'Mã phiếu',
            'Khách hàng',
            'Nhóm hàng',
            'Mã hàng',
            'Tên hàng',
            'Đơn vị tính',
            'Số lượng',
            'Đơn giá',
            'Thành tiền',
            'Hoa hồng (VND)',
            'Tổng cộng (hoa hồng * số lượng)',
            'Trạng thái giao'
        ];

        // Exporting data using Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'commission_report.xlsx');
    }

    private function addUserData($dataCollection, $user, $allDelivery, $productDelivered)
    {
        foreach ($allDelivery as $delivery) {
            $matchedItems = $productDelivered
                ->where('detailexport_id', $delivery->id)
                ->where('id_sale', $user->id);

            foreach ($matchedItems as $item) {
                $dataCollection->push([
                    $delivery->maPhieu,
                    $delivery->nameGuest,
                    $item->nameGr,
                    $item->product_code,
                    $item->product_name,
                    $item->product_unit,
                    $item->product_qty,
                    $item->price_export,
                    $item->product_total,
                    $item->commission,
                    $item->total_amount,
                    $item->statusCM == 1 ? 'Đã giao' : 'Chưa giao'
                ]);
            }
        }
    }

    // Chương trình khuyến mãi
    public function exportPromotion(Request $request)
    {
        // Fetching data for export
        $guests = Guest::where('workspace_id', Auth::user()->current_workspace)->get();
        $productDelivered = (new \App\Models\QuoteExport())->sumProductsQuoteSale();
        $allDelivery = (new \App\Models\DetailExport())->getSumDetailESale($request->all());
        $groupGuests = Groups::where('grouptype_id', 2)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        $promotions = Promotion::where('month', Carbon::now()->month)->get();

        // Formatting data for export
        $dataCollection = collect();

        // Add guests without a group first
        $dataCollection->push(['Nhóm khách hàng: Chưa chọn nhóm']);
        foreach ($guests as $guest) {
            if ($guest->group_id == 0 || $guest->group_id === null) {
                $dataCollection->push(['Khách hàng: ' . $guest->guest_name_display]);
                $this->addGuestData($dataCollection, $guest, $allDelivery, $productDelivered, $promotions);
                $this->addTotalRow($dataCollection, $guest, $allDelivery, $productDelivered, $promotions);
            }
        }

        // Then add guests with groups
        foreach ($groupGuests as $group) {
            $dataCollection->push(['Nhóm khách hàng: ' . $group->name]);
            foreach ($guests as $guest) {
                if ($guest->group_id == $group->id) {
                    $dataCollection->push(['Khách hàng: ' . $guest->guest_name_display]);
                    $this->addGuestData($dataCollection, $guest, $allDelivery, $productDelivered, $promotions);
                    $this->addTotalRow($dataCollection, $guest, $allDelivery, $productDelivered, $promotions);
                }
            }
        }

        // Defining headings
        $headings = [
            'Mã phiếu',
            'Nhân viên Sale',
            'Nhóm hàng',
            'Mã hàng',
            'Tên hàng',
            'Đơn vị tính',
            'Số lượng',
            'Bao (Số lượng)',
            'Tiền (VND)',
            'Vàng',
            'Mô tả'
        ];

        // Exporting data using Laravel Excel
        return Excel::download(new GenericExport($dataCollection, $headings), 'promotion_report.xlsx');
    }
    private function addGuestData($dataCollection, $guest, $allDelivery, $productDelivered, $promotions)
    {
        foreach ($allDelivery as $delivery) {
            $matchedItems = $productDelivered
                ->where('detailexport_id', $delivery->id)
                ->where('guest_id', $guest->id);

            foreach ($matchedItems as $item) {
                // Find promotion for the guest
                $promotion = $promotions->firstWhere('guest_id', $guest->id);

                $dataCollection->push([
                    $delivery->maPhieu,
                    $delivery->nameUser,
                    $item->nameGr,
                    $item->product_code,
                    $item->product_name,
                    $item->product_unit,
                    '',
                    '',
                    '',
                    ''
                ]);
            }
        }
    }
    private function addTotalRow($dataCollection, $guest, $allDelivery, $productDelivered, $promotions)
    {
        $totalDeliverQty = 0;
        $totalProductTotalVat = 0;
        $totalProductQuantity = 0;
        $totalCashValue = 0;
        $goldValues = [];

        foreach ($allDelivery as $delivery) {
            $matchedItems = $productDelivered
                ->where('detailexport_id', $delivery->id)
                ->where('guest_id', $guest->id);

            foreach ($matchedItems as $item) {
                $totalDeliverQty += $item->product_qty;
                $totalProductTotalVat += $item->product_total; // Assuming this is the total money for the item
                $totalProductQuantity += $item->product_quantity;
                $totalCashValue += $item->cash_value;
                if (!empty($item->gold_value)) {
                    $goldValues[] = $item->gold_value;
                }
            }
        }

        // Find promotion for the guest
        $promotion = $promotions->firstWhere('guest_id', $guest->id);

        // If promotion exists, override the calculated values
        if ($promotion) {
            $totalProductQuantity = $promotion->product_quantity;
            $totalCashValue = $promotion->cash_value;
            $goldValues = [$promotion->gold_value];
        }

        $dataCollection->push([
            'Tổng cộng', // Label for total row
            '', // Empty cell for 'Nhân viên Sale'
            '', // Empty cell for 'Nhóm hàng'
            '', // Empty cell for 'Mã hàng'
            '', // Empty cell for 'Tên hàng'
            '', // Empty cell for 'Đơn vị tính'
            number_format($totalDeliverQty),
            $totalProductQuantity,
            number_format($totalCashValue),
            implode(', ', $goldValues),
            $promotion ? $promotion->description : ''
        ]);
    }
}
