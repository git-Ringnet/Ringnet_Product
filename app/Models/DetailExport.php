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
        'discount_type',
        'transfer_fee',
        'amount_owed',
        'goods',
        'delivery',
        'location',
        'guest_name',
        'represent_name',
        'created_at',
        'updated_at'
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
        $detailExport = DetailExport::select('*', 'detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.status as tinhTrang', 'detailexport.*')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace);
        $detailExport = $detailExport->orderBy('detailexport.id', 'desc')->get();
        return $detailExport;
    }
    public function addExport($data)
    {
        $totalBeforeTax = 0;
        $totalTax = 0;
        $voucher = 0;
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $price = str_replace(',', '', $data['product_price'][$i]);
            $promotion = isset($data['promotion'][$i]) && $data['promotion'][$i] !== '' ? str_replace(',', '', $data['promotion'][$i]) : 0;
            $tax = 0;

            if ($data['product_tax'][$i] == 99) {
                $tax = 0;
            } else {
                $tax = $data['product_tax'][$i];
            }
            if ($data['promotion_type'][$i] == 1) {
                $subtotal = ($data['product_qty'][$i] * (float) $price) - $promotion;
            } else if ($data['promotion_type'][$i] == 2) {
                $subtotal = ($data['product_qty'][$i] * (float) $price) - ($data['product_qty'][$i] * (float) $price * $promotion) / 100;
            } else {
                $subtotal = $data['product_qty'][$i] * (float) $price;
            }
            $subTax = ($subtotal * $tax) / 100;
            $totalBeforeTax += $subtotal;
            $totalTax += $subTax;
            if ($data['discount_type'] == 1) {
                $voucher = ($data['voucher'] == null ? 0 : str_replace(',', '', $data['voucher']));
            } else {
                $voucher = (($totalBeforeTax + $totalTax) * ($data['voucher'] == null ? 0 : str_replace(',', '', $data['voucher']))) / 100;
            }
        }
        $guestID = 0;
        if (isset($data['guestName'])) {
            $guestName = Guest::where('guest_name_display', $data['guestName'])
                ->where('workspace_id', Auth::user()->current_workspace)
                ->first();
            if (!$guestName) {
                $guest = new Guest();
                $guest->guest_name_display = $data['guestName'];
                $guest->workspace_id = Auth::user()->current_workspace;
                $guest->user_id = Auth::user()->id;
                $guest->save();
                $guestID = $guest->id;
            } else {
                $guestID = $guestName->id;
            }
        }
        $dataExport = [
            'guest_id' => $data['guest_id'] == null ? $guestID : $data['guest_id'],
            'project_id' => !empty($data['project_id']) ? $data['project_id'] : 1,
            'user_id' => Auth::user()->id,
            'represent_id' => $data['represent_guest_id'],
            'status' => 2,
            'status_pay' => 1,
            'created_at' => $data['date_quote'] == null ? now() : $data['date_quote'],
            'total_price' => $totalBeforeTax,
            'total_tax' => $totalTax,
            'discount' => $data['voucher'] == null ? 0 : str_replace(',', '', $data['voucher']),
            'amount_owed' => ($totalBeforeTax + $totalTax) - $voucher,
            'guest_name' => $data['guestName'],
            'represent_name' => $data['representName'],
            'discount_type' => $data['discount_type'],
            'workspace_id' => Auth::user()->current_workspace,
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
            ->leftJoin('guest', 'detailexport.guest_id', 'guest.id')
            ->leftJoin('represent_guest', 'detailexport.represent_id', 'represent_guest.id')
            ->leftJoin('project', 'detailexport.project_id', 'project.id')
            ->select(
                '*',
                'guest.id as maKH',
                'represent_guest.id as maNDD',
                'detailexport.id as maBG',
                'detailexport.status as tinhTrang',
                'detailexport.created_at as ngayBG',
                'project.id as id_project',
                'detailexport.guest_name as export_guest_name',
                'detailexport.represent_name as export_represent_name',
            )
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->first();
        return $detailExport;
    }
    public function getProductToId($id)
    {
        $quoteExport = QuoteExport::where('detailexport.id', $id)
            ->leftJoin('detailexport', 'detailexport.id', 'quoteexport.detailexport_id')
            ->leftJoin('products', 'quoteexport.product_id', 'products.id')
            ->where('quoteexport.status', 1)
            ->select('quoteexport.*', 'quoteexport.product_unit as product_unit', 'quoteexport.product_code as product_code', 'products.product_inventory')
            ->where(function ($query) {
                $query->where('quoteexport.product_delivery', null)
                    ->orWhere('quoteexport.product_delivery', 0);
            })
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->where('quoteexport.workspace_id', Auth::user()->current_workspace)
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
                $tax = 0;
                if ($data['product_tax'][$i] == 99) {
                    $tax = 0;
                } else {
                    $tax = $data['product_tax'][$i];
                }
                $subtotal = $data['product_qty'][$i] * (float) $price;
                $subTax = ($subtotal * $tax) / 100;
                $totalBeforeTax += $subtotal;
                $totalTax += $subTax;
            }
            $detailExport->update([
                'guest_id' => $data['guest_id'],
                'represent_id' => $data['represent_guest_id'],
                'project_id' => !empty($data['project_id']) ? $data['project_id'] : 1,
                'user_id' => Auth::user()->id,
                'quotation_number' => $data['quotation_number'],
                'reference_number' => $data['reference_number'],
                'price_effect' => $data['price_effect'],
                'created_at' => $data['date_quote'],
                'total_price' => $totalBeforeTax,
                'terms_pay' => $data['terms_pay'],
                'total_tax' => $totalTax,
                'amount_owed' => $totalBeforeTax + $totalTax,
                'goods' => $data['goods'],
                'delivery' => $data['delivery'],
                'location' => $data['location'],
                'guest_name' => $data['guestName'],
                'represent_name' => $data['representName'],
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
            ->where('workspace_id', Auth::user()->current_workspace)
            ->count();
        return $countDetail;
    }
    public function sumDebt($id)
    {
        $sumDebt = DetailExport::where('guest_id', $id)->whereIn('status', [2, 3])
            ->where('workspace_id', Auth::user()->current_workspace)
            ->sum('amount_owed');
        return $sumDebt;
    }
    public function historyGuest($id)
    {
        $historyGuest = DetailExport::where('guest_id', $id)
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->where('guest.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $historyGuest;
    }
    public function sumSell($id)
    {
        if (isset($id)) {
            $sumSell = DetailExport::where('guest_id', $id)
                ->whereIn('status', [2, 3])
                ->select(
                    DB::raw('SUM(total_price + total_tax - 
                        CASE 
                            WHEN discount_type = 1 THEN discount 
                            WHEN discount_type = 2 THEN (total_price + total_tax) * discount / 100 
                            ELSE 0 
                        END) as sumSell')
                )
                ->where('detailexport.workspace_id', Auth::user()->current_workspace)
                ->value('sumSell');
            return $sumSell;
        }
        return null;
    }
    // Ajax filter search history Guest
    public function historyFilterGuest($data)
    {
        $historyGuest = DetailExport::where('guest_id', $data['idName'])->get();
        return $historyGuest;
    }
    // Get Guest in detailExport
    public function getGuestInDetail()
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->select('detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.*', 'guest.*')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')->distinct('guest.id')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $detailExport;
    }
    public function getUserInDetail()
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('users', 'users.id', 'detailexport.user_id')->distinct('guest.id')
            ->select('detailexport.id as maBG', 'detailexport.created_at as ngayBG', 'detailexport.*', 'users.*')
            ->where('detailexport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $detailExport;
    }
    public function ajax($data)
    {
        $detailExport = DetailExport::leftJoin('guest', 'guest.id', 'detailexport.guest_id')
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
    //
    public function deleteDetailExport($id)
    {
        $detailExport = DetailExport::find($id);
        QuoteExport::where('detailexport_id', $id)->delete();
        $detailExport->delete();
    }
}
