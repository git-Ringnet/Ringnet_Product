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
        Schema::create('productwarehouse', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('warehouse_id');
            $table->decimal('qty', 20, 4);
            $table->integer('workspace_id');
            $table->timestamps();
        });
        Schema::table('serialnumber', function (Blueprint $table) {
            $table->integer('warehouse_id')->nullable();
        });
        Schema::table('receive_bill', function (Blueprint $table) {
            $table->string('promotion')->nullable();
        });
        Schema::table('returnImport', function (Blueprint $table) {
            $table->decimal('total',20,4)->nullable();
            $table->decimal('payment',20,4)->nullable();
        });
        Schema::table('cash_receipts', function (Blueprint $table) {
            $table->integer('returnImport_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productwarehouse');
    }
};
