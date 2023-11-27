<?php

namespace App\Exports;

use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\Products;
use App\Models\QuoteExport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        // Sử dụng $this->data ở đây để truy cập dữ liệu
        return view('pdf.quote-excel', ['data' => $this->data]);
    }
}
