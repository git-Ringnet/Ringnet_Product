<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'origin_workspace',
        'current_workspace',
        'roleid',
        'phone_number',
        'group_id',
        'user_code',
        'status',
        'phone_number',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    protected $table = "users";
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function getRoleUser()
    {
        return $this->hasOne(UserWorkspaces::class, 'user_id', 'id')
            ->where('workspace_id', Auth::user()->current_workspace);
    }


    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }
    public function updateUser($id, $data)
    {
        $user = self::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }
    public function ajax($data)
    {
        $users =  DB::table($this->table);
        if (isset($data['search'])) {
            $users = $users->where(function ($query) use ($data) {
                $query->orWhere('name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('email', 'like', '%' . $data['search'] . '%');
                $query->orWhere('phone_number', 'like', '%' . $data['search'] . '%');
                $query->orWhere('address', 'like', '%' . $data['search'] . '%');
                $query->orWhere('user_code', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['code']) && !empty($data['code'])) {
            $users = $users->where('user_code', 'like', '%' . $data['code'] . '%');
        }

        if (isset($data['name']) && !empty($data['name'])) {
            $users = $users->where('name', 'like', '%' . $data['name'] . '%');
        }

        if (isset($data['address']) && !empty($data['address'])) {
            $users = $users->where('address', 'like', '%' . $data['address'] . '%');
        }

        if (isset($data['phone']) && !empty($data['phone'])) {
            $users = $users->where('phone_number', 'like', '%' . $data['phone'] . '%');
        }

        if (isset($data['email']) && !empty($data['email'])) {
            $users = $users->where('email', 'like', '%' . $data['email'] . '%');
        }

        if (isset($data['sort_by']) && $data['sort_type']) {
            $users = $users->orderBy($data['sort_by'], $data['sort_type']);
        }
        $users = $users->get();
        return $users;
    }
    // Get Name User by ID
    public function getNameUser($data)
    {
        $users = DB::table($this->table);
        if (isset($data)) {
            $users = $users->whereIn('users.id', $data);
        }
        $users = $users->pluck('users.name')->all();
        return $users;
    }
    public function ajaxDetailUser($data)
    {
        $deE = new DetailExport();
        $detailExport = $deE->getAllDetailExportByUser($data['data'])->map(function ($item) {
            $item->source_id = 'export';
            return $item;
        });
        $detailImport = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', '=', 'detailimport.provide_id')
            ->where('detailimport.id_sale', $data['data']) // Sửa điều kiện bằng cách sử dụng dấu '=' cho leftJoin
            ->select('detailimport.*', 'provides.provide_name_display')
            ->orderBy('detailimport.id', 'desc')
            ->get() // Lấy dữ liệu trước khi map
            ->map(function ($item) {
                $item->source_id = 'import';
                return $item;
            });

        // Kết hợp hai bộ sưu tập
        $combined = $detailExport->concat($detailImport);

        if (isset($data['diengiai'])) {
            // Nếu diengiai chỉ chứa 1, lọc chỉ detailExport
            if (in_array(1, $data['diengiai']) && !in_array(2, $data['diengiai'])) {
                $combined = $detailExport;
            }
            // Nếu diengiai chỉ chứa 2, lọc chỉ detailImport
            elseif (in_array(2, $data['diengiai']) && !in_array(1, $data['diengiai'])) {
                $combined = $detailImport;
            }
            // Nếu có cả 1 và 2, giữ nguyên cả detailExport và detailImport
            elseif (in_array(1, $data['diengiai']) && in_array(2, $data['diengiai'])) {
                $combined = $detailExport->concat($detailImport);
            }
        }
        // Sử dụng filter() thay vì where() để tìm kiếm trên Collection
        if (isset($data['search'])) {
            $combined = $combined->filter(function ($item) use ($data) {
                $guestNameCheck = isset($item->guest_name_display) && is_string($item->guest_name_display)
                    ? stripos($item->guest_name_display, $data['search']) !== false
                    : false;
                $provideNameCheck = isset($item->provide_name_display) && is_string($item->provide_name_display)
                    ? stripos($item->provide_name_display, $data['search']) !== false
                    : false;
                $quotationCheck = isset($item->quotation_number) && is_string($item->quotation_number)
                    ? stripos($item->quotation_number, $data['search']) !== false
                    : false;
                return $guestNameCheck || $provideNameCheck || $quotationCheck;
            });
        }
        if (isset($data['ma'])) {
            $combined = $combined->filter(function ($item) use ($data) {
                $quotationCheck = isset($item->quotation_number) && is_string($item->quotation_number)
                    ? stripos($item->quotation_number, $data['ma']) !== false
                    : false;
                return $quotationCheck;
            });
        }
        if (!empty($data['date'][0]) && !empty($data['date'][1])) {
            $dateStart = Carbon::parse($data['date'][0]);
            $dateEnd = Carbon::parse($data['date'][1])->endOfDay();

            // Sử dụng filter để lọc theo khoảng ngày
            $combined = $combined->filter(function ($item) use ($dateStart, $dateEnd) {
                $itemDate = Carbon::parse($item->created_at);
                return $itemDate->between($dateStart, $dateEnd);
            });
        }
        if (isset($data['khachhang_ncc'])) {
            $combined = $combined->filter(function ($item) use ($data) {
                $guestNameCheck = isset($item->guest_name_display) && is_string($item->guest_name_display)
                    ? stripos($item->guest_name_display, $data['khachhang_ncc']) !== false
                    : false;
                $provideNameCheck = isset($item->provide_name_display) && is_string($item->provide_name_display)
                    ? stripos($item->provide_name_display, $data['khachhang_ncc']) !== false
                    : false;
                return $guestNameCheck || $provideNameCheck;
            });
        }

        $combined = $combined->sortBy('created_at');
        return $combined->values()->toArray();
    }

    public function ajaxHistoryUser($data)
    {
        $quoteE = QuoteExport::leftJoin('detailexport', 'quoteexport.detailexport_id', 'detailexport.id')
            ->leftJoin('users', 'users.id', 'detailexport.id_sale')
            ->leftJoin('guest', 'guest.id', 'detailexport.guest_id')
            ->leftJoin('products', 'products.id', 'quoteexport.product_id')
            ->leftJoin('groups', 'groups.id', 'products.group_id')
            ->where('detailexport.id_sale', $data['data']);
        $quoteE = $quoteE->select(
            'detailexport.*',
            'users.*',
            'groups.*',
            'quoteexport.*',
            'products.group_id as group_id',
            'quoteexport.product_qty as slxuat',
            'guest.guest_name_display',
            'quoteexport.price_export as giaXuat',
            'detailexport.id as id'
        );
        // Tìm kiếm từ khóa
        if (isset($data['search'])) {
            $quoteE = $quoteE->where(function ($query) use ($data) {
                $query->orWhere('detailexport.quotation_number', 'like', '%' . $data['search'] . '%')
                    ->orWhere('users.name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteexport.product_name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteexport.product_code', 'like', '%' . $data['search'] . '%')
                    ->orWhere('guest.guest_name_display', 'like', '%' . $data['search'] . '%')
                    ->orWhere('quoteexport.product_unit', 'like', '%' . $data['search'] . '%');
            });
        }

        // Lọc theo các trường khác
        if (isset($data['maphieu'])) {
            $quoteE = $quoteE->where('detailexport.quotation_number', 'like', '%' . $data['maphieu'] . '%');
        }
        if (isset($data['mahang'])) {
            $quoteE = $quoteE->where('quoteexport.product_code', 'like', '%' . $data['mahang'] . '%');
        }
        if (isset($data['khachhang'])) {
            $quoteE = $quoteE->where('guest.guest_name_display', 'like', '%' . $data['khachhang'] . '%');
        }
        if (isset($data['tenhang'])) {
            $quoteE = $quoteE->where('quoteexport.product_name', 'like', '%' . $data['tenhang'] . '%');
        }
        if (isset($data['dvt'])) {
            $quoteE = $quoteE->where('quoteexport.product_unit', 'like', '%' . $data['dvt'] . '%');
        }
        if (isset($data['soluong'][0]) && isset($data['soluong'][1])) {
            $quoteE = $quoteE->having('slxuat', $data['soluong'][0], $data['soluong'][1]);
        }
        // So sánh Đơn giá với operation
        if (isset($data['dongia'][0]) && isset($data['dongia'][1])) {
            $quoteE = $quoteE->having('giaXuat', $data['dongia'][0], $data['dongia'][1]);
        }
        // So sánh Thành tiền (tính dựa trên slxuat * giaXuat) với operation
        if (isset($data['thanhtien'][0]) && isset($data['thanhtien'][1])) {
            $quoteE = $quoteE->havingRaw('slxuat * giaXuat' . $data['thanhtien'][0] . ' ?', [$data['thanhtien'][1]]);
        }
        // Sắp xếp
        if (isset($data['sort']) && isset($data['sort'][0])) {
            $quoteE = $quoteE->orderBy($data['sort'][0], $data['sort'][1]);
        }
        return $quoteE->get();
    }
}
