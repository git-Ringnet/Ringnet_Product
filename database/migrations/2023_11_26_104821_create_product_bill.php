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
        Schema::create('product_bill', function (Blueprint $table) {
            $table->id();
            $table->integer('billSale_id');
            $table->integer('product_id');
            $table->decimal('billSale_qty', 20, 4)->nullable();
            $table->timestamps();
        });
        Schema::table('bill_sale', function (Blueprint $table) {
            $table->dropColumn('delivery_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_bill');
    }
};
