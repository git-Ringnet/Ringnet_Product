<?php

namespace App\Exports;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function collection()
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
        return $guests;
    }
    public function headings(): array
    {
        return [
            'Mã',
            'Tên',
            'Địa chỉ',
            'Điện thoại',
            'Email',
            'Loại giá',
            'Định mức nợ',
            'Công nợ ban đầu',
        ];
    }
}
