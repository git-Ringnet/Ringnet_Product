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
            $table->string('product_code')->nullable();
            $table->string('product_name');
            $table->string('product_unit')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_manufacturer')->nullable();
            $table->string('product_origin')->nullable();
            $table->string('product_guarantee')->nullable();
            $table->decimal('product_price_import',20,4)->nullable();
            $table->decimal('product_price_export',20,4)->nullable();
            $table->string('product_ratio')->nullable();
            $table->integer('product_tax')->nullable();
            $table->decimal('product_inventory',20,4)->nullable();
            $table->decimal('product_trade',20,4)->nullable();
            $table->decimal('product_available',20,4)->nullable();
            // $table->unsignedBigInteger('warehouse_id');
            $table->integer('check_seri')->nullable();
            $table->integer('group_id')->nullable();
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
