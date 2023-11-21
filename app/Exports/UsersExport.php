<?php

namespace App\Exports;

use App\Models\QuoteExport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    public function view(): View
    {
        return view('pdf.quote-excel');
    }
}
