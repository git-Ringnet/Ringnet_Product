<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'project_id',
        'product_id',
        'user_id',
        'quotation_number',
        'represent_id',
        'reference_number',
        'price_effect',
        'status',
        'status_receive',
        'status_reciept',
        'status_pay',
        'workspace_id',
        'total_price',
        'terms_pay',
        'total_tax',
        'discount',
        'transfer_fee',
        'amount_owed',
        'goods',
        'delivery',
        'location',
        'created_at',
        'updated_at'
    ];
    protected $table = 'detailexport';

    public function getAllDetailExport()
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('*', 'detailexport.id as maBG', 'detailexport.created_at as ngayBG')
            ->orderBy('detailexport.id', 'desc')->paginate(10);
        return $detailExport;
    }
    public function addExport($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            $subtotal = $data['product_qty'][$i] * (float) $price;
            $subTax = ($subtotal * $data['product_tax'][$i]) / 100;
            $totalBeforeTax += $subtotal;
            $totalTax += $subTax;
        }
        $dataExport = [
            'guest_id' => $data['guest_id'],
            'project_id' => !empty($data['project_id']) ? $data['project_id'] : 1,
            'user_id' => 1,
            'represent_id' => $data['represent_guest_id'],
            'reference_number' => $data['reference_number'],
            'price_effect' => $data['price_effect'],
            'status' => 1,
            'status_receive' => 1,
            'status_reciept' => 1,
            'status_pay' => 1,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => $data['date_quote'],
            'total_price' => $totalBeforeTax,
            'terms_pay' => $data['terms_pay'],
            'total_tax' => $totalTax,
            'amount_owed' => $totalBeforeTax + $totalTax,
            'goods' => $data['goods'],
            'delivery' => $data['delivery'],
            'location' => $data['location'],
        ];
        $detailexport = new DetailExport($dataExport);
        $detailexport->save();
        $updateDetail = DetailExport::find($detailexport->id);
        if ($data['quotation_number'] == null) {
            $updateDetail->update([
                'quotation_number' => $detailexport->id,
            ]);
        } else {
            $updateDetail->update([
                'quotation_number' => $data['quotation_number'],
            ]);
        }
        return $detailexport->id;
    }
    public function getDetailExportToId($id)
    {
        $detailExport = DetailExport::where('detailexport.id', $id)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'detailexport.guest_id', 'guest.id')
            ->leftJoin('represent_guest', 'detailexport.represent_id', 'represent_guest.id')
            ->leftJoin('project', 'detailexport.project_id', 'project.id')
            ->select('*', 'guest.id as maKH', 'represent_guest.id as maNDD', 'detailexport.id as maBG', 'detailexport.status as tinhTrang', 'detailexport.created_at as ngayBG', 'project.id as id_project')
            ->first();
        return $detailExport;
    }
    public function getProductToId($id)
    {
        $quoteExport = QuoteExport::where('detailexport.id', $id)
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->get();
        return $quoteExport;
    }
    public function updateExport($data, $id)
    {
        $detailExport = DetailExport::find($id);
        if ($detailExport) {
            $totalBeforeTax = 0;
            $totalTax = 0;
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $price = str_replace(',', '', $data['product_price'][$i]);
                $subtotal = $data['product_qty'][$i] * (float) $price;
                $subTax = ($subtotal * $data['product_tax'][$i]) / 100;
                $totalBeforeTax += $subtotal;
                $totalTax += $subTax;
            }
            $detailExport->update([
                'guest_id' => $data['guest_id'],
                'project_id' => !empty($data['project_id']) ? $data['project_id'] : 1,
                'user_id' => 1,
                'quotation_number' => $data['quotation_number'],
                'reference_number' => $data['reference_number'],
                'price_effect' => $data['price_effect'],
                'status' => 1,
                'status_receive' => 1,
                'status_reciept' => 1,
                'status_pay' => 1,
                'created_at' => $data['date_quote'],
                'total_price' => $totalBeforeTax,
                'terms_pay' => $data['terms_pay'],
                'total_tax' => $totalTax,
                'amount_owed' => $totalBeforeTax + $totalTax,
                'goods' => $data['goods'],
                'delivery' => $data['delivery'],
                'location' => $data['location'],
            ]);
        }
        return $detailExport->id;
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'maBG')->where('table_name', $name)->get();
    }
    public function countDetail($id)
    {
        $countDetail = DetailExport::where('guest_id', $id)->where('status', 2)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)->count();
        return $countDetail;
    }
    public function sumDebt($id)
    {
        $sumDebt = DetailExport::where('guest_id', $id)->where('status', 2)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)->sum('amount_owed');
        return $sumDebt;
    }
    public function historyGuest($id)
    {
        $historyGuest = DetailExport::where('guest_id', $id)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $historyGuest;
    }
    public function sumSell($id)
    {
        $sumSell = DetailExport::where('guest_id', $id)
            ->where('status', 2)
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->selectRaw('SUM(total_price + total_tax) as sumSell')
            ->value('sumSell');
        return $sumSell;
    }
    // Ajax filter search history Guest
    public function historyFilterGuest($data)
    {
        $historyGuest = DetailExport::where('guest_id', $data['idName'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)->get();
        return $historyGuest;
    }
}
