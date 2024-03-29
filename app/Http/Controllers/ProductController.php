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
        $arrProductsName = [];
        $arrProductsCode = [];
        if ($request->ajax()) {
            $output = '';
            $products = $this->products->ajax($data);
            if (!empty($request->input('idName'))) {
                $arrProductsName = $this->products->getProductsbyName($data);
            }
            if (!empty($request->input('idCode'))) {
                $arrProductsCode = $this->products->getProductsbyCode($data);
            }
            if ($products) {
                foreach ($products as $key => $product) {
                    $url = route('inventory.edit', $product->id);
                    $output .= '<tr>
                    <td><input type="checkbox"></td>
                    <td>' . $product->product_code . '</td>
                    <td>' . $product->product_name . '</td>
                    <td>' . number_format($product->product_inventory) . '</td>
                    <td>' . '<a href="' . $url . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                    fill="#42526E"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                    fill="#42526E"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                    fill="#42526E">
                    </path>
                    </svg>
                    </a>' . '</td>
                    </tr>';
                }
            }
            return [
                'output' => $output,
                'code' => $arrProductsCode,
                'name' => $arrProductsName,
                'inventory' => [$request->input('inventory'), $request->input('inventory_op')],
            ];
        }
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
}
