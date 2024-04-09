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
        //     'id' => $row[0],
        //     'guest_name_display' =>  $row[1],
        //     'guest_name' =>  $row[1],
        //     'guest_address' => '',
        //     'guest_code' => '',
        //     'guest_debt' => $row[2],
        //     'workspace_id' => 2,
        // ]);
        // dd($row);
        // Tạo model Provides
        // $models[] = new Provides([
        //     'id' => $row[0],
        //     'provide_name_display' => $row[1],
        //     'provide_name' => $row[1],
        //     'provide_address' => '',
        //     'provide_code' => '',
        //     'provide_debt' => $row[2],
        //     'workspace_id' => 2,
        // ]);
        // $models[] = new BillSale([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[1],
        //     'guest_id' => $row[2],
        //     'price_total' => $row[5],
        //     'status' =>  $row[4],
        //     'workspace_id' => 2,
        //     'number_bill' => $row[3],
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
        // ]);
        // $models[] = new Delivered([
        //     'id' => $row[0],
        //     'delivery_id' => $row[1],
        //     'product_id' => $row[0],
        //     'deliver_qty' => $row[5],
        //     'product_total_vat' => $row[3],
        //     'price_export' => $row[2],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
        //     'updated_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
        // ]);
        // $models[] = new Delivery([
        //     'id' => $row[0],
        //     'guest_id' => $row[1],
        //     'quotation_number' => $row[2],
        //     'code_delivery' => $row[3],
        //     'shipping_fee' => 0,
        //     'detailexport_id' => $row[0],
        //     'status' => $row[4],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
        // ]);
        // $models[] = new DetailExport([
        //     'id' => $row[0],
        //     'guest_id' => $row[1],
        //     'quotation_number' => $row[2],
        //     'reference_number' => $row[3],
        //     'user_id' => 2,
        //     'status_receive' => 2,
        //     'project_id' => 1,
        //     'status_reciept' => 2,
        //     'status_pay' => $row[4],
        //     'status' => $row[5],
        //     'workspace_id' => 2,
        //     'total_price' => $row[7],
        //     'total_tax' => $row[6],
        //     'amount_owed' => $row[8],
        //     'guest_name' => $row[10],
        //     // Convert date from Excel to Carbon
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
        // ]);
        // $models[] = new DetailImport([
        //     'id' => $row[0],
        //     'provide_id' => $row[1],
        //     'quotation_number' => $row[2],
        //     'user_id' => 2,
        //     'status_receive' => 2,
        //     'status_reciept' => 2,
        //     'status_pay' => 2,
        //     'project_id' => 1,
        //     'workspace_id' => 2,
        //     'total_price' => $row[3],
        //     'total_tax' => $row[4],
        //     'amount_owed' =>  $row[5],
        //     'reference_number' =>  $row[6],
        //     'status' =>  $row[8],
        //     'status_receive' =>  2,
        //     'status_reciept' =>  2,
        //     'status_pay' =>  $row[7],
        //     'provide_name' => $row[10],
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
        // ]);

        // $models[] = new HistoryImport([
        //     'id' => $row[0],
        //     'detailImport_id' => $row[1],
        //     'quoteImport_id' => $row[0],
        //     'product_code' => '',
        //     'product_name' =>  $row[2],
        //     'product_unit' => '',
        //     'product_qty' =>  $row[4],
        //     'product_tax' => $row[14],
        //     'product_total' =>  $row[6],
        //     'price_export' =>  $row[7],
        //     'product_id' =>  $row[0],
        //     'provide_id' =>  $row[3],
        //     'version' =>  0,
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
        // ]);
        // $models[] = new QuoteImport([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[1],
        //     'product_code' => '',
        //     'product_id' => $row[0],
        //     'product_name' => $row[2],
        //     'product_unit' => '',
        //     'product_qty' => $row[3],
        //     'product_tax' => $row[13],
        //     'product_total' =>  $row[4],
        //     'price_export' => $row[14],
        //     'receive_qty' =>  $row[3],
        //     'version' =>  0,
        //     'reciept_qty' =>  $row[3],
        //     'payment_qty' =>  $row[3],
        //     'warehouse_id' =>  1,
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
        // ]);
        // $models[] = new QuoteExport([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[1],
        //     'product_code' => '',
        //     'product_name' => $row[2],
        //     'product_unit' => '',
        //     'product_qty' => $row[3],
        //     'product_tax' => $row[6],
        //     'product_total' => $row[5],
        //     'price_export' => $row[7],
        //     'deliver_id' => 0,
        //     'product_id' =>  $row[0],
        //     'status' =>  1,
        //     'qty_delivery' =>  $row[3],
        //     'qty_bill_sale' =>  $row[3],
        //     'qty_payment' =>  $row[3],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]),
        // ]);
        // $models[] = new Receive_bill([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[1],
        //     'provide_id' => $row[2],
        //     'status' => 2,
        //     'delivery_code' =>  $row[3],
        //     'workspace_id' => 2,
        //     'total_tax' => $row[4],
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
        // ]);
        // $models[] = new Reciept([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[1],
        //     'provide_id' => $row[2],
        //     'status' => 2,
        //     'price_total' => $row[4],
        //     'number_bill' => $row[6],
        //     'date_bill' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
        // ]);
        // $models[] = new Products([
        //     'id' => $row[0],
        //     'product_code' => '',
        //     'product_name' => $row[1],
        //     'product_unit' => '',
        //     'product_price_export' => 0,
        //     'product_tax' => $row[6],
        //     'product_inventory' => 0,
        //     'check_seri' => $row[5],
        //     'workspace_id' => 2,
        //     'product_guarantee' => $row[7],
        //     'type' => $row[8],
        // ]);

        // $models[] = new ProductImport([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[1],
        //     'quoteImport_id' => $row[0],
        //     'product_qty' => $row[3],
        //     'receive_id' =>  $row[1],
        //     'reciept_id' =>  $row[1],
        //     'payOrder_id' =>  $row[1],
        //     'product_id' =>  $row[0],
        //     'workspace_id' => 2,
        //     'cbSN' => $row[14],
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[13]),
        //     'product_guarantee' =>  $row[15],
        // ]);

        // $models[] = new productBill([
        //     'id' => $row[0],
        //     'billSale_id' => $row[4],
        //     'product_id' => $row[0],
        //     'billSale_qty' => $row[1],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
        // ]);

        // $models[] = new productPay([
        //     'id' => $row[0],
        //     'pay_id' => $row[4],
        //     'product_id' => $row[0],
        //     'pay_qty' => $row[1],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
        // ]);

        // $models[] = new PayOder([
        //     'id' => $row[0],
        //     'detailimport_id' => $row[1],
        //     'provide_id' => $row[2],
        //     'payment_code' => $row[6],
        //     'total' => $row[4],
        //     'payment' => $row[11],
        //     'debt' => $row[10],
        //     'payment_type' => $row[9],
        //     'payment_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
        //     'status' => $row[5],
        //     'workspace_id' => 2,
        // ]);

        // $models[] = new PayExport([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[1],
        //     'guest_id' => $row[2],
        //     'code_payment' => $row[3],
        //     'total' => $row[6],
        //     'payment' => $row[11],
        //     'debt' =>  $row[10],
        //     'payment_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]),
        //     'status' =>  $row[4],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]),
        // ]);
        // $models[] = new history_Pay_Export([
        //     'id' => $row[0],
        //     'pay_id' => $row[1],
        //     'total' => $row[6],
        //     'payment' => $row[11],
        //     'debt' =>  $row[10],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]),
        // ]);
        // $models[] = new HistoryPaymentOrder([
        //     'id' => $row[0],
        //     'payment_id' => $row[1],
        //     'total' => $row[4],
        //     'payment' => $row[11],
        //     'debt' =>  $row[10],
        //     'workspace_id' => 2,
        //     'provide_id' => $row[2],
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
        // ]);

        // $models[] = new History([
        //     'id' => $row[0],
        //     'detailexport_id' => $row[1],
        //     'delivered_id' => $row[0],
        //     'provide_id' => $row[3],
        //     'hdv' => $row[4],
        //     'hdr' => $row[5],
        //     'detailimport_id' => $row[2],
        //     'history_import' => $row[0],
        //     'tax_import' => $row[6],
        //     'price_import' => $row[10],
        //     'total_import' =>  $row[8],
        //     'workspace_id' => 2,
        //     'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
        // ]);
        // $models[] = new Serialnumber([
        //     'serinumber' => $row[1],
        //     'detailimport_id' => $row[2],
        //     'delivery_id' => $row[3],
        //     'quoteImport_id' => $row[0],
        //     'detailexport_id' => $row[3],
        //     'receive_id' => $row[2],
        //     'product_id' =>  $row[0],
        //     'status' =>  1,
        //     'workspace_id' => 2,
        // ]);
        return $models;
    }
}
