<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Serialnumber extends Model
{
    use HasFactory;
    protected $table = 'serialnumber';
    protected $fillable = [
        'id',
        'serinumber',
        'receive_id',
        'quoteImport_id',
        'detailimport_id',
        'detailexport_id',
        'product_id',
        'status',
        'delivery_id', 'workspace_id', 'return_id'
    ];

    public function getQuotation()
    {
        return $this->hasOne(Delivery::class, 'id', 'delivery_id');
    }
    public function getDetailImport()
    {
        return $this->hasOne(DetailImport::class, 'id', 'detailimport_id');
    }
    public function getHistoryImport()
    {
        return $this->hasOne(HistoryImport::class, 'detailimport_id', 'detailImport_id')
            ->where('product_id', 'product_id')
            ->where('user_id', Auth::user()->id);
    }

    public function addSN($data, $receive_id, $detail_id, $list_id)
    {
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $getProduct = QuoteImport::where('product_name', $data['product_name'][$i]);
            if ($detail_id != "") {
                $product_import = ProductImport::where('id', $list_id[$i])->first();
                if ($product_import) {
                    $getProduct = $getProduct->where('id', $product_import->quoteImport_id);
                }
                // $getProduct = $getProduct->where('detailimport_id', $detail_id);
            } else {
                $getProduct = $getProduct->where('receive_id', $receive_id);
            }
            // ->where('id',$list_id[$i])
            $getProduct = $getProduct->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if ($getProduct) {
                if (isset($data['seri' . $i]) && $data['cbSeri'][$i] == 1) {
                    $productSN = $data['seri' . $i];
                    for ($j = 0; $j < count($productSN); $j++) {
                        if (!empty($productSN[$j])) {
                            $dataSN = [
                                'serinumber' => $productSN[$j],
                                'receive_id' => $receive_id,
                                'detailimport_id' => ($detail_id != "" ? $detail_id : 0),
                                'quoteImport_id' => $getProduct->id,
                                'detailexport_id' => 0,
                                'status' => 0,
                                'created_at' => Carbon::now(),
                                'workspace_id' => Auth::user()->current_workspace,
                                'user_id' => Auth::user()->id
                            ];
                            DB::table('serialnumber')->insert($dataSN);
                        }
                    }
                }
            }
        }
    }

    public function checkSN($data)
    {
        foreach ($data as $value) {
            foreach ($value as $product_name => $productName) {
                $product = Products::where('product_name', $product_name)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->first();
                if ($product) {
                    $checkSN = Serialnumber::where('workspace_id', Auth::user()->current_workspace)
                        ->get();
                    foreach ($productName['sn'] as $SN) {
                        foreach ($checkSN as $list) {
                            if ($list->serinumber == $SN) {
                                if ($list->product_id == null) {
                                    $checkProductName = QuoteImport::where('id', $list->quoteImport_id)
                                        ->where('detailimport_id', $list->detailimport_id)
                                        ->first();

                                    if ($checkProductName && $checkProductName->product_name == $product_name) {
                                        return response()->json(['success' => false, 'msg' => $product->product_name, 'data' => $SN, '1']);
                                    }
                                } elseif ($list->product_id == $product->id) {
                                    return response()->json(['success' => false, 'msg' => $product->product_name, 'data' => $SN, '2']);
                                }
                            }
                        }
                    }
                }
            }
        }
        return response()->json(['success' => true]);
    }
    function getProductIdsHistory($keywords)
    {
        if (!empty($keywords)) {
            $serinumber = Serialnumber::leftJoin('delivery', 'delivery.detailexport_id', 'serialnumber.detailexport_id')
                ->where('serialnumber.serinumber', 'like', '%' . $keywords . '%')
                ->select('*', 'serialnumber.id as idSeri')
                ->get();
            $product = [];

            foreach ($serinumber as $value) {
                $pair = [
                    'product_id' => $value->product_id,
                    'delivery_id' => $value->delivery_id,
                ];
                array_push($product, $pair);
            }
        }
        $deliveredIds = [];
        foreach ($product as $item) {
            $delivered = Delivered::where('product_id', $item['product_id'])
                ->where('delivery_id', $item['delivery_id'])
                ->pluck('id');
            if ($delivered->isNotEmpty()) {
                $deliveredIds = array_merge($deliveredIds, $delivered->toArray());
            }
        }
        return $deliveredIds;
    }
}
