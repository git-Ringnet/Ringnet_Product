<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DateForm extends Model
{
    use HasFactory;
    protected $table = 'date_form';
    protected $fillable = ['form_name', 'form_field', 'form_desc', 'user_id'];
    public function getDateForm()
    {
        return DB::table($this->table)->get();
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
}
