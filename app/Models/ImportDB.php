<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportDB implements ToModel
{
    public function model(array $row)
    {
        // return new Guest([
        //     'guest_name_display' => $row[0], // Thay $row[0] bằng cột tương ứng trong file Excel
        //     'guest_code' => $row[1],
        //     'guest_address' => $row[2],
        // ]);
        $models = [];
        // $models[] = new Guest([
        //     'id' => $row[1],
        //     'guest_name_display' =>  $row[0],
        //     'guest_address' => '',
        //     'guest_code' => '',
        // ]);
        // dd($row);
        // Tạo model Provides
        // $models[] = new Provides([
        //     'id' => $row[1],
        //     'provide_name_display' => $row[0],
        //     'provide_address' => '',
        //     'provide_code' => '',
        //     'provide_debt' => 0,
        // ]);
        // $models[] = new BillSale([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[0],
        //     'guest_id' => $row[2],
        //     'price_total' => $row[3],
        //     'status' => 2,
        //     'workspace_id' => 0,
        //     'number_bill' => $row[4],
        // ]);
        // $models[] = new Delivered([
        //     'id' => $row[0],
        //     'delivery_id' => $row[0],
        //     'product_id' => $row[0],
        //     'deliver_qty' => $row[1],
        //     'product_total_vat' => $row[2],
        //     'price_export' => $row[3],
        //     'workspace_id' => 0,
        //     // 'created_at' => $row[4],
        //     // 'updated_at' => $row[4],
        // ]);
        // $models[] = new Delivery([
        //     'id' => $row[0],
        //     'guest_id' => $row[1],
        //     'quotation_number' => $row[2],
        //     'code_delivery' => $row[3],
        //     'shipping_fee' => 0,
        //     'detailexport_id' => $row[0],
        //     'status' => 2,
        //     'workspace_id' => 2,
        // ]);
        // $models[] = new DetailExport([
        //     'id' => $row[0],
        //     'guest_id' => $row[1],
        //     'quotation_number' => $row[2],
        //     'user_id' => 1,
        //     'status_receive' => 2,
        //     'status' => 2,
        //     'status_pay' => 2,
        //     'workspace_id' => 0,
        //     'total_price' => $row[3],
        //     'total_tax' => $row[4],
        //     'amount_owed' => 0,
        // ]);
        // $models[] = new DetailImport([
        //     'id' => $row[0],
        //     'provide_id' => $row[1],
        //     'quotation_number' => $row[2],
        //     'user_id' => 1,
        //     'status_receive' => 2,
        //     'status_reciept' => 2,
        //     'status_pay' => 2,
        //     'status' => 2,
        //     'project_id' => 1,
        //     'workspace_id' => 0,
        //     'total_price' => $row[3],
        //     'total_tax' => $row[4],
        //     'amount_owed' => 0,
        // ]);

        // $models[] = new HistoryImport([
        //     'id' => $row[0],
        //     'detailImport_id' => $row[0],
        //     'quoteImport_id' => $row[0],
        //     'product_code' => '',
        //     'product_name' =>  $row[4],
        //     'product_unit' => 'Cái',
        //     'product_qty' =>  $row[5],
        //     'product_tax' => 10,
        //     'product_total' =>  $row[7],
        //     'price_export' =>  $row[8],
        //     'product_id' =>  $row[0],
        //     'provide_id' =>  $row[3],
        //     'version' =>  0,
        //     'workspace_id' => 2,
        // ]);
        // $models[] = new QuoteImport([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[0],
        //     'product_code' => '',
        //     'product_id' => $row[0],
        //     'product_name' => $row[4],
        //     'product_unit' => 'Cái',
        //     'product_qty' => $row[5],
        //     'product_tax' => 10,
        //     'product_total' =>  $row[7],
        //     'price_export' => $row[0],
        //     'receive_qty' =>  $row[5],
        //     'version' =>  0,
        //     'reciept_qty' =>  $row[5],
        //     'payment_qty' =>  $row[5],
        //     'warehouse_id' =>  1,
        //     'workspace_id' => 0,
        // ]);
        // $models[] = new Receive_bill([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[0],
        //     'provide_id' => $row[3],
        //     'status' => 2,
        //     'delivery_code' =>  $row[10],
        //     'workspace_id' => 0,
        // ]);
        // $models[] = new Reciept([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[0],
        //     'provide_id' => $row[3],
        //     'status' => 2,
        //     'price_total' => $row[7],
        //     'number_bill' => $row[10],
        //     'date_bill' => now(),
        //     'workspace_id' => 0,
        // ]);
        // $models[] = new Products([
        //     'id' => $row[0],
        //     'product_code' => '',
        //     'product_name' => $row[4],
        //     'product_unit' => 'Cái',
        //     'product_price_export' => 0,
        //     'product_tax' => 10,
        //     'product_inventory' => 0,
        //     'check_seri' => 0,
        //     'workspace_id' => 0,
        // ]);

        // $models[] = new ProductImport([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[0],
        //     'quoteImport_id' => $row[0],
        //     'product_qty' => $row[5],
        //     'receive_id' =>  $row[0],
        //     'reciept_id' =>  $row[0],
        //     'payOrder_id' =>  $row[0],
        //     'product_id' =>  $row[0],
        //     'workspace_id' => 0,
        // ]);

        // $models[] = new productBill([
        //     'id' => $row[0],
        //     'billSale_id' => $row[0],
        //     'product_id' => $row[0],
        //     'billSale_qty' => $row[5],
        //     'workspace_id' => 0,
        // ]);

        // $models[] = new productPay([
        //     'pay_id' => $row[0],
        //     'product_id' => $row[0],
        //     'pay_qty' => $row[5],
        //     'workspace_id' => 0,
        // ]);

        // $models[] = new PayOder([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[0],
        //     'provide_id' => $row[8],
        //     'payment_code' => $row[6],
        //     'total' => $row[9],
        //     'payment' => 0,
        //     'debt' => 0,
        //     'payment_date' => now(),
        //     'status' => 2,
        //     'workspace_id' => 2,
        // ]);

        // $models[] = new PayExport([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[0],
        //     'guest_id' => $row[5],
        //     'code_payment' => $row[2],
        //     'total' => $row[4],
        //     'payment' => 0,
        //     'debt' => 0,
        //     'payment_date' => now(),
        //     'status' => 2,
        //     'workspace_id' => 2,
        // ]);

        // $models[] = new QuoteExport([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[0],
        //     'product_code' => '',
        //     'product_name' => $row[6],
        //     'product_unit' => 'Cái',
        //     'product_qty' => $row[1],
        //     'product_tax' => 10,
        //     'product_total' => $row[4],
        //     'price_export' => $row[3],
        //     'deliver_id' => $row[0],
        //     'product_id' =>  $row[0],
        //     'status' =>  2,
        //     'qty_delivery' =>  $row[1],
        //     'qty_bill_sale' =>  $row[1],
        //     'qty_payment' =>  $row[1],
        //     'workspace_id' => 2,
        // ]);

        // $models[] = new History([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[0],
        //     'delivered_id' => $row[0],
        //     'provide_id' => $row[8],
        //     'detailimport_id' => $row[0],
        //     'history_import' => $row[0],
        //     'tax_import' => 10,
        //     'price_import' => $row[8],
        //     'total_import' =>  $row[9],
        //     'workspace_id' => 2,
        // ]);
        $models[] = new Serialnumber([
            'serinumber' => $row[1],
            'detailimport_id' => $row[0],
            'quoteImport_id' => $row[0],
            'detailexport_id' => $row[0],
            'receive_id' => $row[0],
            'product_id' =>  $row[0],
            'status' =>  1,
            'workspace_id' => 2,
        ]);
        return $models;
    }
}
