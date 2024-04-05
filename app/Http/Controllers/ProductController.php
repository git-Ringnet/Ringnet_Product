<?php

namespace App\Http\Controllers;

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
    public function __construct()
    {
        $this->products = new Products();
        $this->provides = new Provides();
        $this->warehouse = new Warehouse();
        $this->workspaces = new Workspace();
    }

    public function index()
    {
        $product = $this->products->getAllProducts();
        $title = "Kho 1";
        $workspacename = $this->workspaces->getNameWorkspace(Auth::user()->current_workspace);
        $workspacename = $workspacename->workspace_name;
        return view('tables.products.products', compact('product', 'title', 'workspacename'));
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
        return view('tables.products.insertProduct', compact('warehouse', 'title', 'workspacename'));
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
        $history = ProductImport::where('product_id', $id)->get();
        return view('tables.products.showProduct', compact('product', 'title', 'display', 'history', 'workspacename'));
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
        return view('tables.products.editProduct', compact('product', 'title', 'display', 'workspacename'));
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
        if ($request->ajax()) {
            $products = $this->products->ajax($data);
            return response()->json([
                'products' => $products,
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
        // dd($request->file('file'));
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

    public function checkProductTax(Request $request)  {
        $data = $this->products->checkProductTax($request->all());
        return $data;
    }

    public function checkProductName(Request $request){
        $data = $this->products->checkProductName($request->all());
        return $data;
    }
}
