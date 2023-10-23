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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_unit');
            $table->string('product_type');
            $table->string('product_');
            $table->string('product_origin');
            $table->string('product_guarantee');
            $table->decimal('product_price_import');
            $table->decimal('product_price_export');
            $table->string('product_ratio');
            $table->integer('product_tax');
            $table->decimal('product_inventory');
            $table->decimal('product_trade');
            $table->decimal('product_available');
            $table->unsignedBigInteger('warehouse_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
