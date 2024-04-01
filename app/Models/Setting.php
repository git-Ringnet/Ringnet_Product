<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    use HasFactory;
    // Func delete all table where workspace_id == current_workspace
    public function deleteAllTable($workspace_id)
    {
        $tables = [
            'attachment',
            'bill_sale',
            'date_form',
            'delivered',
            'delivery',
            'detailexport',
            'detailimport',
            'guest',
            'guest_dateform',
            'history',
            'history_import',
            'invitations',
            'pay_export',
            'pay_order',
            'products',
            'products_import',
            'product_bill',
            'product_pay',
            'project',
            'provides',
            'quoteexport',
            'quoteimport',
            'receive_bill',
            'reciept',
            'represent_guest',
            'represent_provide',
            'roles',
            'role_user',
            'serialnumber',
            'user_workspaces',
            'warehouse',
            // 'workspaces',
        ];
        foreach ($tables as $table) {
            DB::table($table)->where('workspace_id', $workspace_id)->delete();
        }
    }
}
