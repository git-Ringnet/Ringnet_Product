<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'phone_number'
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
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function getRoleUser()
    {
        return $this->hasOne(UserWorkspaces::class,'user_id','id');
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
                $query->orWhere('guest_name', 'like', '%' . $data['search'] . '%');
                $query->orWhere('guest_name_display', 'like', '%' . $data['search'] . '%');
            });
        }
        if (isset($data['idName'])) {
            $users = $users->whereIn('guest.id', $data['idName']);
        }
        if (isset($data['idCompany'])) {
            $users = $users->whereIn('guest.id', $data['idCompany']);
        }
        if (isset($data['email'])) {
            $users = $users->where('guest_email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data['sort_by']) && $data['sort_type']) {
            $users = $users->orderBy($data['sort_by'], $data['sort_type']);
        }
        $users = $users->get();
        return $users;
    }
}
