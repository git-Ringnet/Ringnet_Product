<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\BillSale;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\PayExport;
use App\Models\Products;
use App\Models\QuoteExport;
use App\Models\Serialnumber;
use App\Models\Workspace;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PdfController extends Controller
{
    private $detailExport;
    private $quoteExport;
    private $guest;
    private $product;
    private $delivery;
    private $billSale;
    private $payExport;

    public function __construct()
    {
        $this->detailExport = new DetailExport();
        $this->guest = new Guest();
        $this->quoteExport = new QuoteExport();
        $this->product = new Products();
        $this->delivery = new Delivery();
        $this->billSale = new BillSale();
        $this->payExport = new PayExport();
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
        $delivery = $this->delivery->getDeliveryToId($id);
        $product = $this->delivery->getProductToId($id);
        $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
            ->where('delivery.id', $id)
            ->where('serialnumber.delivery_id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $bg = url('dist/img/logo-2050x480-1.png');
        $workspace = Workspace::where('id', Auth::user()->current_workspace)->first();
        $data = [
            'delivery' => $delivery,
            'product' => $product,
            'serinumber' => $serinumber,
            'date' => $delivery->ngayGiao,
            'workspace' => $workspace,
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
    public function pdfBillSale($id)
    {
        $billSale = BillSale::where('bill_sale.id', $id)
            ->where('bill_sale.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('detailexport', 'bill_sale.detailexport_id', 'detailexport.id')
            ->select('*', 'bill_sale.id as idHD', 'bill_sale.created_at as ngayHD', 'bill_sale.status as tinhTrang')
            ->first();
        $product = BillSale::join('quoteexport', 'bill_sale.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('product_bill', function ($join) {
                $join->on('product_bill.billSale_id', '=', 'bill_sale.id');
                $join->on('product_bill.product_id', '=', 'quoteexport.product_id');
            })
            ->where('bill_sale.id', $id)
            ->where('quoteexport.status', 1)
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->join('products', 'products.id', 'product_bill.product_id')
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_bill.billSale_qty as deliver_qty'
            )
            ->groupBy(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_bill.billSale_qty'
            )
            ->get();
        $serinumber = Serialnumber::leftJoin('bill_sale', 'bill_sale.detailexport_id', 'serialnumber.detailexport_id')
            ->where('bill_sale.id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $bg = url('dist/img/logo-2050x480-1.png');
        $workspace = Workspace::where('id', Auth::user()->current_workspace)->first();
        $data = [
            'delivery' => $billSale,
            'product' => $product,
            'serinumber' => $serinumber,
            'date' => $billSale->ngayHD,
            'bg' => $bg,
            'workspace' => $workspace,
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
        return $pdf->download('billSale.pdf');
        // return view('pdf.delivery', compact('data'));
    }

    public function pdfPayExport($id)
    {
        $payExport = PayExport::where('pay_export.id', $id)
            ->where('pay_export.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('detailexport', 'pay_export.detailexport_id', 'detailexport.id')
            ->select(
                '*',
                'pay_export.id as idTT',
                'pay_export.created_at as ngayTT',
                'pay_export.status as trangThai',
                DB::raw('(COALESCE(detailexport.total_price, 0) + COALESCE(detailexport.total_tax, 0)) as tongTienNo')
            )
            ->first();
        $product = PayExport::join('quoteexport', 'pay_export.detailexport_id', '=', 'quoteexport.detailexport_id')
            ->leftJoin('product_pay', function ($join) {
                $join->on('product_pay.pay_id', '=', 'pay_export.id');
                $join->on('product_pay.product_id', '=', 'quoteexport.product_id');
            })
            ->where('quoteexport.status', 1)
            ->where('pay_export.id', $id)
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->join('products', 'products.id', 'product_pay.product_id')
            ->select(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_pay.pay_qty as deliver_qty'
            )
            ->groupBy(
                'quoteexport.product_id',
                'quoteexport.product_code',
                'quoteexport.product_name',
                'quoteexport.product_unit',
                'quoteexport.price_export',
                'quoteexport.product_tax',
                'quoteexport.product_note',
                'quoteexport.product_total',
                'quoteexport.product_ratio',
                'quoteexport.price_import',
                'product_pay.pay_qty'
            )
            ->get();
        $serinumber = Serialnumber::leftJoin('pay_export', 'pay_export.detailexport_id', 'serialnumber.detailexport_id')
            ->where('pay_export.id', $id)
            ->select('*', 'serialnumber.id as idSeri')
            ->get();
        $bg = url('dist/img/logo-2050x480-1.png');
        $workspace = Workspace::where('id', Auth::user()->current_workspace)->first();
        $data = [
            'delivery' => $payExport,
            'product' => $product,
            'serinumber' => $serinumber,
            'date' => $payExport->ngayTT,
            'bg' => $bg,
            'workspace' => $workspace,
        ];
        $pdf = Pdf::loadView('pdf.delivery', compact('data'))
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'dpi' => 100,
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'enable_remote' => false,

            ]);
        return $pdf->download('payExport.pdf');
    }
}
