<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GuestFormDate extends Model
{
    use HasFactory;
    protected $table = 'guest_dateform';
    protected $fillable = ['form_field', 'guest_id', 'date_form_id', 'workspace_id'];

    public function insertFormGuest($guestId, $dateFormId = 0, $formField)
    {
        // Kiểm tra nếu chưa có guestid và cùng field thì sẽ thêm mới ngược lại cập nhật thui
        $existingRecord = self::where('guest_id', $guestId)
            ->where('form_field', $formField)
            ->first();

        if ($existingRecord) {
            $existingRecord->date_form_id = $dateFormId;
            $existingRecord->save();
        } else {
            self::create(['guest_id' => $guestId, 'form_field' => $formField, 'date_form_id' => $dateFormId]);
        }
    }
    public function getFormFieldIdsByGuestId($guestId)
    {
        $formData = self::where('guest_id', $guestId)->get();

        $result = [];
        foreach ($formData as $data) {
            $dateForm = DateForm::find($data->date_form_id);
            if ($dateForm) {
                $result[$data->form_field] = [
                    'form_field' => $data->form_field,
                    'date_form_id' => $data->date_form_id,
                    'form' => $dateForm,
                ];
            }
        }
        return $result;
    }
}
