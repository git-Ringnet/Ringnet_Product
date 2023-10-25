<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteExport extends Model
{
    use HasFactory;
    protected $table = 'quoteexport';
    protected $fillable = [
        'detailexport_id',
        'product_id',
    ];
    public function getAllQuoteExport()
    {
        $quoteExport = QuoteExport::all();
        return $quoteExport;
    }
}
