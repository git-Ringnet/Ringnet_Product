<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
            'quoteexport',
            'quoteimport',
            'detailexport',
            'detailimport',
            'guest',
            'guest_dateform',
            'history',
            'history_import',
            'history_payment_export',
            'history_payment_order',
            'invitations',
            'pay_export',
            'pay_order',
            'products',
            'products_import',
            'product_bill',
            'product_pay',
            'project',
            'provides',
            'receive_bill',
            'reciept',
            'represent_guest',
            'represent_provide',
            'roles',
            'role_user',
            'serialnumber',
            'warehouse',
            // 'user_workspaces',
            // 'workspaces',
            // 'users',
        ];
        // $tables = ['quoteexport', 'detailexport', 'attachment', 'products'];
        foreach ($tables as $table) {
            DB::table($table)->where('workspace_id', $workspace_id)->delete();
        }
        // Change workspace_id User where workspace_id == current_workspace
        // current_workspace == origin workspace this user
        DB::table('users')->where('current_workspace', $workspace_id)->update(['current_workspace' => DB::raw('origin_workspace')]);
        DB::table('users')->where('id', Auth::user()->id)->update(['current_workspace' => null, 'origin_workspace' => null]);
        DB::table('workspaces')->where('id', $workspace_id)
            ->update([
                'workspace_name' => null,
                'number_bank' => null,
                'mst' => null,
                'address_company' => null,
                'name_bank' => null,
                'name_company' => null,
            ]);
        DB::table('user_workspaces')->where('workspace_id', $workspace_id)->delete();
    }
}
