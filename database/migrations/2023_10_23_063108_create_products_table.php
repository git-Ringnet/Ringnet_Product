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
            $table->string('product_type')->nullable();
            $table->string('product_manufacturer')->nullable();
            $table->string('product_origin')->nullable();
            $table->string('product_guarantee');
            $table->decimal('product_price_import',20,4);
            $table->decimal('product_price_export',20,4);
            $table->string('product_ratio');
            $table->integer('product_tax');
            $table->decimal('product_inventory',20,4)->nullable();
            $table->decimal('product_trade',20,4)->nullable();
            $table->decimal('product_available',20,4)->nullable();
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
