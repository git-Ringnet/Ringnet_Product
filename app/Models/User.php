<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        $detailExport = $this->detailExport->getAllDetailExportByUser($data['data'])->map(function ($item) {
            $item->source_id = 'export';
            return $item;
        });
        $detailImport = DetailImport::where('detailimport.workspace_id', Auth::user()->current_workspace)
            ->leftJoin('provides', 'provides.id', 'detailimport.provide_id')
            ->select('detailimport.*', 'provides.provide_name_display')
            ->orderBy('detailimport.id', 'desc');
        if (Auth::check()) {
            if (Auth::user()->getRoleUser->roleid == 4) {
                $detailImport->where('user_id', Auth::user()->id);
            }
        }
        $detailImport = $detailImport->get()->map(function ($item) {
            $item->source_id = 'import';
            return $item;
        });;
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
}
