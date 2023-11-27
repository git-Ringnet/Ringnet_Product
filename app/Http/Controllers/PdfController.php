<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\BillSale;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\Products;
use App\Models\QuoteExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
    public function index(string $id)
    {
        // $id = session('id');
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
        // return view('pdf.quote', compact('data'));
    }
    public function export($id)
    {
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        $quoteExport = $this->detailExport->getProductToId($id);
        $data = ['detailExport' => $detailExport, 'quoteExport' => $quoteExport, 'product' => $product];
        return Excel::download(new UsersExport($data), 'users.xlsx');
    }

    public function pdfdelivery($id)
    {
        // // $id = session('id');
        // $guest = $this->guest->getAllGuest();
        // $product = $this->product->getAllProducts();
        // $detailExport = $this->detailExport->getDetailExportToId($id);
        // $quoteExport = $this->detailExport->getProductToId($id);
        $billSale = BillSale::where('bill_sale.id', $id)
            ->leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'bill_sale.guest_id', 'guest.id')
            ->select('*', 'bill_sale.id as idHD', 'bill_sale.created_at as ngayHD')
            ->first();

        $product = BillSale::join('product_bill', 'bill_sale.id', '=', 'product_bill.billSale_id')
            ->join('quoteexport', 'product_bill.product_id', '=', 'quoteexport.product_id')
            ->where('bill_sale.id', $id)
            ->select(
                'bill_sale.*',
                'product_bill.*',
                'quoteexport.*',
            )
            ->get();
        $data = [
            'delivery' => $billSale,
            'product' => $product,
            'date' => $billSale->created_at
        ];

        $pdf = Pdf::loadView('pdf.delivery', compact('data'))
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'dpi' => 140,
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'enable_remote' => false,
            ]);
        return $pdf->download('delivery.pdf');
        // dd($data);
        // return view('pdf.delivery', compact('data'));
    }
}
