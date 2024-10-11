<?php

namespace App\Http\Controllers;

use App\Models\ChangeWarehouse;
use App\Models\DetailExport;
use App\Models\DetailImport;
use App\Models\Groups;
use App\Models\HistoryImport;
use App\Models\ImportDB;
use App\Models\ProductImport;
use App\Models\Products;
use App\Models\Provides;
use App\Models\QuoteImport;
use App\Models\Serialnumber;
use App\Models\Warehouse;
use App\Models\Workspace;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\FuncCall;
use ZipArchive;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $products;
    private $provides;
    private $warehouse;
    private $workspaces;
    private $detailExport;
    public function __construct()
    {
        $this->products = new Products();
        $this->provides = new Provides();
        $this->warehouse = new Warehouse();
        $this->workspaces = new Workspace();
        $this->detailExport = new DetailExport();
    }

    public function index()
    {
        // $product = $this->products->getAllProducts();
        $title = "Hàng hóa";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        // Tất cả nhóm hàng hóa
        $groups = Groups::where('grouptype_id', 4)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        $product = Products::where('group_id', 0)
            ->where('workspace_id', Auth::user()->current_workspace)->get();
        return view('tables.products.products', compact('product', 'title', 'workspacename', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse = $this->warehouse->getAllWareHouse();
        $title = "Thêm sản phẩm";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $category = Groups::where('grouptype_id', 4)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
        return view('tables.products.insertProduct', compact('warehouse', 'title', 'workspacename', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = $this->products->addProduct($request->all());
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($add == 0) {
            $msg = redirect()->route('inventory.index', $workspacename)->with('warning', 'Sản phẩm đã tồn tại !');
        } else {
            $msg = redirect()->route('inventory.index', $workspacename)->with('msg', 'Thêm sản phẩm mới thành công !');
        }

        return $msg;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $workspace, string $id)
    {
        $display = 1;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = Products::findOrFail($id);
        if ($product) {
            $title = $product->product_name;
        }
        $history = ProductImport::where('product_id', $id)->where('workspace_id', Auth::user()->current_workspace);
        if (Auth::check() && Auth::user()->getRoleUser->roleid == 4) {
            $history->where('user_id', Auth::user()->id);
        }
        $history = $history->get();
        $quoteExport = $this->detailExport->getAllDetailExportByProduct($id);
        $import = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('quoteimport', 'detailimport.id', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_id', $id)
            ->select('detailimport.*', 'provides.provide_name_display')
            ->orderBy('detailimport.id', 'desc');
        $import = $import->get();
        return view('tables.products.showProduct', compact('product', 'title', 'display', 'history', 'workspacename', 'quoteExport', 'import'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $workspace, string $id)
    {
        $display = 1;
        $product = Products::findOrFail($id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($product) {
            $title = $product->product_name;
        }
        $category = Groups::where('grouptype_id', 4)->get();
        return view('tables.products.editProduct', compact('product', 'title', 'display', 'workspacename', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $workspace, Request $request, string $id)
    {
        $data = $this->products->updateProduct($request->all(), $id);
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        if ($data == 1) {
            return redirect()->route('inventory.index', $workspacename)->with('msg', 'Chỉnh sửa sản phẩm thành công !');
        } else {
            return redirect()->route('inventory.index', $workspacename)->with('warning', 'Chỉnh sửa sản phẩm thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function editProduct()
    {
        $title = "Sửa tồn kho";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = $this->products->getAllProducts();
        return view('tables.products.editInventory', compact('product', 'title', 'workspacename'));
    }

    public function showProductInventory($id)
    {
        $display = 2;
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        $product = Products::findOrFail($id);
        if ($product) {
            $title = $product->product_name;
        }
        return view('tables.products.editProduct', compact('product', 'title', 'display', 'workspacename'));
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['productCode']) && $data['productCode'] !== null) {
            $filters[] = ['value' => 'Mã hàng hoá: ' . $data['productCode'], 'name' => 'ma', 'icon' => 'status'];
        }
        if (isset($data['productName']) && $data['productName'] !== null) {
            $filters[] = ['value' => 'Tên hàng hoá: ' . $data['productName'], 'name' => 'tenhang', 'icon' => 'name'];
        }
        if (isset($data['unit']) && $data['unit'] !== null) {
            $filters[] = ['value' => 'Đơn vị tính: ' . $data['unit'], 'name' => 'dvt', 'icon' => 'unit'];
        }
        if (isset($data['purchasePrice'][0]) && isset($data['purchasePrice'][1])) {
            $filters[] = ['value' => 'Giá nhập: ' . $data['purchasePrice'][0] . ' - ' . $data['purchasePrice'][1], 'name' => 'gianhap', 'icon' => 'money'];
        }
        if (isset($data['retailPrice'][0]) && isset($data['retailPrice'][1])) {
            $filters[] = ['value' => 'Giá bán lẻ: ' . $data['retailPrice'][0] . ' - ' . $data['retailPrice'][1], 'name' => 'giabanle', 'icon' => 'money'];
        }
        if (isset($data['wholesalePrice'][0]) && isset($data['wholesalePrice'][1])) {
            $filters[] = ['value' => 'Giá bán sỉ: ' . $data['wholesalePrice'][0] . ' - ' . $data['wholesalePrice'][1], 'name' => 'giabansi', 'icon' => 'money'];
        }
        if (isset($data['specialPrice'][0]) && isset($data['specialPrice'][1])) {
            $filters[] = ['value' => 'Giá đặc biệt: ' . $data['specialPrice'][0] . ' - ' . $data['specialPrice'][1], 'name' => 'giadacbiet', 'icon' => 'money'];
        }
        if (isset($data['weight'][0]) && isset($data['weight'][1])) {
            $filters[] = ['value' => 'Trọng lượng: ' . $data['weight'][0] . ' - ' . $data['weight'][1], 'name' => 'trongluong', 'icon' => 'money'];
        }
        if (isset($data['stockQuantity']) && $data['stockQuantity'][1] !== null) {
            $filters[] = ['value' => 'Số lượng tồn: ' . $data['stockQuantity'][0] . ' - ' . $data['stockQuantity'][1], 'name' => 'soluongton', 'icon' => 'sl'];
        }

        if ($request->ajax()) {
            $products = $this->products->ajax($data);
            return response()->json([
                'data' => $products,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    public function getProductSeri(Request $request)
    {
        $data = $request->all();
        $serinumber = Serialnumber::where('product_id', $data['productId'])
            ->where('status', 1)
            ->where('detailexport_id', 0)
            ->get();
        return response()->json($serinumber);
    }
    public function getProductSeribyIdDilivery(Request $request)
    {
        $data = $request->all();
        $serinumber = Serialnumber::where('product_id', $data['productId'])
            ->where('status', 2)
            ->where('delivery_id', $data['delivery_id'])
            ->get();
        // dd($serinumber);
        return response()->json($serinumber);
    }

    public function getProductSeriEdit(Request $request)
    {
        $data = $request->all();
        $serinumber = Serialnumber::where('product_id', $data['productId'])
            ->get();
        return response()->json($serinumber);
    }
    // Backup DATABASE
    public function exportDatabase()
    {
        $dbUsername = 'root';
        $dbName = 'laravel';
        $dbPass = ''; // If you have a password, provide it here.

        // Sử dụng lệnh mysqldump để xuất cơ sở dữ liệu
        $passwordOption = $dbPass !== '' ? "-p$dbPass" : "";

        // Lấy ngày giờ hiện tại của hệ thống máy tính
        $date = date('d_m_Y_H_i_s');

        // Thực hiện mysqldump để tạo file SQL và lưu vào thư mục tạm thời
        $fileName = "backup_$date.sql";
        $command = "mysqldump -u $dbUsername $passwordOption $dbName > $fileName";
        exec($command);

        // Trả về tệp đã được backup và thiết lập header để tải về
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        Excel::import(new ImportDB(), $request->file('file'));

        return redirect()->back()->with('success', 'Dữ liệu đã được import thành công.');
    }

    // Restore DATABASE
    public function importDatabase(Request $request)
    {
        $getFile = $request->file('file');
        $name = $getFile->getClientOriginalName();
        $fullPath = storage_path('backup');
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        // Lưu file vào thư mục backup
        $getFile->move($fullPath, $name);

        $dbUsername = 'root';
        $dbName = 'laravel';
        $dbPass = '';
        $passwordOption = $dbPass !== '' ? "-p$dbPass" : "";

        $command = "mysql -u $dbUsername $passwordOption $dbName < \"$fullPath/$name\"";
        exec($command);

        // Import xong, tiến hành xóa file
        $filePath = "$fullPath/$name";
        if (file_exists($filePath)) {
            unlink($filePath); // Xóa file
        }

        return redirect()->back()->with('msg', 'Restore dữ liệu thành công !');
    }

    public function checkProductTax(Request $request)
    {
        $data = $this->products->checkProductTax($request->all());
        return $data;
    }

    public function checkProductName(Request $request)
    {
        $data = $this->products->checkProductName($request->all());
        return $data;
    }
    // Đặt hàng
    public function searchProductDetailI(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['maphieuDathang']) && $data['maphieuDathang'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['maphieuDathang'], 'name' => 'maphieu-dathang', 'icon' => 'code'];
        }
        if (isset($data['sophieuDathang']) && $data['sophieuDathang'] !== null) {
            $filters[] = ['value' => 'Số phiếu: ' . $data['sophieuDathang'], 'name' => 'sophieu-dathang', 'icon' => 'number'];
        }
        if (isset($data['ngaylapDathang']) && $data['ngaylapDathang'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['ngaylapDathang'][0]));
            $date_end = date("d/m/Y", strtotime($data['ngaylapDathang'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date', 'icon' => 'date'];
        }
        if (isset($data['khachhangDathang']) && $data['khachhangDathang'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['khachhangDathang'], 'name' => 'khachhang-dathang', 'icon' => 'customer'];
        }

        $statusTextPay = '';
        if (isset($data['nhanhangDathang']) && $data['nhanhangDathang'] !== null) {
            $statusValues = [];
            if (in_array(0, $data['nhanhangDathang'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa nhận</span>';
            }
            if (in_array(1, $data['nhanhangDathang'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            if (in_array(2, $data['nhanhangDathang'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã nhận</span>';
            }
            $statusTextPay = implode(', ', $statusValues);
            $filters[] = ['value' => 'Giao hàng: ' . $statusTextPay, 'name' => 'nhanhang-dathang'];
        }

        // Lọc theo tổng tiền
        if (isset($data['tongtienDathang']) && $data['tongtienDathang'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['tongtienDathang'][0] . ' ' . $data['tongtienDathang'][1], 'name' => 'tongtien-dathang', 'icon' => 'money-bill'];
        }
        if ($request->ajax()) {
            $products = $this->products->searchProductDetailI($data);
            return response()->json([
                'data' => $products,
                'filters' => $filters,
            ]);
        }
        return false;
    }
    // Bán hàng
    public function searchProductDetailE(Request $request)
    {
        $data = $request->all();
        $filters = [];
        if (isset($data['maphieuBanhang']) && $data['maphieuBanhang'] !== null) {
            $filters[] = ['value' => 'Mã phiếu: ' . $data['maphieuBanhang'], 'name' => 'maphieu-banhang', 'icon' => 'code'];
        }

        if (isset($data['sophieuBanhang']) && $data['sophieuBanhang'] !== null) {
            $filters[] = ['value' => 'Số phiếu: ' . $data['sophieuBanhang'], 'name' => 'sophieu-banhang', 'icon' => 'number'];
        }

        if (isset($data['ngaylapBanhang']) && $data['ngaylapBanhang'][1] !== null) {
            $date_start = date("d/m/Y", strtotime($data['ngaylapBanhang'][0]));
            $date_end = date("d/m/Y", strtotime($data['ngaylapBanhang'][1]));
            $filters[] = ['value' => 'Ngày: từ ' . $date_start . ' đến ' . $date_end, 'name' => 'date2', 'icon' => 'date'];
        }

        if (isset($data['khachhangBanhang']) && $data['khachhangBanhang'] !== null) {
            $filters[] = ['value' => 'Khách hàng: ' . $data['khachhangBanhang'], 'name' => 'khachhang-banhang', 'icon' => 'customer'];
        }
        $statusTextPay = '';
        if (isset($data['giaohangBanhang']) && $data['giaohangBanhang'] !== null) {
            $statusValues = [];
            if (in_array(1, $data['giaohangBanhang'])) {
                $statusValues[] = '<span style="color: #858585;">Chưa giao</span>';
            }
            if (in_array(3, $data['giaohangBanhang'])) {
                $statusValues[] = '<span style="color: #E8B600;">Một phần</span>';
            }
            if (in_array(2, $data['giaohangBanhang'])) {
                $statusValues[] = '<span style="color: #08AA36BF;">Đã giao</span>';
            }
            $statusTextPay = implode(', ', $statusValues);
            $filters[] = ['value' => 'Giao hàng: ' . $statusTextPay, 'name' => 'giaohang-banhang'];
        }

        // Lọc theo tổng tiền
        if (isset($data['tongtienBanhang']) && $data['tongtienBanhang'][1] !== null) {
            $filters[] = ['value' => 'Tổng tiền: ' . $data['tongtienBanhang'][0] . ' ' . $data['tongtienBanhang'][1], 'name' => 'tongtien-banhang', 'icon' => 'money-bill'];
        }

        if ($request->ajax()) {
            $products = $this->products->searchProductDetailE($data);
            return response()->json([
                'data' => $products,
                'filters' => $filters,
            ]);
        }
        return false;
    }
}
