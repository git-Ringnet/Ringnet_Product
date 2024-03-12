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
        $models[] = new Guest([
            'guest_name_display' =>  $row[0],
            'guest_code' => $row[1],
            'guest_address' => $row[1],
        ]);

        // Tạo model Provides
        $models[] = new Provides([
            'provide_name_display' => $row[2],
            'provide_code' => $row[3],
            'provide_address' => $row[3],
            'provide_debt' => 0,
        ]);
        $models[] = new BillSale([
            'detailexport_id' => $row[2],
            'guest_id' => $row[3],
            'price_total' => $row[3],
            'status' => 0,
            'workspace_id' => 0,
            'number_bill' => 0,
        ]);
        $models[] = new Delivered([
            'delivery_id' => $row[2],
            'product_id' => $row[3],
            'deliver_qty' => $row[3],
            'product_total_vat' => 0,
            'price_export' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new Delivery([
            'guest_id' => $row[2],
            'quotation_number' => $row[3],
            'code_delivery' => $row[3],
            'shipping_fee' => 0,
            'detailexport_id' => 0,
            'status' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new DetailExport([
            'guest_id' => $row[2],
            'quotation_number' => $row[3],
            'user_id' => 0,
            'status_receive' => 0,
            'status' => 0,
            'workspace_id' => 0,
            'created_at' => 0,
            'total_price' => 0,
            'total_tax' => 0,
            'amount_owed' => 0,
        ]);
        $models[] = new DetailImport([
            'provide_id' => $row[2],
            'quotation_number' => $row[3],
            'project_id' => $row[3],
            'user_id' => 0,
            'status_receive' => 0,
            'status_reciept' => 0,
            'status_pay' => 0,
            'status' => 0,
            'workspace_id' => 0,
            'created_at' => 0,
            'total_price' => 0,
            'total_tax' => 0,
            'amount_owed' => 0,
        ]);
        $models[] = new History([
            'detailexport_id' => $row[2],
            'delivered_id' => $row[3],
            'provide_id' => $row[3],
            'detailimport_id' => 0,
            'history_import' => 0,
            'tax_import' => 0,
            'price_import' => 0,
            'total_import' => 0,
            'workspace_id' => 0,
            'created_at' => 0,
        ]);
        $models[] = new HistoryImport([
            'detailImport_id' => $row[2],
            'quoteImport_id' => $row[3],
            'product_code' => $row[3],
            'product_name' => 0,
            'product_unit' => 0,
            'product_qty' => 0,
            'product_tax' => 0,
            'product_total' => 0,
            'price_export' => 0,
            'product_id' => 0,
            'provide_id' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new PayExport([
            'detailexport_id' => $row[2],
            'guest_id' => $row[3],
            'code_payment' => $row[3],
            'payment_date' => 0,
            'total' => 0,
            'payment' => 0,
            'debt' => 0,
            'status' => 0,
            'workspace_id' => 0,
            'created_at' => 0,
        ]);
        $models[] = new PayOder([
            'detailimport_id' => $row[2],
            'provide_id' => $row[3],
            'payment_code' => $row[3],
            'payment_date' => 0,
            'total' => 0,
            'payment' => 0,
            'debt' => 0,
            'status' => 0,
            'workspace_id' => 0,
            'created_at' => 0,
        ]);
        $models[] = new Products([
            'product_code' => $row[2],
            'product_name' => $row[3],
            'product_unit' => $row[3],
            'product_price_export' => 0,
            'product_tax' => 0,
            'product_inventory' => 0,
            'check_seri' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new ProductImport([
            'detailimport_id' => $row[2],
            'quoteImport_id' => $row[3],
            'product_qty' => $row[3],
            'receive_id' => 0,
            'reciept_id' => 0,
            'payOrder_id' => 0,
            'product_id' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new productBill([
            'billSale_id' => $row[2],
            'product_id' => $row[3],
            'billSale_qty' => $row[3],
            'workspace_id' => 0,
        ]);
        $models[] = new productPay([
            'pay_id' => $row[2],
            'product_id' => $row[3],
            'pay_qty' => $row[3],
            'workspace_id' => 0,
        ]);
        $models[] = new QuoteExport([
            'detailexport_id' => $row[2],
            'product_code' => $row[3],
            'product_name' => $row[3],
            'product_unit' => 0,
            'product_qty' => 0,
            'product_tax' => 0,
            'product_total' => 0,
            'price_export' => 0,
            'deliver_id' => 0,
            'product_id' => 0,
            'qty_delivery' => 0,
            'qty_bill_sale' => 0,
            'qty_payment' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new QuoteImport([
            'detailimport_id' => $row[2],
            'product_code' => $row[3],
            'product_name' => $row[3],
            'product_unit' => 0,
            'product_qty' => 0,
            'product_tax' => 0,
            'product_total' => 0,
            'price_export' => 0,
            'receive_qty' => 0,
            'reciept_qty' => 0,
            'payment_qty' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new Receive_bill([
            'detailimport_id' => $row[2],
            'provide_id' => $row[3],
            'status' => $row[3],
            'delivery_code' => 0,
            'workspace_id' => 0,
        ]);
        $models[] = new Receive_bill([
            'detailimport_id' => $row[2],
            'provide_id' => $row[3],
            'status' => $row[3],
            'price_total' => 0,
            'date_bill' => 0,
            'number_bill' => 0,
            'workspace_id' => 0,
        ]);

        return $models;
    }
}
