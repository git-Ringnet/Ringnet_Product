<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DateForm extends Model
{
    use HasFactory;
    protected $table = 'date_form';
    protected $fillable = ['form_name', 'form_field', 'form_desc', 'user_id', 'default_form'];
    public function getDateForm()
    {
        return DB::table($this->table)
            ->where('workspace_id', Auth::user()->current_workspace)
            ->get();
    }
    public function createDateForm($data)
    {
        return self::create($data);
    }

    public function updateDateForm($id, $data)
    {
        $date_form = self::find($id);
        if ($date_form) {
            $date_form->update($data);
            return $date_form;
        }
        return null;
    }

    public function deleteDateForm($id)
    {
        $date_form = self::find($id);
        if ($date_form) {
            $date_form->delete();
            return true;
        }
        return false;
    }
    public function findFormByField($field)
    {
        return self::where('form_field', $field)
            ->where('default_form', 1)
            ->first();
    }
    public function guests()
    {
        return $this->belongsToMany(Guest::class, 'guest_dateform', 'date_form_id', 'guest_id');
    }
}
