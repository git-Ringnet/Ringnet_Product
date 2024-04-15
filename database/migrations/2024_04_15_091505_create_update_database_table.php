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
        Schema::table('bill_sale', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('delivered', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('delivery', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('guest', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('history_import', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('history', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('history_payment_export', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('history_payment_order', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('pay_export', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('pay_order', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('products_import', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('product_bill', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('product_pay', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('project', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('provides', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('quoteexport', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('quoteimport', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('receive_bill', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('reciept', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('represent_guest', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('represent_provide', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('serialnumber', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
        });

        Schema::table('warehouse', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('workspace_id');
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
