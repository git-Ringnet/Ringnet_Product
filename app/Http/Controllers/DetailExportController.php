<?php

namespace App\Http\Controllers;

use App\Models\BillSale;
use App\Models\Delivered;
use App\Models\Delivery;
use App\Models\DetailExport;
use App\Models\Guest;
use App\Models\productBill;
use App\Models\ProductCode;
use App\Models\Products;
use App\Models\Project;
use App\Models\QuoteExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $detailExport;
    private $guest;
    private $quoteExport;
    private $project;
    private $product;
    private $delivery;
    private $delivered;
    private $billSale;
    private $productBill;

    public function __construct()
    {
        $this->detailExport = new DetailExport();
        $this->guest = new Guest();
        $this->quoteExport = new QuoteExport();
        $this->product = new Products();
        $this->project = new Project();
        $this->delivered = new Delivered();
        $this->delivery = new Delivery();
        $this->billSale = new BillSale();
        $this->productBill = new productBill();
    }
    public function index()
    {
        $title = "Báo giá";
        $quoteExport = $this->detailExport->getAllDetailExport();
        return view('tables.export.quote.list-quote', compact('title', 'quoteExport'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo báo giá";
        $guest = $this->guest->getAllGuest();
        // $product_code = $this->product_code->getAllProductCode();
        $project = $this->project->getAllProject();
        $product = $this->product->getAllProducts();
        return view('tables.export.quote.create-quote', compact('title', 'guest', 'product', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $export_id = $this->detailExport->addExport($request->all());
        $this->quoteExport->addQuoteExport($request->all(), $export_id);
        return redirect()->route('detailExport.index')->with('msg', ' Tạo mới đơn báo giá thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function seeInfo(string $id)
    {
        $title = 'Chỉnh sửa đơn báo giá';
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        $quoteExport = $this->detailExport->getProductToId($id);
        return view('tables.export.quote.see-quote', compact('title', 'guest', 'product', 'detailExport', 'quoteExport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Chỉnh sửa đơn báo giá';
        $guest = $this->guest->getAllGuest();
        $product = $this->product->getAllProducts();
        $detailExport = $this->detailExport->getDetailExportToId($id);
        $quoteExport = $this->detailExport->getProductToId($id);
        return view('tables.export.quote.edit-quote', compact('title', 'guest', 'product', 'detailExport', 'quoteExport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->action == "action_1") {
            $export_id = $this->detailExport->updateExport($request->all(), $id);
            $this->quoteExport->updateQuoteExport($request->all(), $export_id);
            return redirect()->route('detailExport.index')->with('msg', 'Cập nhật đơn báo giá thành công!');
        }
        if ($request->action == "action_2") {
            $delivery_id = $this->delivery->addDelivery($request->all());
            $this->delivered->addDelivered($request->all(), $delivery_id);
            return redirect()->route('watchDelivery', ['id' => $delivery_id])->with('msg', ' Tạo mới đơn giao hàng thành công!');
        }
        if ($request->action == "action_3") {
            $billSale_id = $this->billSale->addBillSale($request->all());
            $this->productBill->addProductBill($request->all(), $billSale_id);
            return redirect()->route('billSale.edit', ['billSale' => $billSale_id])->with('msg', ' Tạo mới hóa đơn bán hàng thành công!');
        }
        if ($request->action == "action_4") {
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    //Tìm kiếm khách hàng
    public function searchGuest(Request $request)
    {
        $data = $request->all();
        $guest = Guest::where('id', $data['idGuest'])->first();
        return $guest;
    }
    //Tìm kiếm project
    public function searchProject(Request $request)
    {
        $data = $request->all();
        $project = Project::where('id', $data['idProject'])->first();
        return $project;
    }
    //Thêm khách hàng
    public function addGuest(Request $request)
    {
        $check = Guest::where('guest_code', $request->guest_code)->first();
        if ($check == null) {
            $data = [
                'guest_name_display' => $request->guest_name_display,
                'guest_name' => $request->guest_name,
                'guest_address' => $request->guest_address,
                'guest_code' => $request->guest_code,
                'guest_email' => $request->guest_email,
                'guest_phone' => $request->guest_phone,
                'guest_receiver' => $request->guest_receiver,
                'guest_email_personal' => $request->guest_email_personal,
                'guest_phone_receiver' => $request->guest_phone_receiver,
                'guest_debt' => 0,
                'guest_note' => $request->guest_note,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $new_guest = DB::table('guest')->insertGetId($data);
            $msg = response()->json(['success' => true, 'msg' => 'Thêm mới khách hàng thành công', 'id' => $new_guest, 'guest_name_display' => $request->guest_name_display]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế đã tồn tại']);
        }
        return $msg;
    }
    //Lấy thông tin sản phẩm
    public function getProduct(Request $request)
    {
        $data = $request->all();
        $product = Products::where('id', $data['idProduct'])->first();
        return $product;
    }
    //Lấy mã sản phẩm
    public function getProductCode(Request $request)
    {
        $data = $request->all();
        $productCode = ProductCode::where('id', $data['idCode'])->first();
        return $productCode;
    }
}
