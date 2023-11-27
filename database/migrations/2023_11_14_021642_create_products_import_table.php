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
        Schema::create('products_import', function (Blueprint $table) {
            $table->id();
            $table->integer('detailimport_id');
            $table->integer('quoteImport_id');
            // $table->string('product_code')->nullable();
            // $table->string('product_name');
            // $table->string('product_unit');
            $table->decimal('product_qty', 20, 4);
            // $table->integer('product_tax');
            // $table->decimal('product_total',20,4);
            // $table->decimal('price_export',20,4);
            // $table->integer('product_ratio')->nullable();
            // $table->decimal('price_import',20,4);
            // $table->integer('cbSN')->nullable();
            $table->integer('receive_id')->nullable();
            $table->integer('reciept_id')->nullable();
            $table->integer('payOrder_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->timestamps();
        });
        Schema::table('quoteimport', function (Blueprint $table) {
            $table->decimal('receive_qty', 20, 4)->nullable()->after('product_id');
            $table->decimal('reciept_qty', 20, 4)->nullable()->after('receive_qty');
            $table->decimal('payment_qty', 20, 4)->nullable()->after('reciept_qty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_import');
    }
};
