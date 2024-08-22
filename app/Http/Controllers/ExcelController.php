<?php

namespace App\Http\Controllers;

use App\Exports\GenericExport;
use App\Exports\GuestExport;
use App\Models\ContentGroups;
use App\Models\ContentImportExport;
use App\Models\Fund;
use App\Models\Guest;
use App\Models\Products;
use App\Models\Provides;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function exportDebtGuests(Request $request)
    {
        // Lấy dữ liệu khách hàng nợ
        $debtGuests = DebtGuest::all(); // Thay thế bằng truy vấn thực tế của bạn
        $groups = Group::all(); // Thay thế bằng truy vấn thực tế của bạn

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
                    'Nhóm khách hàng' => 'Chưa chọn nhóm',
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
                        'Nhóm khách hàng' => $group->name,
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
        return Excel::download(new GenericExport($collection, $headings), 'debt_guests.xlsx');
    }
}
