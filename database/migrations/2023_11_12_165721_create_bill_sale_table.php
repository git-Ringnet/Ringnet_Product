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
        Schema::create('bill_sale', function (Blueprint $table) {
            $table->id();
            $table->integer('detailexport_id');
            $table->integer('delivery_id');
            $table->integer('guest_id');
            $table->decimal('price_total', 20, 4);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_bill_sale');
    }
};
