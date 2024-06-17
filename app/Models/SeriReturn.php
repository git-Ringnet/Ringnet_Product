<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriReturn extends Model
{
    use HasFactory;
    protected $table = 'seri_return';
    protected $fillable = [
        'seri_id',
        'return_id', 'workspace_id'
    ];
    public function serialnumber()
    {
        return $this->belongsTo(Serialnumber::class);
    }

    public function returnExport()
    {
        return $this->belongsTo(ReturnExport::class);
    }
}
