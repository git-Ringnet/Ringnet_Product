<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailImport extends Model
{
    use HasFactory;
    protected $table = 'detailimport';
    protected $fillable = [
        'id',
        'provide_id',
        'project_id',
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
        'provide_name',
        'represent_name',
        'status_debt',
        'created_at',
        'updated_at',
        'total_price',
        'total_tax',
        'discount',
        'transfer_fee',
        'terms_pay',
        'promotion',
        'address',
        'note',
        'phone',
        'date_delivery',
        'id_sale',
    ];
    public function getProvideName()
    {
        return $this->hasOne(Provides::class, 'id', 'provide_id');
    }
    public function getNameRepresent()
    {
        return $this->hasOne(ProvideRepesent::class, 'id', 'represent_id');
    }
    public function getProjectName()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
    public function getProductImport()
    {
        return $this->hasMany(QuoteImport::class, 'detailimport_id', 'id');
    }
    public function getAttachment($name)
    {
        return $this->hasMany(Attachment::class, 'table_id', 'id')->where('table_name', $name)->get();
    }
    public function getPayOrder()
    {
        return $this->hasOne(PayOder::class, 'detailimport_id', 'id');
    }

    public function getNameUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getAllReceiveBill()
    {
        return $this->hasMany(Receive_bill::class, 'detailimport_id', 'id');
    }

    public function getAllImport()
    {
        return DB::table($this->table)->get();
    }

    public function getPayOrders()
    {
        return $this->hasMany(PayOder::class, 'detailimport_id', 'id');
    }

    public function listImport($id)
    {
        $import = DetailImport::where('detailimport.id', $id)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('users', 'users.id', 'detailimport.user_id')
            ->select('detailimport.*', 'provides.provide_name_display', 'provides.provide_debt', 'users.name');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $import->where('user_id', Auth::user()->id);
            }
        }
        $import = $import->first();
        return $import;
    }

    public function addImport($data)
    {
        $total = 0;
        $total_tax = 0;
        $result = [];
        for ($i = 0; $i < count($data['product_name']); $i++) {
            $promotion = [];
            $product_ratio = 0;
            $price_vat = 0;
            $price_export = 0;
            isset($data['product_ratio']) ? $product_ratio = $data['product_ratio'][$i] : $product_ratio = 0;
            isset($data['price_import']) ? $price_import = str_replace(',', '', $data['price_import'][$i]) : $price_import = 0;
            $price_export = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);

            if ($data['promotion-option'][$i] == 1) {
                $price_export = $price_export - (isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0);
            } else {
                $price_export = $price_export - $price_export * (isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0) / 100;
            }

            // Tổng tiền sản phẩm chưa + VAT
            $total += $price_export;

            // $price_vat = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);

            // Tổng tiền VAT
            $total_tax += ($data['product_tax'][$i] == 99 ? 0 : $data['product_tax'][$i]) * $price_export / 100;

            // if ($product_ratio > 0 && $price_import > 0) {
            //     $price_export = (($product_ratio + 100) * $price_import) / 100;
            //     $total += $price_export * str_replace(',', '', $data['product_qty'][$i]);
            // } else {
            //     $price_export = str_replace(',', '', $data['product_qty'][$i]) * str_replace(',', '', $data['price_export'][$i]);
            //     if ($data['promotion-option'][$i] == 1) {
            //         // var_dump($data['promotion-option'][$i]);
            //         // var_dump(isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0);
            //         $price_export = $price_export - (isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0);
            //     } else {
            //         $price_export = $price_export * (isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0) / 100;
            //     }

            //     $total += $price_export;
            // }

            // Tính tổng KM
            // if ($data['promotion-option'][$i] == 1) {
            //     $promotionAll += str_replace(',', '', $data['price_export'][$i]) *  str_replace(',', '', $data['product_qty'][$i]) - isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0;
            // } else {
            //     $promotionAll += str_replace(',', '', $data['price_export'][$i]) *  str_replace(',', '', $data['product_qty'][$i]) * isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0 / 100;
            // }
            // $total_tax +=  ((($data['product_tax'][$i] == 99 ? 0 : $data['product_tax'][$i]) * $price_export) / 100);
        }
        $total_tax = round($total_tax) + round($total);
        $promotion['type'] = isset($data['promotion-option-total']) ? $data['promotion-option-total'] : 1;
        $promotion['value'] = isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0;

        if (isset($data['promotion-total']) > 0) {
            if ($data['promotion-option-total'] == 1) {
                $total_tax = $total_tax - $promotion['value'];
            } else {
                $total_tax = $total_tax - ($total_tax * $promotion['value'] / 100);
            }
        }

        $dataImport = [
            'provide_id' => $data['provides_id'],
            'project_id' => 1,
            'user_id' => Auth::user()->id,
            'quotation_number' => $data['quotation_number'],
            'reference_number' => $data['reference_number'],
            // 'price_effect' => $data['price_effect'],
            'status' => 1,
            'created_at' => $data['date_quote'],
            'total_price' => $total,
            // 'total_tax' => $total_tax,
            'total_tax' => isset($data['total_bill']) ? str_replace(',', '', $data['total_bill']) : 0,
            'discount' =>   isset($data['discount']) ? str_replace(',', '', $data['discount']) : 0,
            'transfer_fee' =>  isset($data['transport_fee']) ? str_replace(',', '', $data['transport_fee']) : 0,
            'status_receive' => $data['status_receive'],
            'status_reciept' => 0,
            'status_pay' => 0,
            // 'terms_pay' => $data['terms_pay'],
            'workspace_id' => Auth::user()->current_workspace,
            'represent_id' => isset($data['represent_id']) ?? "",
            'provide_name' => isset($data['provides_name']) ? $data['provides_name'] : "",
            'represent_name' => isset($data['represent_name']) ? $data['represent_name'] : "",
            'status_debt' => 0,
            'user_id' => Auth::user()->id,
            'promotion' => json_encode($promotion),
            'address' => $data['address'],
            'note' => $data['note'],
            'phone' => $data['phone'],
            'date_delivery' => $data['date_delivery'] == null ? now() : $data['date_delivery'],
            'id_sale' => $data['id_sale'],
        ];
        $total_bill = isset($data['total_bill']) ? str_replace(',', '', $data['total_bill']) : 0;
        //cập nhật công nợ khách hàng
        $provide = Provides::find($data['provides_id']);
        $provide->provide_debt = $provide->provide_debt + $total_bill;
        $provide->save();

        $checkQuotation = DetailImport::where('provide_id', $data['provides_id'])
            ->where('quotation_number', $data['quotation_number'])->first();
        if ($checkQuotation) {
            $result = [
                'status' => false,
            ];
        } else {
            $detail_id = DB::table($this->table)->insertGetId($dataImport);
            $result = [
                'status' => true,
                'detail_id' => $detail_id,
            ];
        }

        if (!isset($data['quotation_number'])) {
            DB::table($this->table)->where('id', $detail_id)->update([
                'quotation_number' => $detail_id
            ]);
        }
        return  $result;
    }

    public function updateImport($data, $id, $status)
    {
        $total = 0;
        $total_tax = 0;
        $check_status = false;
        $detail = DetailImport::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($detail) {
            if ($data['action'] == "action_1") {
                $check_status = true;
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
                        $price_export = floatval(str_replace(',', '', $data['product_qty'][$i])) * floatval(str_replace(',', '', $data['price_export'][$i]));
                        if ($data['promotion-option'][$i] == 1) {
                            $price_export = $price_export - (isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0);
                        } else {
                            $price_export = $price_export * (isset($data['promotion'][$i]) ? str_replace(',', '', $data['promotion'][$i]) : 0) / 100;
                        }
                        $total += $price_export;
                    }
                    $total_tax += ($data['product_tax'][$i] == 99 ? 0 : $data['product_tax'][$i]) * $price_export / 100;
                }
            } else {
                $product = QuoteImport::where('detailimport_id', $id)
                    ->where('workspace_id', Auth::user()->current_workspace)
                    ->get();
                foreach ($product as $item) {
                    if ($item->product_ratio > 0 && $item->price_import) {
                        $total += (($item->product_ratio + 100) * $item->price_import / 100) * $item->product_qty;
                    } else {
                        $total += $item->product_qty * $item->price_export;
                    }
                    $total_tax += ($item->product_tax == 99 ? 0 : $item->product_tax) * ($item->product_qty * $item->price_export / 100);

                    $check_status = $check_status || (
                        ($data['action'] == "action_2" && $item->product_qty != $item->receive_qty) ||
                        ($data['action'] == "action_3" && $item->product_qty != $item->reciept_qty) ||
                        ($data['action'] != "action_2" && $data['action'] != "action_3" && $item->product_qty != $item->payment_qty)
                    );
                }
            }
            if ($check_status && $detail->status == 1) {
                $total_tax = round($total_tax) + round($total);
                $promotion['type'] = isset($data['promotion-option-total']) ? $data['promotion-option-total'] : 1;
                $promotion['value'] = isset($data['promotion-total']) ? str_replace(',', '', $data['promotion-total']) : 0;

                if (isset($data['promotion-option-total'])) {
                    if ($data['promotion-option-total'] == 1 && $data['promotion-total'] > 0) {
                        $total_tax = $total_tax - $promotion['value'];
                    } else {
                        $total_tax = $total_tax - ($total_tax * $promotion['value'] / 100);
                    }
                }
                $total_bill = isset($data['total_bill']) ? str_replace(',', '', $data['total_bill']) : 0;
                //Cập nhật công nợ nhà cung cấp
                //công nợ cũ
                $provideOld = Provides::find($detail->provide_id);
                $provideOld->provide_debt = $provideOld->provide_debt - $detail->total_tax;
                $provideOld->save();
                //công nợ mới
                $provide = Provides::find($data['provides_id']);
                $provide->provide_debt = $provide->provide_debt + $total_bill;
                $provide->save();

                $dataImport = [
                    'provide_id' => $data['provides_id'],
                    'represent_id' => $data['represent_id'],
                    'project_id' => isset($data['project_id']) ? $data['project_id'] : 1,
                    'user_id' => 1,
                    'quotation_number' => $data['quotation_number'],
                    'reference_number' => $data['reference_number'],
                    // 'price_effect' => $data['price_effect'],
                    'status_receive' => $data['status_receive'],
                    'status' => $status,
                    'created_at' => $data['date_quote'],
                    'total_price' => round($total),
                    // 'total_tax' => $total_tax,
                    'total_tax' => isset($data['total_bill']) ? str_replace(',', '', $data['total_bill']) : 0,
                    'discount' =>   isset($data['discount']) ? str_replace(',', '', $data['discount']) : 0,
                    'transfer_fee' =>  isset($data['transport_fee']) ? str_replace(',', '', $data['transport_fee']) : 0,
                    // 'terms_pay' => $data['terms_pay'],
                    'provide_name' => isset($data['provides_name']) ? $data['provides_name'] : "",
                    'represent_name' => isset($data['represent_name']) ? $data['represent_name'] : "",
                    'promotion' => json_encode($promotion),
                    'address' => $data['address'],
                    'note' => $data['note'],
                    'phone' => $data['phone'],
                    'date_delivery' => $data['date_delivery'],
                    'id_sale' => $data['id_sale'],
                ];
                $result = DB::table($this->table)->where('id', $id)->update($dataImport);
            } else {
                $dataImport = [
                    'reference_number' => $data['reference_number'],
                    'created_at' => isset($data['date_quote']) ? $data['date_quote'] : Carbon::now()
                ];
                $result = DB::table($this->table)->where('id', $id)->update($dataImport);
            }
        } else {
            $check_status = false;
        }

        return $check_status;
    }


    public function deleteDetail($id)
    {
        $result = [];
        $checkReceive = Receive_bill::where('detailimport_id', $id)->get();
        $checkReciept = Reciept::where('detailimport_id', $id)->get();
        $checkPayOrder = PayOder::where('detailimport_id', $id)->get();
        $checkReturn = ReturnImport::where('receive_id', $id)->get();
        if (count($checkReceive) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa đơn nhận hàng'
            ];
        } elseif (count($checkReciept) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa hóa đơn mua hàng'
            ];
        } elseif (count($checkPayOrder) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa thanh toán mua hàng'
            ];
        } elseif (count($checkReturn) > 0) {
            $result = [
                'status' => false,
                'msg' => 'Vui lòng xóa đơn trả hàng'
            ];
        } else {
            $detail = DetailImport::where('id', $id)->first();
            if ($detail) {
                //Cập nhật công nợ nhà cung cấp
                $guestOld = Provides::find($detail->provide_id);
                $guestOld->provide_debt = $guestOld->provide_debt - $detail->total_tax;
                $guestOld->save();

                HistoryImport::where('detailImport_id', $detail->id)->delete();
                $quote = QuoteImport::where('detailimport_id', $detail->id)->get();
                if ($quote) {
                    foreach ($quote as $qt) {
                        $qt->delete();
                    }
                }

                // Xóa file đính kèm
                // DB::table('attachment')->where('table_id', $detail->id)
                //     ->where('table_name', 'DMH')
                //     ->where('workspace_id', Auth::user()->current_workspace)
                //     ->delete();

                // Xóa đơn mua hàng
                $detail->delete();
                $result = [
                    'status' => true,
                    'msg' => 'Xóa đơn mua hàng thành công !'
                ];
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'Không tìm thấy đơn mua hàng cần xóa !'
                ];
            }
        }
        return $result;
    }


    public function dataImport($dataImport)
    {
        $data = DB::table('products')
            ->whereIn('id', $dataImport['product_id'])
            ->where('type', 1)
            ->orderByRaw("FIELD(id, " . implode(", ", $dataImport['product_id']) . ")")
            ->get();
        return $data;
    }
    public function getProvideInDetail()
    {
        $import = DetailImport::leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('provides.provide_name_display as provide_name_display', 'detailimport.*', 'provides.*')
            ->where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $import;
    }
    public function getUserInDetail()
    {
        $import = DetailImport::leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('users', 'users.id', 'detailimport.user_id')->distinct('guest.id')
            ->where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->select('provides.provide_name_display as provide_name_display', 'detailimport.*', 'users.*')
            ->get();
        return $import;
    }
    public function ajax($data)
    {
        $import = DetailImport::leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('provides.provide_name_display as provide_name_display', 'detailimport.*')
            ->where('detailimport.workspace_id', Auth::user()->current_workspace);

        if (isset($data['search'])) {
            $import = $import->where(function ($query) use ($data) {
                $query->orWhere('detailimport.quotation_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailimport.reference_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('detailimport.provide_name', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['reference_number'])) {
            $import = $import->where('detailimport.reference_number', 'like', '%' . $data['reference_number'] . '%');
        }
        if (isset($data['provides'])) {
            $import = $import->where('detailimport.provide_name', 'like', '%' . $data['provides'] . '%');
        }
        if (isset($data['quotenumber'])) {
            $import = $import->whereIn('detailimport.id', $data['quotenumber']);
        }
        if (isset($data['users'])) {
            $import = $import->whereIn('detailimport.user_id', $data['users']);
        }
        if (isset($data['status'])) {
            $import = $import->whereIn('detailimport.status', $data['status']);
        }
        if (isset($data['receive'])) {
            $import = $import->whereIn('detailimport.status_receive', $data['receive']);
        }
        if (isset($data['reciept'])) {
            $import = $import->whereIn('detailimport.status_reciept', $data['reciept']);
        }
        if (isset($data['pay'])) {
            $import = $import->whereIn('detailimport.status_pay', $data['pay']);
        }
        if (isset($data['total'][0]) && isset($data['total'][1])) {
            $import = $import->where('detailimport.total_tax', $data['total'][0], $data['total'][1]);
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();
            $import = $import->whereBetween('detailimport.created_at', [$dateStart, $dateEnd]);
        }
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $import = $import->orderBy($data['sort'][0], $data['sort'][1]);
        }
        $import = $import->get();
        return $import;
    }
    public function reference_numberById($data)
    {
        $detailImport = DB::table($this->table);
        if (isset($data)) {
            $detailImport = $detailImport->whereIn('id', $data);
        }
        $detailImport = $detailImport->pluck('reference_number')->all();
        return $detailImport;
    }
    public function checkStatus($id)
    {
        $detail = DetailImport::where('id', $id)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->first();
        if ($detail) {
            return true;
        } else {
            return false;
        }
    }
    public function getSumDetailI()
    {
        $detailImport = DB::table($this->table)
            // ->leftJoin('quoteexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->leftJoin('groups', 'groups.id', 'provides.group_id')
            ->select(
                'detailimport.*',
                'detailimport.created_at as ngayTao',
                'detailimport.quotation_number as maPhieu',
                'groups.name as nhomKH',
                'provides.provide_name_display as nameProvide',
                'detailimport.total_price as totalProductVat',
            )
            ->where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->get();
        return $detailImport;
    }
}
