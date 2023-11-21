<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\Products;
use App\Models\QuoteExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PdfController extends Controller
{
    private $detailExport;
    private $quoteExport;
    private $guest;
    private $product;


    public function __construct()
    {
        $this->detailExport = new DetailExport();
        $this->guest = new Guest();
        $this->quoteExport = new QuoteExport();
        $this->product = new Products();
    }
    public function update(Request $request, string $id)
    {
        $export_id = $this->detailExport->updateExport($request->all(), $id);
        $this->quoteExport->updateQuoteExport($request->all(), $export_id);
        $request->session()->put('id', $id);
        return redirect()->route('pdf')->with('msg', 'Cập nhật đơn báo giá thành công!');
    }
    public function show(string $id)
    {
        //
    }
    public function index()
    {
        $id = session('id');
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        $quoteExport = $this->detailExport->getProductToId($id);
        $data = ['detailExport' => $detailExport, 'quoteExport' => $quoteExport, 'product' => $product];
        $pdf = Pdf::loadView('pdf.quote', compact('data'))
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'dpi' => 140,
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'enable_remote' => false,
            ]);
        return $pdf->download('invoice.pdf');
        // dd($data['detailExport']);
        // return view('pdf.quote', compact('data'));
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        // return view('pdf.quote-excel');
    }
}
