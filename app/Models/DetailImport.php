<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailImport extends Model
{
    use HasFactory;
    protected $table = 'detailimport';
    protected $fillable = [
        'provide_id',
        'project_id',
        'product_id',
        'user_id',
        'quotation_number',
        'reference_number',
        'price_effect',
        'status',
        'status_receive',
        'status_reciept',
        'status_pay',
        'warehouse_id',
        'total_tax',
        'discount',
        'transfer_fee',
        'terms_pay'
    ];
    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getProjectName()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function getAllImport()
    {
        return DB::table($this->table)->get();
    }
    public function addImport($data)
    {
        $total = 0;
        $total_tax = 0;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $product_ratio = 0;
            $price_import = 0;
            $price_export = 0;
            isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
            isset($data['price_import']) ? $price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
            if ($product_ratio > 0 && $price_import > 0) {
                $price_export = (($product_ratio + 100) * $price_import) / 100;
                $total += $price_export * str_replace(',', '', $data['product_qty'][$i]);
            } else {
                $price_export = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);
                $total += $price_export;
            }
            $total_tax += $data['product_tax'][$i] * $total;
        }
        $dataImport = [
            'provide_id' => $data['provides_id'],
            'project_id' => $data['project_id'],
            'user_id' => 1,
            'quotation_number' => $data['quotation_number'],
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => 1,
            'warehouse_id' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $total,
            'total_tax' => $total_tax,
            'discount' =>   isset($data['discount']) ? str_replace(',', '', $data['discount']) : 0,
            'transfer_fee' =>  isset($data['transport_fee']) ? str_replace(',', '', $data['transport_fee']) : 0,
            'status_receive' => 0,
            'status_reciept' => 0,
            'status_pay' => 0,
            'terms_pay' => $data['terms_pay']
        ];
        $result = DB::table($this->table)->insertGetId($dataImport);
        return  $result;
    }

    public function updateImport($data, $id, $status)
    {
        $total = 0;
        $total_tax = 0;
        $status_receive = 0;
        $check_status = true;
        if ($data['action'] == "action_1") {
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $product_ratio = 0;
                $price_import = 0;
                $price_export = 0;
                isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
                isset($data['price_import']) ? $$price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
                if ($product_ratio > 0 && $price_import > 0) {
                    $price_export = (($product_ratio + 100) * $price_import) / 100;
                    $total += $price_export * str_replace(',', '', $data['product_qty'][$i]);
                } else {
                    $price_export = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);
                    $total += $price_export;
                }
                $total_tax += $data['product_tax'][$i] * $total;
            }
        } else {
            // dd(DetailImport::findOrFail($id)->provide_id);
            $product = QuoteImport::where('detailimport_id', $id)->get();
            foreach ($product as $item) {
                if ($item->product_ratio > 0 && $item->price_import) {
                    $total += (($item->product_ratio + 100) * $item->price_import / 100) * $item->product_qty;
                } else {
                    $total += $item->product_qty * $item->price_export;
                }
                $total_tax += $item->product_tax * $total;
                if ($item->receive_id == 0) {
                    $check_status = false;
                }
            }
            if ($check_status) {
                $status_receive = 2;
            } else {
                $status_receive = 1;
            }
            DB::table('provides')->where('id',DetailImport::findOrFail($id)->provide_id)->update([
                'provide_debt' => $total,
            ]);
        }
      
        $dataImport = [
            'provide_id' => $data['provides_id'],
            'project_id' => $data['project_id'],
            'user_id' => 1,
            'quotation_number' => $data['quotation_number'],
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => $status,
            'warehouse_id' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $total,
            'total_tax' => $total_tax,
            'discount' =>   isset($data['discount']) ? str_replace(',', '', $data['discount']) : 0,
            'transfer_fee' =>  isset($data['transport_fee']) ? str_replace(',', '', $data['transport_fee']) : 0,
            'status_receive' => $status_receive,
            'terms_pay' => $data['terms_pay']
        ];
        $result = DB::table($this->table)->where('id', $id)->update($dataImport);
        return $result;
    }

}
