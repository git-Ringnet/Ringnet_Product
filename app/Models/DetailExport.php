<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailExport extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
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
        'guest_name',
        'represent_name',
        'created_at',
        'updated_at',
        'promotion',
        'promotion_total_product',
        'address_guest',
        'note',
        'receiver',
        'address_delivery',
        'date_payment',
        'phone_receive',
        'date_delivery',
        'id_sale',
    ];
    protected $table = 'detailexport';

    public function getPayExport()
    {
        return $this->hasOne(PayExport::class, 'detailexport_id', 'id');
    }
    public function getQuoteExport()
    {
        return $this->hasMany(QuoteExport::class, 'detailexport_id', 'id');
    }
    public function getGuest()
    {
        return $this->hasOne(Guest::class, 'id', 'guest_id');
    }

    public function getAllDetailExport()
    {
        $detailExport = DetailExport::where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select('*', 'detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.status as tinhTrang', 'detailexport.*')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $detailExport->where('user_id', Auth::user()->id);
            }
        }
        // dd(Auth::user()->getRoleUser);
        $detailExport = $detailExport->orderBy('detailexport.id', 'desc')->get();
        return $detailExport;
    }
    function allEqual($array)
    {
        $firstValue = $array[0];
        foreach ($array as $value) {
            if ($value != $firstValue) {
                return false;
            }
        }
        return true;
    }
    public function addExport($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        $totalPromotion = 0;
        $productTaxes = $data['product_tax'];
        // Kiểm tra xem tất cả các giá trị trong mảng có bằng nhau không
        $areAllTaxesEqual = $this->allEqual($productTaxes);
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            $tax = ($data['product_tax'][$i] == 99) ? 0 : $data['product_tax'][$i];
            $subtotal = $data['product_qty'][$i] * (float) $price;
            // Lấy thông tin khuyến mãi
            $promotionType = $data['promotion-option'][$i];
            $promotionValue = str_replace(',', '', $data['promotion'][$i]);
            // Tính toán giá trị khuyến mãi
            $discountAmount = 0;
            if ($promotionType == 1) { // Giảm số tiền trực tiếp
                $discountAmount = (float) $promotionValue;
            } elseif ($promotionType == 2) { // Giảm phần trăm trên giá trị sản phẩm
                $discountAmount = ($subtotal * (float) $promotionValue) / 100;
            }
            // Cộng dồn tiền khuyến mãi vào tổng khuyến mãi
            $totalPromotion += $discountAmount;
            // Áp dụng khuyến mãi vào subtotal
            $subtotal -= $discountAmount;
            $subTax = ($subtotal * $tax) / 100;
            $totalBeforeTax += $subtotal;
            $totalTax += $subTax;
        }

        // Tính toán khuyến mãi
        $promotionOption = isset($data['promotion-option-total']) ? $data['promotion-option-total'] : 0;
        $promotionTotal = isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0;
        $promotion = [
            'type' => $promotionOption,
            'value' => $promotionTotal,
        ];
        if ($promotion['type'] == 1) { // Giảm số tiền trực tiếp
            $totalBeforeTax -= (float)$promotion['value'];
        } elseif ($promotion['type'] == 2) { // Giảm phần trăm trên tổng giá trị trước thuế
            $discountAmount = ($totalBeforeTax * (float)$promotion['value']) / 100;
            $totalBeforeTax -= $discountAmount;
        }
        if ($areAllTaxesEqual) {
            $taxfirst = $productTaxes[0] == 99 ? 0 : $productTaxes[0];
            $totalTax = ($totalBeforeTax * $taxfirst) / 100;
        }
        // dd($totalTax);
        // Tính toán tổng số tiền cuối cùng
        $grandTotal = $totalBeforeTax + $totalTax;
        // Làm tròn tổng số tiền
        $grandTotal = round($grandTotal);
        $dataExport = [
            'guest_id' => $data['guest_id'],
            'project_id' => !empty($data['project_id']) ? $data['project_id'] : 1,
            'user_id' => Auth::user()->id,
            // 'represent_id' => $data['represent_guest_id'],
            'reference_number' => $data['reference_number'],
            // 'price_effect' => $data['price_effect'],
            'status' => $data['status_receive'] ?? 1,
            'status_receive' => $data['status_receive'] ?? 1,
            'status_reciept' => 0,
            'status_pay' => 0,
            'workspace_id' => Auth::user()->current_workspace,
            'created_at' => $data['date_quote'] == null ? now() : $data['date_quote'],
            'total_price' => $totalBeforeTax,
            // 'terms_pay' => $data['terms_pay'],
            'total_tax' => $totalTax,
            'amount_owed' => $grandTotal,
            // 'goods' => $data['goods'],
            // 'delivery' => $data['delivery'],
            // 'location' => $data['location'],
            'guest_name' => $data['guestName'],
            // 'represent_name' => $data['representName'],
            'promotion' => json_encode($promotion),
            'promotion_total_product' => $totalPromotion,
            'address_guest' => $data['address_guest'],
            'note' => $data['note'],
            'receiver' => $data['receiver'],
            'address_delivery' => $data['address_delivery'],
            'date_payment' => $data['date_payment'] == null ? now() : $data['date_payment'],
            'phone_receive' => $data['phone_receive'],
            'date_delivery' => $data['date_delivery'] == null ? now() : $data['date_delivery'],
            'id_sale' => $data['id_sale'],
        ];
        $detailexport = new DetailExport($dataExport);
        $detailexport->save();

        //Cập nhật công nợ khách hàng
        $guest = Guest::find($data['guest_id']);
        $guest->guest_debt = $guest->guest_debt + $grandTotal;
        $guest->save();

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
            ->leftJoin('users', 'detailexport.user_id', 'users.id')
            ->select(
                'detailexport.*',
                'guest.id as maKH',
                'represent_guest.id as maNDD',
                'detailexport.id as maBG',
                'detailexport.status as tinhTrang',
                'detailexport.created_at as ngayBG',
                'project.id as id_project',
                'guest.guest_name_display as export_guest_name',
                'guest.guest_debt',
                'detailexport.represent_name as export_represent_name',
                'users.name as name'
            )
            ->first();
        return $detailExport;
    }
    public function getProductToId($id)
    {
        $quoteExport = QuoteExport::leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->leftJoin('productwarehouse', function ($join) {
                $join->on('productwarehouse.product_id', 'quoteexport.product_id')
                    ->on('productwarehouse.warehouse_id', 'quoteexport.warehouse_id');
            })
            ->leftJoin('products', 'quoteexport.product_id', 'products.id')
            ->where('detailexport.id', $id)
            ->where('quoteexport.status', 1)
            ->select('quoteexport.*', 'quoteexport.product_unit as product_unit', 'quoteexport.product_code as product_code', 'productwarehouse.qty as product_inventory')
            ->where(function ($query) {
                $query->whereNull('quoteexport.product_delivery')
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->get();

        return $quoteExport;
    }

    public function updateExport($data, $id)
    {
        // dd($data);
        $detailExport = DetailExport::find($id);
        if ($detailExport) {
            $totalBeforeTax = 0;
            $totalTax = 0;
            $totalPromotion = 0;
            $productTaxes = $data['product_tax'];
            // Kiểm tra xem tất cả các giá trị trong mảng có bằng nhau không
            $areAllTaxesEqual = $this->allEqual($productTaxes);
            for ($i = 0; $i < count($data['product_name']); $i++) {
                $price = str_replace(',', '', $data['product_price'][$i]);
                $tax = 0;
                $tax = ($data['product_tax'][$i] == 99) ? 0 : $data['product_tax'][$i];
                $subtotal = $data['product_qty'][$i] * (float) $price;
                // Lấy thông tin khuyến mãi
                $promotionType = $data['promotion-option'][$i];
                $promotionValue = str_replace(',', '', $data['promotion'][$i]);
                // Tính toán giá trị khuyến mãi
                $discountAmount = 0;
                if ($promotionType == 1) { // Giảm số tiền trực tiếp
                    $discountAmount = (float) $promotionValue;
                } elseif ($promotionType == 2) { // Giảm phần trăm trên giá trị sản phẩm
                    $discountAmount = ($subtotal * (float) $promotionValue) / 100;
                }
                // Cộng dồn tiền khuyến mãi vào tổng khuyến mãi
                $totalPromotion += $discountAmount;
                // Áp dụng khuyến mãi vào subtotal
                $subtotal -= $discountAmount;
                $subTax = ($subtotal * $tax) / 100;
                $totalBeforeTax += $subtotal;
                $totalTax += $subTax;
            }
            // Tính toán khuyến mãi
            $promotionOption = isset($data['promotion-option-total']) ? $data['promotion-option-total'] : 0;
            $promotionTotal = isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0;
            $promotion = [
                'type' => $promotionOption,
                'value' => $promotionTotal,
            ];
            if ($promotion['type'] == 1) { // Giảm số tiền trực tiếp
                $totalBeforeTax -= (float)$promotion['value'];
            } elseif ($promotion['type'] == 2) { // Giảm phần trăm trên tổng giá trị trước thuế
                $discountAmount = ($totalBeforeTax * (float)$promotion['value']) / 100;
                $totalBeforeTax -= $discountAmount;
            }
            if ($areAllTaxesEqual) {
                $taxfirst = $productTaxes[0];
                $totalTax = ($totalBeforeTax * $taxfirst) / 100;
            }
            // Tính toán tổng số tiền cuối cùng
            $grandTotal = $totalBeforeTax + $totalTax;
            // Làm tròn tổng số tiền
            $grandTotal = round($grandTotal);

            //Cập nhật công nợ khách hàng
            //công nợ cũ
            $guestOld = Guest::find($detailExport->guest_id);
            $guestOld->guest_debt = $guestOld->guest_debt - $detailExport->amount_owed;
            $guestOld->save();
            //công nợ mới
            $guest = Guest::find($data['guest_id']);
            $guest->guest_debt = $guest->guest_debt + $grandTotal;
            $guest->save();
            $detailExport->update([
                'guest_id' => $data['guest_id'],
                // 'represent_id' => $data['represent_guest_id'],
                'project_id' => !empty($data['project_id']) ? $data['project_id'] : 1,
                'user_id' => Auth::user()->id,
                'quotation_number' => $data['quotation_number'],
                'reference_number' => $data['reference_number'],
                'status' => $data['status_receive'] ?? 1,
                'status_receive' => $data['status_receive'] ?? 1,
                // 'price_effect' => $data['price_effect'],
                'created_at' => $data['date_quote'],
                'total_price' => $totalBeforeTax,
                // 'terms_pay' => $data['terms_pay'],
                'total_tax' => $totalTax,
                'amount_owed' => $grandTotal,
                // 'goods' => $data['goods'],
                // 'delivery' => $data['delivery'],
                // 'location' => $data['location'],
                'guest_name' => $data['guestName'],
                // 'represent_name' => $data['representName'],
                'promotion' => json_encode($promotion),
                'promotion_total_product' => $totalPromotion,
                'address_guest' => $data['address_guest'],
                'note' => $data['note'],
                'receiver' => $data['receiver'],
                'address_delivery' => $data['address_delivery'],
                'date_payment' => $data['date_payment'] == null ? now() : $data['date_payment'],
                'phone_receive' => $data['phone_receive'],
                'date_delivery' => $data['date_delivery'] == null ? now() : $data['date_delivery'],
                'id_sale' => $data['id_sale'],
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
        $countDetail = DetailExport::where('guest_id', $id)->whereIn('status', [2, 3])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)->count();
        return $countDetail;
    }
    public function sumDebt($id)
    {
        $sumDebt = DetailExport::where('guest_id', $id)->whereIn('status', [2, 3])
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
        if (isset($id)) {
            $sumSell = DetailExport::where('guest_id', $id)
                ->whereIn('status', [2, 3])
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->selectRaw('SUM(total_price + total_tax) as sumSell')
                ->value('sumSell');
            return $sumSell;
        } else {
        }
    }
    // Ajax filter search history Guest
    public function historyFilterGuest($data)
    {
        $historyGuest = DetailExport::where('guest_id', $data['idName'])
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)->get();
        return $historyGuest;
    }
    // Get Guest in detailExport
    public function getGuestInDetail()
    {
        $detailExport = DetailExport::where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->select('detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.*', 'guest.*')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')->distinct('guest.id')
            ->get();
        return $detailExport;
    }
    public function getUserInDetail()
    {
        $detailExport = DetailExport::where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')->distinct('guest.id')
            ->select('detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.*', 'users.*')
            ->get();
        return $detailExport;
    }
    public function ajax($data)
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->select(
                'detailexport.id as maBG',
                'detailexport.created_at as ngayBG',
                'guest.guest_name_display as guest_name_display',
                'guest.*',
                'detailexport.*',
                DB::raw('detailexport.total_price + detailexport.total_tax as totaltong'),
            );
        if (isset($data['search'])) {
            $detailExport = $detailExport->where(function ($query) use ($data) {
                $query->orWhere('quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('reference_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_name_display', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailexport.guest_name', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['reference_number'])) {
            $detailExport = $detailExport->where('reference_number', 'like', '%' . $data['reference_number'] . '%');
        }
        if (isset($data['guests'])) {
            $detailExport = $detailExport->where('detailexport.guest_name', 'like', '%' . $data['guests'] . '%');
        }
        if (isset($data['quotenumber'])) {
            $detailExport = $detailExport->whereIn('detailexport.id', $data['quotenumber']);
        }
        if (isset($data['users'])) {
            $detailExport = $detailExport->whereIn('detailexport.user_id', $data['users']);
        }
        if (isset($data['status'])) {
            $detailExport = $detailExport->whereIn('detailexport.status', $data['status']);
        }
        if (isset($data['receive'])) {
            $detailExport = $detailExport->whereIn('detailexport.status_receive', $data['receive']);
        }
        if (isset($data['reciept'])) {
            $detailExport = $detailExport->whereIn('detailexport.status_reciept', $data['reciept']);
        }
        if (isset($data['pay'])) {
            $detailExport = $detailExport->whereIn('detailexport.status_pay', $data['pay']);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();

            $detailExport = $detailExport->whereBetween('detailexport.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $detailExport = $detailExport->having('totaltong', $data['total'][0], $data['total'][1]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $detailExport = $detailExport->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $detailExport = $detailExport->get();
        // dd($detailExport);
        return $detailExport;
    }
    // Get reference number by data
    public function reference_numberById($data)
    {
        $detaiExport = DB::table($this->table);
        if (isset($data)) {
            $detaiExport = $detaiExport->whereIn('id', $data);
        }
        $detaiExport = $detaiExport->pluck('reference_number')->all();
        return $detaiExport;
    }
    public function getSumDetailE()
    {
        $detaiExport = DB::table($this->table)
            // ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('groups', 'groups.id', 'guest.group_id')
            ->leftJoin('users', 'users.id', 'detailexport.id_sale')
            ->select(
                'detailexport.*',
                'users.name as nameUser',
                'detailexport.created_at as ngayTao',
                'detailexport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'guest.guest_name_display as nameGuest',
                'detailexport.total_price as totalProductVat',
            )
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $detaiExport;
    }
    public function getSumDetailEByGuest($idGuest)
    {
        $detaiExport = DB::table($this->table)
            // ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->where('detailexport.guest_id', $idGuest)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('groups', 'groups.id', 'guest.group_id')
            ->leftJoin('users', 'users.id', 'detailexport.id_sale')
            ->select(
                'detailexport.*',
                'users.name as nameUser',
                'detailexport.created_at as ngayTao',
                'detailexport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'guest.guest_name_display as nameGuest',
                'detailexport.total_price as totalProductVat',
            )
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $detaiExport;
    }
    
    public function allProductsSell()
    {
        $detaiExport = DB::table($this->table)
            ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->leftJoin('history_import', 'history_import.product_id', 'quoteexport.product_id')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('groups', 'groups.id', 'guest.group_id')
            ->select(
                'detailexport.*',
                'detailexport.created_at as ngayTao',
                'detailexport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'guest.guest_name_display as nameGuest',
                'detailexport.total_price as totalProductVat',
                'products.product_code as product_code',
                'products.product_name as product_name',
                'products.group_id as group_id',
                'guest.group_id as group_idGuest',
                'products.product_unit as product_unit',
                'quoteexport.product_qty as slxuat',
                'quoteexport.price_export as price_export',
                'quoteexport.product_total as product_total_vat',
                'history_import.price_export as giaNhap',
            )
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $detaiExport;
    }
}
