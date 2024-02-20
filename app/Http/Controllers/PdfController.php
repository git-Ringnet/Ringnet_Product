<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\BillSale;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Serialnumber;
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
    private $delivery;


    public function __construct()
    {
        $this->detailExport = new DetailExport();
        $this->guest = new Guest();
        $this->quoteExport = new QuoteExport();
        $this->product = new Products();
        $this->delivery = new Delivery();
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
        $billSale = $this->delivery->getDeliveryToId($id);
        $product = $this->delivery->getProductToId($id);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $id)
            ->where('serialnumber.delivery_id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $bg = url('dist/img/logo-2050x480-1.png');
        $data = [
            'delivery' => $billSale,
            'product' => $product,
            'serinumber' => $serinumber,
            'date' => $billSale->ngayGiao,
            'bg' => $bg,
        ];
        // dd($serinumber);
        $pdf = Pdf::loadView('pdf.delivery', compact('data'))
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'dpi' => 100,
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'enable_remote' => false,

            ]);
        // dd($billSale);
        return $pdf->download('delivery.pdf');
        // return view('pdf.delivery', compact('data'));
    }
}
