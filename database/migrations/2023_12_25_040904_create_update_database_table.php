<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('attachment', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('user_id');
        });
        Schema::table('bill_sale', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status');
        });
        Schema::table('date_form', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('user_id');
        });
        Schema::table('delivered', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('deliver_qty');
        });
        Schema::table('delivery', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status');
        });
        Schema::table('detailexport', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status_pay');
        });
        Schema::table('detailimport', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status_pay');
        });
        Schema::table('guest', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('guest_note');
        });
        Schema::table('guest_dateform', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('date_form_id');
        });
        Schema::table('history_import', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('version');
        });
        Schema::table('history_payment_export', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('debt');
        });
        Schema::table('history_payment_order', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('debt');
        });
        Schema::table('pay_export', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status');
        });
        Schema::table('pay_order', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('check_seri');
        });
        Schema::table('products_import', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('product_id');
        });
        Schema::table('product_bill', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('billSale_qty');
        });
        Schema::table('product_pay', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('pay_qty');
        });
        Schema::table('project', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('project_name');
        });
        Schema::table('provides', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('provide_address_delivery');
        });
        Schema::table('quoteexport', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('product_note');
        });
        Schema::table('quoteimport', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('version');
        });
        Schema::table('receive_bill', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status');
        });
        Schema::table('reciept', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('number_bill');
        });
        Schema::table('represent_guest', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('represent_address');
        });
        Schema::table('represent_provide', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('represent_address');
        });
        Schema::table('serialnumber', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('status');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('name');
        });
        Schema::table('role_user', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('role_id');
        });
        Schema::table('warehouse', function (Blueprint $table) {
            $table->integer('workspace_id')->nullable()->after('warehouse_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_database');
    }
};
