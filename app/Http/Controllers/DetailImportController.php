<?php

namespace App\Http\Controllers;

use App\Models\DetailImport;
use App\Models\ProductCode;
use App\Models\Products;
use App\Models\Project;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\Receive_bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailImportController extends Controller
{
    private $import;
    private $provide;
    private $quoteImport;
    private $receiver_bill;
    private $product;
    public function __construct()
    {
        $this->import = new DetailImport();
        $this->provide = new Provides();
        $this->quoteImport = new QuoteImport();
        $this->receiver_bill = new Receive_bill();
        $this->product = new Products();
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
        $import_id = $this->import->addImport($request->all());
        $this->quoteImport->addQuoteImport($request->all(), $import_id);
        return redirect()->route('import.index')->with('msg', ' Tạo mới đơn nhập hàng thành công !');
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
    public function edit(string $id)
    {
        $import = DetailImport::findOrFail($id);
        $provides = Provides::all();
        $title = $import->quotation_number;
        $product = QuoteImport::where('detailimport_id', $import->id)->get();
        $project = Project::all();
        return view('tables.import.editImport', compact('import', 'title', 'provides', 'product', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = "";
        if ($request->action == 'action_1') {
            $this->import->updateImport($request->all(), $id, 1);
            $this->quoteImport->updateImport($request->all(), $id, '');
            return redirect()->route('import.index')->with('msg', 'Chỉnh sửa đơn mua hàng thành công !');
        } else if ($request->action == 'action_2') {
            // Cập nhập sản phẩm theo receive
            $receive_id = $this->receiver_bill->addReceiveBill($request->all(), $id);

            // cập nhật sản phẩm
            $this->quoteImport->updateImport($request->all(), $id, $receive_id);
            // Cập nhật tình trạng
            $this->import->updateImport($request->all(), $id, 2);

            // Thêm sản phẩm vào kho hàng
            $this->product->addProductTowarehouse($request->all(),$id);
            return redirect()->route('import.index')->with('msg', 'Tạo đơn nhận hàng thành công !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
}
