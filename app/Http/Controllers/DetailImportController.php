<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DetailImport;
use App\Models\HistoryImport;
use App\Models\HistoryPaymentOrder;
use App\Models\PayOder;
use App\Models\ProductCode;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\Project;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use App\Models\Reciept;
use App\Models\Serialnumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailImportController extends Controller
{
    private $detailImport;
    private $sn;
    private $provide;
    private $quoteImport;
    private $receiver_bill;
    private $product;
    private $productImport;
    private $reciept;
    private $payment;
    private $history_import;
    private $historyPayment;
    private $attachment;
    public function __construct()
    {
        $this->detailImport = new DetailImport();
        $this->provide = new Provides();
        $this->quoteImport = new QuoteImport();
        $this->receiver_bill = new Receive_bill();
        $this->product = new Products();
        $this->sn = new Serialnumber();
        $this->productImport = new ProductImport();
        $this->reciept = new Reciept();
        $this->payment = new PayOder();
        $this->history_import = new HistoryImport();
        $this->historyPayment = new HistoryPaymentOrder();
        $this->attachment = new Attachment();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Đơn mua hàng';
        $import = DetailImport::all();
        // $import = $this->import->getAllImport();
        return view('tables.import.import', compact('title', 'import'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tạo đơn mua hàng";
        $provides = Provides::all();
        $project = Project::all();
        // $products = Products::all();
        return view('tables.import.insertImport', compact('title', 'provides', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Thêm thông tin đơn hàng
        $import_id = $this->detailImport->addImport($request->all());
        // Thêm sản phẩm theo đơn hàng, thêm vào lịch sử
        $this->quoteImport->addQuoteImport($request->all(), $import_id);
        return redirect()->route('import.index')->with('msg', ' Tạo mới đơn nhập hàng thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $import = DetailImport::findOrFail($id);
        $provides = Provides::all();
        $title = $import->quotation_number;
        $product = QuoteImport::where('detailimport_id', $import->id)->get();
        $project = Project::all();
        $history = HistoryImport::where('detailImport_id', $id)->get();
        return view('tables.import.showImport', compact('import', 'title', 'provides', 'product', 'project', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $import = DetailImport::findOrFail($id);
        $provides = Provides::all();
        $title = $import->quotation_number;
        $product = QuoteImport::where('detailimport_id', $import->id)->get();
        $project = Project::all();
        $history = HistoryImport::where('detailImport_id', $id)->get();
        return view('tables.import.editImport', compact('import', 'title', 'provides', 'product', 'project', 'history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = "";
        if ($request->action == 'action_1') {
            // Cập nhật thông tin đơn hàng
            $this->detailImport->updateImport($request->all(), $id, 1);
            // Cập nhật sản phẩm
            $this->quoteImport->updateImport($request->all(), $id);
            // Lưu lịch sử
            $this->history_import->addHistoryImport($request->all(), $id);
            return redirect()->route('import.index')->with('msg', 'Chỉnh sửa đơn mua hàng thành công !');
        } else if ($request->action == 'action_2') {
            // Cập nhật tình trạng
            $check = $this->detailImport->updateImport($request->all(), $id, 2);
            if ($check == true) {
                // cập nhật sản phẩm
                $this->quoteImport->updateImport($request->all(), $id);

                // Tạo sản phẩm theo từng đơn
                $this->productImport->addProductImport($request->all(), $id, 'receive_id', 'receive_qty');

                // Cập nhập sản phẩm theo receive
                $receive_id = $this->receiver_bill->addReceiveBill($request->all(), $id);

                return redirect()->route('import.index')->with('msg', 'Tạo đơn nhận hàng thành công !');
            } else {
                return redirect()->route('import.index')->with('warning', 'Đã tạo hết đơn nhận hàng !');
            }
        } elseif ($request->action == "action_3") {
            $check = $this->detailImport->updateImport($request->all(), $id, 2);
            if ($check) {
                // cập nhật sản phẩm
                $this->quoteImport->updateImport($request->all(), $id);

                // Tạo sản phẩm theo từng đơn
                $this->productImport->addProductImport($request->all(), $id, 'reciept_id', 'reciept_qty');

                // Cập nhật sản phẩm theo reciept
                $this->reciept->addReciept($request->all(), $id);
                return redirect()->route('import.index')->with('msg', 'Tạo hóa đơn mua hàng thành công !');
            } else {
                return redirect()->route('import.index')->with('warning', 'Hóa đơn đã được tạo hết !');
            }
        } else {
            $check = $this->detailImport->updateImport($request->all(), $id, 2);
            if ($check) {
                // cập nhật sản phẩm
                $this->quoteImport->updateImport($request->all(), $id);

                // Tạo sản phẩm theo từng đơn
                $this->productImport->addProductImport($request->all(), $id, 'payOrder_id', 'payment_qty');

                // Cập nhật sản phẩm theo payment
                $payment = $this->payment->addNewPayment($request->all(), $id);
                if ($payment) {
                    $this->historyPayment->addHistoryPayment($request->all(), $payment);
                }
                return redirect()->route('import.index')->with('msg', 'Tạo hóa đơn thanh toán thành công !');
            } else {
                return redirect()->route('import.index')->with('warning', 'Hóa đơn thanh toán đã được tạo hết !');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->detailImport->deleteDetail($id);
    }
    // Hiển thị thông tin nhà cung cấp theo id đã chọn
    public function show_provide(Request $request)
    {
        $data = $request->all();
        $provide = Provides::findOrFail($data['provides_id']);
        return $provide;
    }
    // Thêm mới nhà cung cấp
    public function addNewProvide(Request $request)
    {
        $check = Provides::where('provide_code', $request->provide_code)->first();
        if ($check == null) {
            $data = [
                'provide_name_display' => $request->provide_name_display,
                'provide_name' => $request->provide_name,
                'provide_address' => $request->provide_address,
                'provide_code' => $request->provide_code,
                'provide_represent' => $request->provide_represent,
                'provide_email' => $request->provide_email,
                'provide_phone' => $request->provide_phone,
                'provide_debt' => 0,
                'provide_address_delivery' => $request->provide_address_delivery
            ];
            $new_provide = DB::table('provides')->insertGetId($data);
            $provide = Provides::findOrFail($new_provide);
            $msg = response()->json(['success' => true, 'msg' => 'Thêm mới nhà cung cấp thành công', 'id' => $new_provide, 'name' => $provide->provide_name_display]);
        } else {
            $msg = response()->json(['success' => false, 'msg' => 'Mã số thuế đã tồn tại']);
        }
        return $msg;
    }

    // Hiển thị tất cả Mã sản phẩm
    public function getAllProducts()
    {
        $data = ProductCode::all();
        return $data;
    }
    // Hiển thị tên sản phẩm theo id đã chọn
    public function showProductName()
    {
        return Products::all();
    }
    // Hiển thị thông tin Dự án
    function show_project(Request $request)
    {
        $data = $request->all();
        $project = Project::findOrFail($data['project_id']);
        return $project;
    }

    public function checkSN(Request $request)
    {
        $data = $request->all();
        $result = [];
        $status = "success";
        $productName = "123";
        for ($i = 0; $i < count($data['listProductName']); $i++) {
            $check = Products::where('product_name', $data['listProductName'][$i])->first();
            if ($check && $check->check_seri == 1 && $data['checkSN'][$i] == 1) {
                if ($data['listQty'][$i] != $data['listSN'][$i]) {
                    $status = "false";
                    $productName = $check->product_name;
                }
            }
            if (!$check) {
                if ($data['listQty'][$i] != $data['listSN'][$i] && $data['checkSN'][$i] == 1) {
                    $status = "false";
                    $productName = $data['listProductName'][$i];
                }
            }
        }
        $result = [
            'status' => $status,
            'productName' => $productName,
        ];
        return $result;
    }
    public function checkduplicateSN(Request $request)
    {
        return $this->sn->checkSN($request->all());
    }
    public function addAttachment(Request $request)
    {
        $this->attachment->addAttachment($request->all(), $request->detail_id, 'DMH');
        return redirect()->back()->with('msg', 'Thêm file thành công !');
    }
}
