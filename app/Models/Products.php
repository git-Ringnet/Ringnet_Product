<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'product_code',
        'product_name',
        'product_unit',
        'product_type',
        'product_manufacturer',
        'product_origin',
        'product_guarantee',
        'product_price_import',
        'product_price_export',
        'product_ratio',
        'product_tax',
        'product_inventory',
        'product_trade',
        'product_available',
        'warehouse_id',
        'check_seri',
        'workspace_id',
        'group_id',
        'type',
    ];
    public function getAllProducts()
    {
        $perpage = 10;
        return DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->orderBy('id', 'desc')
            ->get();
        // ->paginate($perpage);
        // return DB::table($this->table)->get();
    }
    public function getGroup()
    {
        return $this->hasOne(Groups::class, 'id', 'group_id');
    }

    public function getProductByWarehouse()
    {
        return $this->hasMany(ProductWarehouse::class, 'product_id', 'id');
    }

    public function getSerialNumber()
    {
        return $this->hasMany(Serialnumber::class, 'product_id', 'id')->where('workspace_id', Auth::user()->current_workspace);
    }
    public function getWarehouse()
    {
        return $this->hasMany(Warehouse::class, 'warehouse_id', 'id');
    }
    public function getDetail()
    {
        return $this->hasMany(QuoteImport::class, 'product_id', 'id');
    }
    public function getProductImport()
    {
        return $this->hasMany(ProductImport::class, 'product_id', 'id');
    }
    public function getDelivered($id)
    {
        return $this->hasMany(Delivered::class, 'id', 'product_id')->where('delivery_id', $id);
    }


    public function addProductDefault($data)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $checkProductName = DB::table($this->table)->where('product_name', $data['product_name'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if (!$checkProductName) {
                $product  = [
                    'product_code' => $data['product_code'][$i],
                    'product_name' => $data['product_name'][$i],
                    'product_unit' => $data['product_unit'][$i],
                    'product_price_import' => str_replace(',', '', $data['price_export'][$i]),
                    'product_tax' => $data['product_tax'][$i],
                    'check_seri' => 1,
                    'product_inventory' => 0,
                    'product_trade' => 0,
                    'product_available' => 0,
                    'workspace_id' => Auth::user()->current_workspace,
                    'type' => 1,
                    'category_id' => 0,
                    'group_id' => 0,
                    'created_at' => Carbon::now(),
                    'user_id' => Auth::user()->id
                ];
                $product_id =  DB::table($this->table)->insert($product);
            }
        }
    }



    public function addProduct($data)
    {
        // dd($data);
        $return  = 0;
        isset($data['check_seri']) ? $check = 1 : $check = 0;
        $checkProductName = DB::table($this->table)->where('product_name', $data['product_name'])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($checkProductName) {
            $return = 0;
        } else {
            $product = [
                'type' => $data['type_product'],
                'product_name' => $data['product_name'],
                'product_unit' => $data['product_unit'],
                'product_code' => $data['product_code'],
                'product_price_import' => isset($data['product_price_import']) ? str_replace(',', '', $data['product_price_import']) : 0,
                'product_price_export' => isset($data['product_price_export']) ? str_replace(',', '', $data['product_price_export']) : 0,
                'price_retail' => isset($data['price_retail']) ? str_replace(',', '', $data['price_retail']) : 0,
                'price_wholesale' => isset($data['price_wholesale']) ? str_replace(',', '', $data['price_wholesale']) : 0,
                'price_specialsale' => isset($data['price_specialsale']) ? str_replace(',', '', $data['price_specialsale']) : 0,
                'product_weight' =>  isset($data['product_weight']) ? str_replace(',', '', $data['product_weight']) : 0,
                'product_ratio' => isset($data['product_ratio']) ? $data['product_ratio'] : 0,
                'check_seri' => $data['type_product'] == 1 ? $check : 0,
                'group_id' => isset($data['category_id']) ? $data['category_id'] : 0,
                'product_inventory' => 0,
                'product_trade' => 0,
                'product_available' => 0,
                'workspace_id' => Auth::user()->current_workspace,
                'product_tax' => $data['product_tax'],
                'created_at' => Carbon::now(),
                'user_id' => Auth::user()->id
            ];
            if ($data['type_product'] == 1) {
                $product['product_type'] = $data['product_type'];
                $product['product_manufacturer'] = $data['product_manufacturer'];
                $product['product_origin'] = $data['product_origin'];
                $product['product_guarantee'] = $data['product_guarantee'];
            }

            $product_id =  DB::table($this->table)->insert($product);
            $return = 1;
        }
        return $return;
    }
    public function updateProduct($data, $id)
    {
        $return = 0;
        $product = Products::where('id', $id)->first();
        if ($product) {
            isset($data['check_seri']) ? $check = 1 : $check = 0;
            $dataUpdate = [
                'product_code' => $data['product_code'],
                'product_name' => $data['product_name'],
                'product_unit' => $data['product_unit'],
                'product_price_import' => isset($data['product_price_import']) ? str_replace(',', '', $data['product_price_import']) : 0,
                'product_price_export' => isset($data['product_price_export']) ? str_replace(',', '', $data['product_price_export']) : 0,
                'product_tax' => $data['product_tax'],
                'check_seri' => $data['type_product'] == 1 ? $check : 0,
                'group_id' => $data['group_id']
            ];

            if ($data['type_product'] == 1) {
                $dataUpdate['product_type'] = $data['product_type'];
                $dataUpdate['product_manufacturer'] = $data['product_manufacturer'];
                $dataUpdate['product_origin'] = $data['product_origin'];
                $dataUpdate['product_guarantee'] = $data['product_guarantee'];
                $dataUpdate['price_retail'] = isset($data['price_retail']) ? str_replace(',', '', $data['price_retail']) : 0;
                $dataUpdate['price_wholesale'] = isset($data['price_wholesale']) ? str_replace(',', '', $data['price_wholesale']) : 0;
                $dataUpdate['price_specialsale'] = isset($data['price_specialsale']) ? str_replace(',', '', $data['price_specialsale']) : 0;
                $dataUpdate['product_weight'] = isset($data['product_weight']) ? str_replace(',', '', $data['product_weight']) : 0;
            }

            $checkProductName = DB::table($this->table)
                ->where('id', '!=', $product->id)
                ->where('product_name', $data['product_name'])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkProductName) {
                $return = 0;
            } else {
                $updateProduct = DB::table($this->table)
                    ->where('id', $id)
                    ->update($dataUpdate);
                $return = 1;
            }
        }
        return $return;
    }
    public function addProductTowarehouse($data, $id)
    {
        $status = true;
        $receive = Receive_bill::where('id', $id)->first();
        if ($receive) {
            $array_id = [];
            $list_id = [];
            // Lấy hết sản phẩm theo đơn mua hàng
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $products = QuoteImport::where('product_name', $data['product_name'][$i]);
                $products = $products->where('receive_id', $receive->id);
                // if ($receive->detailimport_id == 0) {
                //     $products = $products->where('receive_id', $receive->id);
                // } else {
                //     $products = $products->where('detailimport_id', $receive->detailimport_id);
                // }
                $products = $products->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                array_push($array_id, $products->id); //4
            }
            $product = ProductImport::where('receive_id', $receive->id)
                ->whereIn('quoteImport_id', $array_id)
                ->where('workspace_id', Auth::user()->current_workspace)
                ->get();
            $product_id = 0;
            // Thêm sản phẩm vào tồn kho
            foreach ($product as $item) {
                $getProductName = QuoteImport::where('id', $item->quoteImport_id)->first();
                $checkProduct = Products::where('product_name', $getProductName->product_name)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($checkProduct) {
                    $checkProduct->product_inventory += $item->product_qty;
                    $checkProduct->check_seri = $item->cbSN;
                    $checkProduct->save();
                    $product_id = $checkProduct->id;
                } else {
                    $dataProduct = [
                        'product_code' => $getProductName->product_code,
                        'product_name' => $getProductName->product_name,
                        'product_unit' => $getProductName->product_unit,
                        'product_price_import' => $getProductName->price_import,
                        'product_price_export' => $getProductName->price_export,
                        'product_ratio' => $getProductName->product_ratio,
                        'product_tax' => $getProductName->product_tax,
                        'product_inventory' => $item->product_qty,
                        'check_seri' => $item->cbSN,
                        'workspace_id' => Auth::user()->current_workspace,
                        'user_id' => Auth::user()->id
                    ];
                    $product_id = DB::table($this->table)->insertGetId($dataProduct);
                }
                // Thêm sản phẩm vào tồn kho theo kho hàng
                $checkProductWarehouse = ProductWarehouse::where('product_id', $product_id)
                    ->where('warehouse_id', $getProductName->warehouse_id)
                    ->where('workspace_id', Auth::user()->current_workspace)->first();
                if ($checkProductWarehouse) {
                    $checkProductWarehouse->qty = $checkProductWarehouse->qty + $item->product_qty;
                    $checkProductWarehouse->save();
                } else {
                    $dataProductWarehouse = [
                        'product_id' => $product_id,
                        'warehouse_id' => $getProductName->warehouse_id,
                        'qty' => $item->product_qty,
                        'workspace_id' => Auth::user()->current_workspace,
                        'created_at' => Carbon::now(),
                    ];

                    DB::table('productwarehouse')->insertGetId($dataProductWarehouse);
                }



                array_push($list_id, $product_id);
                HistoryImport::where('quoteImport_id', $getProductName->id)->update([
                    'product_id' => $product_id
                ]);

                // Cập nhật id quoteImport
                QuoteImport::where('id', $item->quoteImport_id)->update([
                    'product_id' => $product_id
                ]);
                $item->product_id = $product_id;
                $item->save();
            }


            // Cập nhật serial number theo sản phẩm
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $getProduct = QuoteImport::where('product_name', $data['product_name'][$i]);
                // if ($receive->detailimport_id == 0) {
                //     $getProduct = $getProduct->where('receive_id', $receive->id);
                // } else {
                //     $getProduct = $getProduct->where('detailimport_id', $receive->detailimport_id);
                // }
                $getProduct = $getProduct->where('receive_id', $receive->id);
                $getProduct = $getProduct->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($getProduct) {
                    if (isset($data['seri' . $i])) {
                        $productSN = $data['seri' . $i];
                        for ($j = 0; $j < count($productSN); $j++) {
                            if (!empty($productSN[$j])) {
                                $getSN = Serialnumber::where('serinumber', $productSN[$j])
                                    ->where('receive_id', $receive->id)
                                    ->where('quoteImport_id', $getProduct->id)
                                    ->where('workspace_id', Auth::user()->current_workspace)
                                    ->get();
                                $dataSN = [
                                    'product_id' => $list_id[$i],
                                    'status' => 1,
                                ];
                                foreach ($getSN as $sn) {
                                    DB::table('serialnumber')->where('id', $sn->id)->update($dataSN);
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $status = false;
        }
        return $status;
    }
    public function ajax($data)
    {
        $products =  DB::table($this->table)->where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['search'])) {
            $products = $products->where(function ($query) use ($data) {
                $query->orWhere('product_code', 'like', '%' . $data['search'] . '%');
                $query->orWhere('product_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('product_unit', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['productCode']) && !empty($data['productCode'])) {
            $products = $products->where('product_code', 'like', '%' . $data['productCode'] . '%');
        }
        if (isset($data['productName']) && !empty($data['productName'])) {
            $products = $products->where('product_name', 'like', '%' . $data['productName'] . '%');
        }
        if (isset($data['unit']) && !empty($data['unit'])) {
            $products = $products->where('product_unit', 'like', '%' . $data['unit'] . '%');
        }
        if (isset($data['purchasePrice'][0]) && isset($data['purchasePrice'][1])) {
            $products = $products->where('product_price_import', $data['purchasePrice'][0], $data['purchasePrice'][1]);
        }
        if (isset($data['retailPrice'][0]) && isset($data['retailPrice'][1])) {
            $products = $products->where('price_retail', $data['retailPrice'][0], $data['retailPrice'][1]);
        }
        if (isset($data['wholesalePrice'][0]) && isset($data['wholesalePrice'][1])) {
            $products = $products->where('price_wholesale', $data['wholesalePrice'][0], $data['wholesalePrice'][1]);
        }
        if (isset($data['specialPrice'][0]) && isset($data['specialPrice'][1])) {
            $products = $products->where('price_specialsale', $data['specialPrice'][0], $data['specialPrice'][1]);
        }
        if (isset($data['weight'][0]) && isset($data['weight'][1])) {
            $products = $products->where('product_weight', $data['weight'][0], $data['weight'][1]);
        }
        if (isset($data['stockQuantity'][0]) && isset($data['stockQuantity'][1])) {
            $products = $products->where('product_inventory', $data['stockQuantity'][0], $data['stockQuantity'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $products = $products->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $products = $products->get();
        return $products;
    }
    public function getProductsbyCode($data)
    {
        $products = DB::table($this->table);
        if (isset($data)) {
            $products = $products->whereIn('products.id', $data);
        }
        $products = $products->pluck('product_code')->all();
        return $products;
    }
    public function getProductsbyName($data)
    {
        $products = DB::table($this->table);
        if (isset($data)) {
            $products = $products->whereIn('products.id', $data);
        }
        $products = $products->pluck('product_name')->all();
        return $products;
    }
    public function getProductUnit($data)
    {
        $products = DB::table($this->table);
        if (isset($data)) {
            $products = $products->whereIn('products.id', $data);
        }
        $products = $products->pluck('product_unit')->all();
        return $products;
    }

    public function checkProductTax($data)
    {
        $result = [];
        for ($i = 0; $i < count($data['listName']); $i++) {
            $checkProduct = DB::table($this->table)->where('product_name', $data['listName'][$i])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($checkProduct) {
                if ($checkProduct->product_tax != $data['listTax'][$i]) {
                    if ($checkProduct->type == 2) {
                        $result['type'] = true;
                        $result['status'] = false;
                        $result['msg'] = "Sản phẩm <b>" . $checkProduct->product_name . "</b> là loại dịch vụ";
                        break;
                    } else {
                        $result['product_name'] = $checkProduct->product_name;
                        $result['product_tax'] = $checkProduct->product_tax;
                        $result['status'] = false;
                        $result['msg'] = "Thuế nhập vào không trùng khớp với thuế của sản phẩm, thuế của sản phẩm " . $checkProduct->product_name . " là " . ($checkProduct->product_tax == 99 ? "NOVAT" : $checkProduct->product_tax . "%");
                        break;
                    }
                }
            }
        }
        return $result;
    }

    public function checkProductName($data)
    {
        $result = [];
        $check = DB::table($this->table)->where('product_name', $data['name'])
            ->where('workspace_id', Auth::user()->current_workspace);
        if (isset($data['action'])) {
            $check->where('id', '!=', $data['id']);
        }
        $check = $check->first();

        if ($check) {
            $result['status'] = false;
            $result['msg'] = "Sản phẩm " . "<b>" . $check->product_name . "</b>" . " đã tồn tại";
        } else {
            $result['status'] = true;
        }
        return $result;
    }
    public function ajaxEnventory($data)
    {

        $delivery = Delivered::leftJoin('products', 'products.id', '=', 'delivered.product_id')
            ->select(DB::raw('SUM(delivered.deliver_qty) as totalExportQty'), 'products.product_code', 'products.product_name', 'products.product_unit', 'delivered.product_id as product_id')
            ->groupBy('delivered.product_id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();

        $receive = ProductImport::leftJoin('products', 'products.id', '=', 'products_import.product_id')
            ->select(DB::raw('SUM(products_import.product_qty) as totalImportQty'), 'products.product_code', 'products.product_name', 'products.product_unit', 'products_import.product_id as product_id')
            ->groupBy('products_import.product_id', 'products.product_code', 'products.product_name', 'products.product_unit')
            ->get();
        $res = ProductImport::leftJoin('products', 'products.id', '=', 'products_import.product_id')
            ->leftJoin('delivered', 'delivered.product_id', '=', 'products.id') // Để tránh việc nhân bản dòng
            ->select(
                DB::raw('SUM(DISTINCT products_import.product_qty) as totalImportQty'),
                DB::raw('SUM(DISTINCT delivered.deliver_qty) as totalExportQty'), // SUM trên dữ liệu duy nhất
                DB::raw('SUM(products_import.product_qty) - IFNULL(SUM(delivered.deliver_qty), 0) as inventory'),
                'products.product_code',
                'products.product_name',
                'products.product_unit',
                'products_import.product_id as id'
            )
            ->groupBy('products_import.product_id', 'products.product_code', 'products.product_name', 'products.product_unit');
        // Áp dụng tìm kiếm nếu có
        if (isset($data['search'])) {
            $res = $res->where(function ($query) use ($data) {
                $query->orWhere('products.product_code', 'like', '%' . $data['search'] . '%')
                    ->orWhere('products.product_name', 'like', '%' . $data['search'] . '%');
            });
        }
        // Áp dụng bộ lọc nhập nếu có
        if (isset($data['import'][0]) && isset($data['import'][1])) {
            $res = $res->having('totalImportQty', $data['import'][0], $data['import'][1]);
        }
        // Áp dụng bộ lọc xuất nếu có
        if (isset($data['export'][0]) && isset($data['export'][1])) {
            $res = $res->having('totalExportQty', $data['export'][0], $data['export'][1]);
        }
        if (isset($data['debt'][0]) && isset($data['debt'][1])) {
            $res = $res->having('inventory', $data['debt'][0], $data['debt'][1]);
        }
        // Trả về kết quả
        return $res->get();
    }

    public function searchProductDetailE($data)
    {
        $detailExport = DetailExport::where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('*', 'detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.status as tinhTrang', 'detailexport.*')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')
            ->leftJoin('quoteexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where('quoteexport.product_id', $data['data'])
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id');
        if (isset($data['search'])) {
            $detailExport = $detailExport->where(function ($query) use ($data) {
                $query->orWhere('detailexport.quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['maphieuBanhang']) && !empty($data['maphieuBanhang'])) {
            $detailExport = $detailExport->where('detailexport.quotation_number', 'like', '%' . $data['maphieuBanhang'] . '%');
        }
        if (isset($data['sophieuBanhang']) && !empty($data['sophieuBanhang'])) {
            $detailExport = $detailExport->where('detailexport.reference_number', 'like', '%' . $data['sophieuBanhang'] . '%');
        }
        if (!empty($data['ngaylapBanhang'][0]) && !empty($data['ngaylapBanhang'][1])) {
            $dateStart = Carbon::parse($data['ngaylapBanhang'][0]);
            $dateEnd = Carbon::parse($data['ngaylapBanhang'][1])->endOfDay();
            $detailExport = $detailExport->whereBetween('detailexport.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['khachhangBanhang']) && !empty($data['khachhangBanhang'])) {
            $detailExport = $detailExport->where('guest.guest_name_display', 'like', '%' . $data['khachhangBanhang'] . '%');
        }
        if (isset($data['tongtienBanhang'][0]) && isset($data['tongtienBanhang'][1])) {
            $detailExport = $detailExport->whereRaw(
                'detailexport.total_tax + detailexport.total_price ' . $data['tongtienBanhang'][0] . ' ?',
                [$data['tongtienBanhang'][1]]
            );
        }
        if (isset($data['giaohangBanhang'])) {
            $detailExport = $detailExport->whereIn('detailexport.status_receive', $data['giaohangBanhang']);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $detailExport = $detailExport->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $detailExport = $detailExport->orderBy('detailexport.id', 'desc')->get();
        return $detailExport;
    }
    public function searchProductDetailI($data)
    {
        $import = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('quoteimport', 'detailimport.id', 'quoteimport.detailimport_id')
            ->where('quoteimport.product_id', $data['data'])
            ->select('detailimport.*', 'provides.provide_name_display');
        if (isset($data['search'])) {
            $import = $import->where(function ($query) use ($data) {
                $query->orWhere('detailimport.quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('provides.provide_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['maphieuDathang']) && !empty($data['maphieuDathang'])) {
            $import = $import->where('detailimport.quotation_number', 'like', '%' . $data['maphieuDathang'] . '%');
        }
        if (isset($data['sophieuDathang']) && !empty($data['sophieuDathang'])) {
            $import = $import->where('detailimport.reference_number', 'like', '%' . $data['sophieuDathang'] . '%');
        }
        if (!empty($data['ngaylapDathang'][0]) && !empty($data['ngaylapDathang'][1])) {
            $dateStart = Carbon::parse($data['ngaylapDathang'][0]);
            $dateEnd = Carbon::parse($data['ngaylapDathang'][1])->endOfDay();
            $import = $import->whereBetween('detailimport.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['khachhangDathang']) && !empty($data['khachhangDathang'])) {
            $import = $import->where('provides.provide_name_display', 'like', '%' . $data['khachhangDathang'] . '%');
        }
        if (isset($data['tongtienDathang'][0]) && isset($data['tongtienDathang'][1])) {
            $import = $import->where('detailimport.total_tax', $data['tongtienDathang'][0], $data['tongtienDathang'][1]);
        }
        if (isset($data['nhanhangDathang'])) {
            $import = $import->whereIn('detailimport.status_receive', $data['nhanhangDathang']);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $import = $import->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $import = $import->get();
        return $import;
    }
}
